<?php
    require_once __DIR__ . '/../models/Task.php';
    require_once __DIR__ . '/../models/Project.php';
    require_once __DIR__ . '/../models/User.php';
    require_once __DIR__ . '/../models/Assignment.php';

    class TaskController
    {
        public function taskPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $taskId = $_POST['task_id'];
            
            $taskModel = new Task();
            $task = $taskModel->getTaskById($taskId);

            $assignmentModel = new Assignment();

            $assignments = $assignmentModel->getAssignmentByTaskId($taskId);

            $userModel = new User();

            $taskUsers = array_map(function ($assignment) use ($userModel) {
                return $userModel->getUserById($assignment->getUserId());
            }, $assignments);

            $users = $userModel->getUsers();

            require_once __DIR__ . '/../views/task.php';
        }

        public function tasksPage()
        {
            session_start();
            
            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $taskModel = new Task();
            $tasks = $taskModel->getTasks();

            require_once __DIR__ . '/../views/tasksList.php';
        }

        public function registerTaskPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $projectModel = new Project();
            $projects = $projectModel->getProjects();

            require_once __DIR__ . '/../views/registerTask.php';
        }

        public function createTask()
        {
            $description = $_POST['description'];
            $projectId = $_POST['project_id'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $taskModel = new Task();

            $taskModel->createTask(new Task(null, $description, $projectId, $startDate, $endDate));

            header('Location: /tasks');
            exit();
        }
    }
?>