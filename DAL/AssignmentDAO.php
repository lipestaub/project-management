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
    }
?>