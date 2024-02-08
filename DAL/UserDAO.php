<?php
    require_once __DIR__ . '/../config/Connect.php';
    
    class UserDAO
    {
        private $db;

        public function __construct()
        {
            $this->db = Connection::getConnection();
        }

        public function createUser(User $user)
        {
            $query = 'INSERT INTO "user" (username, password, email) VALUES (:username, :password, :email);';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":username", $user->getUsername());
            $stmt->bindValue(":password", $user->getPassword());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->execute();
        }

        public function getUserById(int $userId)
        {
            $query = 'SELECT * FROM "user" WHERE id = :id;';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":id", $userId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0];
        }

        public function getUserByEmailAndPassword(string $email, string $password)
        {
            $query = 'SELECT * FROM "user" WHERE email = :email AND password = :password;';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0];
        }

        public function getUserByEmail(string $email)
        {
            $query = 'SELECT * FROM "user" WHERE email = :email;';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll()[0];
        }

        public function getUsers()
        {
            $query = 'SELECT * from "user";';
            $stmt = $this->db->prepare($query);
            $stmt->execute();  
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
    }
?>