<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="../public/css/style.css">

    <script type="application/javascript" src="../public/javascript/script.js"></script>
</head>
<body>
    <?php include_once __DIR__ . '/../public/html/menu.html'; ?>
    
    <h1>Task</h1>
    <p>Description: <?php echo $task->getDescription(); ?></p>
    <br>
    <p>Start Date: <?php echo $task->getStartDate(); ?></p>
    <br>
    <p>End Date: <?php echo $task->getEndDate(); ?></p>
    <br>
    <h2>Task's User List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th></th>
        </tr>
        <?php
            foreach ($taskUsers as $user) {
        ?>
                <tr>
                    <td><?php echo $user->getName(); ?></td>
                    <td><?php echo $user->getEmail(); ?></td>
                    <td>
                        <form action="/user" method="post">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->getId(); ?>">
                            <input type="submit" value="Open">
                        </form>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
    <hr>
    <h2>Assign User to Task</h1>
    <form action="/assign-user-to-task" method="post" onsubmit="validateAssignUserToTaskFields(event);">
        <label for="user_id">User</label>
        <br>
        <select name="user_id" id="user_id">
            <option value="0">Select</option>
            <?php
                foreach ($users as $user) {
            ?>
                    <option value="<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?></option>
            <?php
                }
            ?>
        </select>
        <input type="hidden" name="task_id" id="task_id" value="<?php echo $task->getId(); ?>">
        <br>
        <br>
        <input type="submit" value="Assign">
    </form>
</body>
</html>