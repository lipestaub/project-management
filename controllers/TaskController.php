<?php
    require_once __DIR__ . '/../models/Task.php';

    class TaskController
    {
        public function taskPage()
        {
            
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

            require_once __DIR__ . '/../tasksList.php';
        }

        public function registerTaskPage()
        {
            
        }

        public function createTask()
        {
            
        }
    }
?>