<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects List</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include_once __DIR__ . '/../public/html/menu.html'; ?>

    <h1>Projects List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th></th>
        </tr>
        <?php
            foreach ($projects as $project) {
        ?>
                <tr>
                    <td><?php echo $project->getName(); ?></td>
                    <td><?php echo $project->getDescription(); ?></td>
                    <td><?php echo $project->getStartDate(); ?></td>
                    <td><?php echo $project->getEndDate(); ?></td>
                    <td>
                        <form action="/project" method="post" id="table-form">
                            <input type="hidden" name="project_id" id="project_id" value=<?php echo $project->getId(); ?>>
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