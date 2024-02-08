<?php
    require_once __DIR__ . '/../models/Project.php';

    class ProjectController
    {
        public function projectPage()
        {
            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $projectId = $_GET['project_id'];


        }

        public function projectsPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $projectModel = new Project();
            $projects = $projectModel->getProjects();

            require_once __DIR__ . '/../views/projectsList.php';
        }

        public function registerProjectPage()
        {
            
        }

        public function createProject()
        {
            
        }
    }
?>