<?php

    class Project
    {
        private ?int $id;
        private ?string $name;
        private ?string $description;
        private ?DateTime $startDate;
        private ?DateTime $endDate;

        public function __construct(?int $id = null, ?string $name = null, ?string $description = null, ?DateTime $startDate = null, ?DateTime $endDate = null)
        {
                $this->id          = $id;
                $this->name        = $name;
                $this->description = $description;
                $this->startDate   = $startDate;
                $this->endDate     = $endDate;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getStartDate()
        {
            return $this->startDate;
        }

        public function getEndDate()
        {
            return $this->endDate;
        }

        public function createProject(self $project)
        {
            $projectDAO = new ProjectDAO();
            $project = $projectDAO->createProject($project);
        }

        public function getProjects() {
            $projectDAO = new ProjectDAO();
            $projects = $projectDAO->getProjects();

            array_map(function($project) {
                return new self(
                    $project['id'],
                    $project['name'],
                    $project['description'],
                    $project['star_date'],
                    $project['end_date'],
                );
            }, $projects);

            return $projects;
        }

        public function getProjectById(int $projectId) {
            $projectDAO = new ProjectDAO();
            $project = $projectDAO->getProjectById($projectId);
            
            return new self(
                $project['id'],
                $project['name'],
                $project['description'],
                $project['star_date'],
                $project['end_date'],
            );
        }
    }
?>