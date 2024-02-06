<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>

    <script type="application/javascript" src="../public/javascript/script.js"></script>
</head>
<body>
    <?php include_once '../public/html/menu.html'; ?>
    
    <h1>Register User</h1>
    <form action="/register-user" method="post">
        <label for="name">Name</label>
        <br>
        <input type="text" name="name" id="name">
        <br>
        <br>
        <label for="email">E-mail</label>
        <br>
        <input type="text" name="email" id="email">
        <br>
        <br>
        <label for="password">Password</label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <label for="confirm_password">Confirm Password</label>
        <br>
        <input type="password" name="confirm_password" id="confirm_password">
        <br>
        <br>
        <input type="submit" value="Register User" onclick="validateRegisterUserFields();">
    </form>
    <br>
</body>
</html>