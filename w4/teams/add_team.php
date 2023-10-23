<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_teams.php';

    $error = "";
    $teamName = "";
    $division = "";

    if (isset($_POST['storeteam'])){
        $teamName = filter_input(INPUT_POST, 'team_name');
        $division = filter_input(INPUT_POST, 'division');

        //var_dump($teamName);
        //exit;

        if ($teamName == "") $error .= "<li>Please Provide team name";
        if ($division == "") $error .= "<li>Please Provide Division";
    }

    if (isset($_POST['storeteam']) && $error == "" ){
        addteam ($teamName, $division);
    }
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
    <div class="wrapper">
        <form method="post" name="addteam">
            <div class="label">
                <label>Team Name:</label>
            </div>
            <div>
                <input type="text" name="team_name" value="<?= $teamName; ?>" />
            </div>
            <div class="label">
                <label>Division:</label>
            </div>
            <div>
                <input type="text" name="division" value="<?= $division; ?>" />
            </div>

            <div >
                &nbsp;
            </div>
            <div>
                <input type="submit" name="storeteam" value="Save new Team Information" />
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['storeteam']) && $error == ""):
    ?>
        <h2>Team was Added</h2>
        
        <ul>
            <li><?= "Team Name: $teamName"; ?></li>
            <li><?= "Division: $division"; ?></li>
        </ul>

        <a href="view_teams.php">View All NFL Teams</a>
    <?php
        endif;
    ?>
</body>
</html>