<?php
    require_once __DIR__ . '/../models/Assignment.php';

    class AssignmentController
    {
        public function createAssignment()
        {
            $taskId = (int) $_POST['task_id'];
            $userId = (int) $_POST['user_id'];

            $assignmentModel = new Assignment();

            $assignedUser = $assignmentModel->getAssignmentByTaskIdAndUserId($taskId, $userId);

            if ($assignedUser->getId() === null) {
                $assignmentModel->createAssignment(new Assignment(null, $userId, $taskId, null));
            }

            http_build_query(['task_id' => $taskId]);
            header('HTTP/1.1 307');
            header('Location: /task');
            exit();
        }
    }
?>