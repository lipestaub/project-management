<?php
    require_once __DIR__ . "/../DAL/AssignmentDAO.php";

    class Assignment
    {
        private ?int $id;
        private ?int $userId;
        private ?int $taskId;
        private ?DateTime $date;

        public function __construct(?int $id = null, ?int $userId = null, ?int $taskId = null, ?DateTime $date = null)
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

        public function createAssignment(self $assignment)
        {
            $assignmentDAO = new AssignmentDAO();
            $assignment = $assignmentDAO->createAssignment($assignment);
        }

        public function getAssignmentsByUserId(int $userId)
        {
            $assignmentDAO = new AssignmentDAO();
            $assignments = $assignmentDAO->getAssignmentsByUserId($userId);

            return array_map(function($assignment){
                return new self(
                    $assignment['id'],
                    $assignment['user_id'],
                    $assignment['task_id'],
                    new DateTime($assignment['date']),
                );
            }, $assignments);
        }

        public function getAssignmentByTaskId(int $taskId)
        {
            $assignmentDAO = new AssignmentDAO();
            $assignments = $assignmentDAO->getAssignmentsByTaskId($taskId);

            return array_map(function($assignment){
                return new self(
                    $assignment['id'],
                    $assignment['user_id'],
                    $assignment['task_id'],
                    new DateTime($assignment['date']),
                );
            }, $assignments);
        }

        public function getAssignmentByTaskIdAndUserId(int $taskId, int $userId)
        {
            $assignmentDAO = new AssignmentDAO();
            $assignment = $assignmentDAO->getAssignmentByTaskIdAndUserId($taskId, $userId);

            return new self(
                $assignment['id'],
                $assignment['user_id'],
                $assignment['task_id'],
                new DateTime($assignment['date']),
            );
        }
    }
?>