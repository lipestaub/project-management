<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Task</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <script type="application/javascript" src="../public/javascript/script.js"></script>
</head>
<body>
    <?php include_once __DIR__ . '/../public/html/menu.html'; ?>
    
    <h1>Register Task</h1>
    <form action="/register-task" method="post" onsubmit="validateRegisterTaskFields(event);">
        <label for="description">Description</label>
        <br>
        <textarea name="description" id="" cols="30" rows="10" maxlength="255"></textarea>
        <br>
        <br>
        <label for="project_id">Project</label>
        <br>
        <select name="project_id" id="project_id">
            <option value="0">Select</option>
            <?php
                foreach ($projects as $project) {
            ?>
                    <option value="<?php echo $project->getId(); ?>"><?php echo $project->getName(); ?></option>
            <?php
                }
            ?>
        </select>
        <br>
        <br>
        <label for="start_date">Start Date</label>
        <br>
        <input type="date" name="start_date" id="start_date">
        <br>
        <br>
        <label for="end_date">End Date</label>
        <br>
        <input type="date" name="end_date" id="end_date">
        <br>
        <br>
        <input type="submit" value="Register Task">
    </form>
    <br>
</body>
</html>