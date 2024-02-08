<?php 
    class AssignmentDAO
    {

        private $db;

        public function __construct()
        {
            $this->db = Connection::getConnection();
        }

        public function createAssignment(Assignment $assignment)
        {
            $query = 'INSERT INTO assignment (user_id, task_id, date) VALUES (:user_id, :task_id, :date);';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue('user_id', $assignment->getId());
            $stmt->bindValue('task_id', $assignment->getTaskId());
            $stmt->bindValue('date', $assignment->getDate());
            $stmt->execute();
        }

        public function getAssignmentsByUserId(int $userId)
        {
            $query = 'SELECT * FROM assignment WHERE user_id = :user_id;';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":user_id", $userId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function getAssignmentsByTaskId(int $taskId)
        {
            $query = 'SELECT * FROM assignment WHERE task_id = :task_id;';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":task_id", $taskId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
    }
?>