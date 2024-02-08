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

        public function getTaskById(int $taskId)
        {
            $query = 'SELECT * FROM task WHERE id = :id;';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id", $taskId);
            $stmt->execute();
        }

        public function getTasks()
        {
            $query = 'SELECT * FROM task;';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
    }
?>