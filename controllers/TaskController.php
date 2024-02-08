<?php
    require_once __DIR__ . '/../models/Task.php';
    require_once __DIR__ . '/../models/Project.php';

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