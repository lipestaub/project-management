<?php 
    require_once __DIR__ . '/../config/Connect.php';
    class ProjectDAO
    {
        private $db;

        public function __construct()
        {
            $this->db = Connection::getConnection();
        }

        public function createProject(Project $project)
        {
            $query = 'INSERT INTO project (name, description, start_date, end_date) VALUES (:name, :description, :start_date, :end_date);';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":name", $project->getName());
            $stmt->bindValue(":description", $project->getDescription());
            $stmt->bindValue(":start_date", $project->getStartDate());
            $stmt->bindValue(":end_date", $project->getEndDate());
            $stmt->execute();
        }

        public function getProjects()
        {
            $query = 'SELECT * FROM project';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }

        public function getProjectById(int $projectId)
        {
            $query = 'SELECT * FROM project WHERE id = :id';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id", $projectId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0];
        }
    }

?>
