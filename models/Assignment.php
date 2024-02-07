<?php 

    class Assignment
    {
        private ?int $id;
        private ?int $userId;
        private ?int $taskId;
        private ?DateTime $date;

        public function __construct(?int $id = null, ?int $userId = null, ?int $taskId = null, ?DateTime $date)
        {
            $this->id     = $id;
            $this->userId = $userId;
            $this->taskId = $taskId;
            $this->date   = $date;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getUserId()
        {
            return $this->userId;
        }

        public function getTaskId()
        {
            return $this->taskId;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function createAssignment(Assignment $assignment)
        {
            $assignmentDAO = new AssignmentDAO();
            $assignment = $assignmentDAO->createAssignment($assignment);
        }

    }
?>