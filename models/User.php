<?php 
    require_once __DIR__ . "/../DAL/UserDAO.php";

    class User
    {
        private ?int $id;
        private ?string $name;
        private ?string $email;
        private ?string $password;

        public function __construct(?int $id = null, ?string $name = null, ?string $email = null, ?string $password = null)
        {
            $this->id       = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
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
                $user['name'],
                $user['email'],
                $user['password'],
            );
        }

        public function getUserByEmailAndPassword(string $email, string $password)
        {
            $userDAO = new UserDAO();
            $user = $userDAO->getUserByEmailAndPassword($email, $password);

            return new self(
                $user['id'],
                $user['name'],
                $user['email'],
                $user['password'],
            );
        }

        public function getUserByEmail(string $email)
        {
            $userDAO = new UserDAO();
            $user = $userDAO->getUserByEmail($email);

            return new self(
                $user['id'],
                $user['name'],
                $user['email'],
                $user['password'],
            );
        }

        public function getUsers()
        {
            $userDAO = new UserDAO();
            $users = $userDAO->getUsers();

            array_map(function($user){
                return new self(
                    $user['id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                );
            }, $users);

            return $users;
        }

    }
?>