<?php
    class Connection
    {
        public static function getConnection()
        {
            try {
                return new PDO('pgsql:host=localhost;dbname=project_manager', 'postgres', 'postgres');
            }
            catch (PDOException $exception) {
                echo "Connection failed: " . $exception->getMessage();
            }
        }
    }
?>