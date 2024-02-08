<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
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
        <tr>
            <td></td>
            <td></td>
            <td>
                <form action="/user" method="get">
                    <input type="hidden" name="user_id" id="user_id" value="echo">
                    <input type="submit" value="Open">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>