<?php
    require_once __DIR__ . '/../models/User.php';
    require_once __DIR__ . '/../models/Assignment.php';
    require_once __DIR__ . '/../models/Task.php';

    class UserController
    {
        public function signInPage()
        {
            require_once __DIR__ . '/../views/signIn.php';
        }

        public function signUpPage()
        {
            require_once __DIR__ . '/../views/signUp.php';
        }

        public function signOut()
        {
            session_start();
            unset($_SESSION);

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }
        }

        public function validateEmailAndPassword()
        {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $userModel = new User();
            $user = $userModel->getUserByEmailAndPassword($email, $password);

            if ($user->getId() !== null) {
                session_start();

                $_SESSION['user_id'] = $user->getId();

                header('Location: /user-tasks');
            }
            else {
                header('Location: /sign-in');
            }

            exit();
        }

        public function userPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $userId = $_GET['user_id'];

            $userModel = new User();
            $user = $userModel->getUserById($userId);

            $assignmentModel = new Assignment();
            $tasks = $assignmentModel->getAssignmentsByUserId($userId);

            $taskModel = new Task();

            array_map(function($task, $taskModel) {
                return $taskModel->getTaskById($task->getTaskId());
            }, $tasks);

            var_dump($taskModel);
            exit();
        }

        public function usersPage()
        {
            session_start();
            
            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $userModel = new User();
            $users = $userModel->getUsers();

            require_once __DIR__ . '/../views/usersList.php';
        }

        public function registeruserPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            require_once __DIR__ . '/../views/registerUser.php';
        }

        public function userTasksPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $userId = $_SESSION['user_id'];

            $userModel = new User();
            $user = $userModel->getUserById($userId);

            $assignmentModel = new Assignment();
            $tasks = $assignmentModel->getAssignmentsByUserId($userId);

            $taskModel = new Task();

            $tasks = array_map(function($task) use ($taskModel) {
                return $taskModel->getTaskById($task->getTaskId());
            }, $tasks);

            require_once __DIR__ . '/../views/userTasks.php';
        }

        public function createUser()
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user->getId() === null) {
                $userModel->createUser(new User(null, $name, $email, $password));

                header('Location: /sign-in');
            }
            else {
                header('Location: /sign-up');
            }

            exit();
        }

        public function registerUser()
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user->getId() === null) {
                $userModel->createUser(new User(null, $name, $email, $password));

                header('Location: /users');
            }
            else {
                header('Location: /register-user');
            }

            exit();
        }
    }
?>