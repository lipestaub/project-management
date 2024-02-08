<?php

    class Task
    {
        private ?int $id;
        private ?string $description;
        private ?int $projectId;
        private ?DateTime $startDate;
        private ?DateTime $endDate;

        public function __construct(?int $id = null, ?string $description = null, ?int $projectId = null, ?DateTime $startDate = null, ?DateTime $endDate = null)
        {
            $this->id          = $id;
            $this->description = $description;
            $this->projectId   = $projectId;
            $this->startDate   = $startDate;
            $this->endDate     = $endDate;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getProjectId()
        {
            return $this->projectId;
        }

        public function getStartDate()
        {
            return $this->startDate;
        }

        public function getEndDate()
        {
            return $this->endDate;
        }

        public function createTask(self $task)
        {
            $taskDAO = new TaskDAO();
            $task = $taskDAO->createTask($task);
        }

        public function getTaskById(int $taskId)
        {
            $taskDAO = new TaskDAO();
            $task = $taskDAO->getTaskById($taskId);

            return new self(
                $task['id'],
                $task['description'],
                $task['project_id'],
                $task['start_date'],
                $task['end_date'],
            );
        }

        public function getTasks()
        {
            $taskDAO = new TaskDAO();
            $tasks = $taskDAO->getTasks();

            array_map(function($task){
                return new self(
                    $task['id'],
                    $task['description'],
                    $task['project_id'],
                    $task['start_date'],
                    $task['end_date'],
                );
            }, $tasks);

            return $tasks;
        }
    }
?>