<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects List</title>
</head>
<body>
    <?php include_once __DIR__ . '/../public/html/menu.html'; ?>
    
    <h1>Task List</h1>
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
                    <input type="submit" value="Open">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>