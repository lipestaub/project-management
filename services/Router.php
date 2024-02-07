<?php
    class Router
    {
        private array $routes;

        public function __construct()
        {
            $this->routes = [
                'GET' => [
                    '/' => 'UserController@signInPage',
                    '/sign-in' => 'UserController@signInPage',
                    '/sign-up' => 'UserController@signUpPage',
                    '/sign-out' => 'UserController@signOut',
                    '/project' => 'ProjectController@projectPage',
                    '/projects-list' => 'ProjectController@projectsPage',
                    '/register-project' => 'ProjectController@registerProjectPage',
                    '/task' => 'TaskController@taskPage',
                    '/tasks-list' => 'TaskController@tasksPage',
                    '/register-task' => 'TaskController@registerTaskPage',
                    '/user' => 'UserController@userPage',
                    '/users-list' => 'UserController@usersPage',
                    '/register-user' => 'UserController@registerUserPage'
                ],
                'POST' => [
                    '/sign-in' => 'UserController@validateEmailAndPassword',
                    '/sign-up' => 'UserController@createUser',
                    '/register-project' => 'ProjectController@createProject',
                    '/register-task' => 'TaskController@createTask',
                    '/register-user' => 'UserController@createUser',
                    '/assign-user-to-task' => 'AssignmentController@createAssignment'
                ]
            ];
        }

        public function getResponse(Request $request)
        {
            if (isset($this->routes[$request->getMethod()][$request->getRoute()])) {
                $controllerInfo = explode('@', $this->routes[$request->getMethod()][$request->getRoute()]);
                
                $controllerName = $controllerInfo[0];
                $controllerMethod = $controllerInfo[1];
                                
                require_once __DIR__ . '/../controllers/' . $controllerName . '.php';
            
                $controller = new $controllerName();
            
                $controller->$controllerMethod();
            } 
            else {
                header("HTTP/1.0 404 Not Found");
                echo '404 - Page not found';
            }
        }
    }
?>