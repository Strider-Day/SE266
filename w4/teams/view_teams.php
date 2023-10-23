<?php

    include __DIR__ . '/model/model_teams.php';
    include __DIR__ . '/functions.php';

    $teams = getTeams();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">

    <h1>NFL Teams</h1>

    <a href="add_team.php">Add New Team</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Team Name</th>
                <th>Division</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $t):?>
                <tr>
                    <td><?= $t['id'];?></td>
                    <td><?= $t['teamName']?></td>
                    <td><?= $t['division']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>