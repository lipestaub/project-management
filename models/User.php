<?php 
    require_once __DIR__ . "/../DAL/UserDAO.php";

    class User
    {
        private ?int $id;
        private ?string $username;
        private ?string $email;

        public function __construct(?int $id = null, ?string $username = null, ?string $email = null)
        {
            $this->id       = $id;
            $this->username = $username;
            $this->email = $email;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function createUser(self $user)
        {
            $userDAO = new UserDAO();
            $userDAO->createUser($user);
        }

        public function getUserById(int $userId)
        {
            $userDAO = new UserDAO();
            $user = $userDAO->getUserById($userId);
            
            return new self(
                $user['id'],
                $user['username'],
                $user['password'],
                $user['email'],
            );
        }

        public function getUserByEmailAndPassword(string $email, string $password)
        {
            $userDAO = new UserDAO();
            $user = $userDAO->getUserByUsernameAndPassword($email, $password);

            return new self(
                $user['id'],
                $user['username'],
                $user['password'],
                $user['email'],
            );
        }

        public function getUserByEmail(string $email)
        {
            $userDAO = new UserDAO();
            $user = $userDAO->getUserByUsername($email);

            return new self(
                $user['id'],
                $user['username'],
                $user['password'],
                $user['email'],
            );
        }

        public function getUsers()
        {
            $userDAO = new UserDAO();
            $users = $userDAO->getUsers();

            array_map(function($user){
                return new self(
                    $user['id'],
                    $user['username'],
                    $user['password'],
                    $user['email'],
                );
            }, $users);

            return $users;
        }

    }
?>