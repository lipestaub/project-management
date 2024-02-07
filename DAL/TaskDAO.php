<?php 
    class TaskDAO
    {
        private $db;

        public function __construct()
        {
            $this->db = Connection::getConnection();
        }

        public function createTask(Task $task)
        {
            $query = 'INSERT INTO task (description, project_id, start_date, end_date) VALUES (:description, :project_id, :start_date, :end_date);';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":description", $task->getDescription());
            $stmt->bindValue(":project_id", $task->getProjectId());
            $stmt->bindValue(":start_date", $task->getStartDate());
            $stmt->bindValue(":start_date", $task->getEndDate());
            $stmt->execute();
        }
    }
?>