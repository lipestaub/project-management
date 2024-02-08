<?php 
    require_once __DIR__ . '/../config/Connect.php';
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
            $stmt->bindValue(":end_date", $task->getEndDate());
            $stmt->execute();
        }

        public function getTaskById(int $taskId)
        {
            $query = 'SELECT * FROM task WHERE id = :id;';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id", $taskId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0];
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