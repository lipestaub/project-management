<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Project</title>

    <script type="application/javascript" src="../public/javascript/script.js"></script>
</head>
<body>
    <h1>Register Project</h1>
    <form action="/register-project" method="post">
        <label for="name">Name</label>
        <br>
        <input type="text" name="name" id="name">
        <br>
        <br>
        <label for="description">Description</label>
        <br>
        <textarea name="description" id="" cols="30" rows="10" maxlength="255"></textarea>
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
        <input type="submit" value="Register Project" onclick="validateRegisterProjectFields();">
    </form>
    <br>
</body>
</html>