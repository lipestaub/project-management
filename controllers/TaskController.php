<?php
    require_once __DIR__ . '/../models/Task.php';

    class TaskController
    {
        public function taskPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

        }

        public function tasksPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

        }

        public function registerTaskPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

        }

        public function createTask()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

        }
    }
?>