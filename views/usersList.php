<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="../public/css/style.css">

</head>
<body>
    <?php include_once __DIR__ . '/../public/html/menu.html'; ?>
    
    <h1>Users List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th></th>
        </tr>
        <?php
            foreach ($users as $user) {
        ?>
            <tr>
                <td><?php echo $user->getName(); ?></td>
                <td><?php echo $user->getEmail(); ?></td>
                <td>
                    <form action="/user" method="post" id="table-form">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->getId(); ?>">
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