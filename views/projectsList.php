<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects List</title>
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
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <form action="/project" method="get">
                    <input type="hidden" name="project_id" id="project_id" value="echo">
                </form>
            </td>
        </tr>
    </table>
</body>
</html>