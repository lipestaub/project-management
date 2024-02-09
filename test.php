<?php
    require_once './models/Assignment.php';
    require_once './models/Project.php';
    require_once './models/Task.php';
    require_once './models/User.php';

    $assignmentModel = new User();
    $projectModel = new Project();
    $taskModel = new Task();
    $userModel = new User();

    $user = new User(null, 'Felipe', 'lipestaub@gmail.com', '123456');
    $userModel->createUser($user);

    $user = $userModel->getUserByEmailAndPassword('lipestaub@gmail.com', md5('123456'));

    echo "\nUSUÁRIO:\n";
    var_dump($user);

    
?>