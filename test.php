<?php
    require_once './models/Assignment.php';
    require_once './models/Project.php';
    require_once './models/Task.php';
    require_once './models/User.php';

    $assignmentModel = new Assignment();
    $projectModel = new Project();
    $taskModel = new Task();
    $userModel = new User();

    $user = new User(null, 'Felipe', 'lipestaub@gmail.com', md5('123456'));
    $userModel->createUser($user);

    $user = $userModel->getUserByEmailAndPassword('lipestaub@gmail.com', md5('123456'));

    echo "\nUSUÁRIO:\n";
    var_dump($user);

    $project = new Project(null, 'Teste', 'testar o teste', '2024-02-09', '2024-02-10');
    $projectModel->createProject($project);

    $project = $projectModel->getProjectById(5); // colocar o proximo id da tabela project

    echo "\nPROJETO:\n";
    var_dump($project);

    $task = new Task(null, 'teste', $project->getId(), '2024-02-09', '2024-02-09');
    $taskModel->createTask($task);

    $task = $taskModel->getTaskById(4); // colocar o proximo id da tabela task

    echo "\nTAREFA:\n";
    var_dump($task);

    $assignment = new Assignment(null, $user->getId(), $task->getId());
    $assignmentModel->createAssignment($assignment);

    $assignment = $assignmentModel->getAssignmentById(29); // colocar o proximo id da tabela assignment

    echo "\nATRIBUIÇÃO:\n";
    var_dump($assignment);

    $projectTasks = $taskModel->getTasksByProjectId($project->getId());

    echo "\nTAREFAS DO PROJETO:\n";
    print_r($projectTasks);

    $assignments = $assignmentModel->getAssignmentsByTaskId($task->getId());
    $taskUsers = array_map(function($assignment) use ($userModel) {
        return $userModel->getUserById($assignment->getUserId());
    }, $assignments);

    echo "\nUSUÁRIOS DA TAREFA:\n";
    print_r($taskUsers);

    $assignments = $assignmentModel->getAssignmentsByUserId($user->getId());
    $userTasks = array_map(function($assignment) use ($taskModel) {
        return $taskModel->getTaskById($assignment->getTaskId());
    }, $assignments);

    echo "\nTAREFAS DO USUÀRIO:\n";
    print_r($userTasks);
?>