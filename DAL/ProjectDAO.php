<?php 
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
    }

?>
