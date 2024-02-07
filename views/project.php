<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
</head>
<body>
    <?php include_once '../public/html/menu.html'; ?>
    
    <h1>Project Name</h1>
    <p>Description: Description</p>
    <br>
    <p>Start Date: 05/02/2024</p>
    <br>
    <p>End Date: 05/02/2024</p>
    <br>
    <h2>Projects's Task List</h1>
    <table>
        <tr>
            <th>Description</th>
            <th>Projeto</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th></th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <form action="/task" method="get">
                    <input type="hidden" name="task_id" id="task_id" value="echo">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>