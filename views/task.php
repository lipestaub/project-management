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
    
    <h1>Task Description</h1>
    <p>Start Date: 05/02/2024</p>
    <br>
    <p>End Date: 05/02/2024</p>
    <br>
    <h2>Task's User List</h1>
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
                </form>
            </td>
        </tr>
    </table>
    <hr>
    <h2>Assign User to Task</h1>
    <form action="/assign-user-to-task" method="post" onsubmit="validateAssignUserToTaskFields(event);">
        <label for="user_id">User</label>
        <br>
        <select name="user_id" id="user_id">
            <option value="0">Select</option>
            <option value="echo">echo</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Assign">
    </form>
</body>
</html>