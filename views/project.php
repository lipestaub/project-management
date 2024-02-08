<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include_once __DIR__ . '/../public/html/menu.html'; ?>
    
    <h1><?php echo $project->getName(); ?></h1>
    <p>Description:<?php echo $project->getDescription(); ?></p>
    <br>
    <p>Start Date:<?php echo $project->getStartDate(); ?></p>
    <br>
    <p>End Date:<?php echo $project->getEndDate(); ?></p>
    <br>
    <h2>Projects's Task List</h1>
    <table>
        <tr>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th></th>
        </tr>
        <?php 
            foreach($tasks as $task){
        ?>
        <tr>
            <td><?php echo $task->getDescription(); ?></td>
            <td><?php echo $task->getStartDate(); ?></td>
            <td><?php echo $task->getEndDate(); ?></td>
            <td>
                <form action="/task" method="post">
                    <input type="hidden" name="task_id" id="task_id" value="<?php echo $task->getId(); ?>">
                    <input type="submit" value="Open">
                </form>
            </td>
        </tr>
        <?php 
            }
        ?>
    </table>
</body>
</html>