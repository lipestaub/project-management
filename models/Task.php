<?php
    require_once __DIR__ . "/../DAL/TaskDAO.php";

    class Task
    {
        private ?int $id;
        private ?string $description;
        private ?int $projectId;
        private ?string $startDate;
        private ?string $endDate;

        public function __construct(?int $id = null, ?string $description = null, ?int $projectId = null, ?string $startDate = null, ?string $endDate = null)
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

            return array_map(function($task){
                return new self(
                    $task['id'],
                    $task['description'],
                    $task['project_id'],
                    $task['start_date'],
                    $task['end_date'],
                );
            }, $tasks);
        }

        public function getTasksByProjectId(int $projectId)
        {
            $taskDAO = new TaskDAO();
            $tasks = $taskDAO->getTasksByProjectId($projectId);

            return array_map(function($task){
                return new self(
                    $task['id'],
                    $task['description'],
                    $task['project_id'],
                    $task['start_date'],
                    $task['end_date'],
                );
            }, $tasks);
        }
    }
?>