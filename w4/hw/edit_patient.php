
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient edit</title>
</head>
<body>
    

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_patient.php';
    
    $error = "";

    //IF COMING FROM A GET REQUEST, ASSIGN OUR ACTION AND ID!
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'teamId');

        if($action == "Update"){
            $team = getTeam($id);
            $teamName = $team["teamName"];
            $division = $team['division'];
        }else{
            $teamName = "";
            $division = "";
        }

        //UPDATE TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE updateTeam() METHOD!
    }elseif (isset($_POST['Update_team'])){
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'team_id');
        $teamName = filter_input(INPUT_POST, 'team_name');
        $division = filter_input(INPUT_POST, 'division');

        updateTeam($id, $teamName, $division);
        header('Location: view_teams.php');

        //ADD TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE addTeam() METHOD!
    }elseif (isset($_POST['Add_team'])){
        $action = filter_input(INPUT_POST, 'action');
        $teamName = filter_input(INPUT_POST, 'team_name');
        $division = filter_input(INPUT_POST, 'division');
        
        addTeam($teamName, $division);
        header('Location: view_teams.php');
    }

?>

    <!-- ADD TEAM FORM -->
    <h2><?= $action; ?> Patient Info</h2>

    <form name="team" method="post" action="edit_patient.php">
        
        <!--FORM-->
        <div class="wrapper">
        <form method="post" name="addpatient">
            <label>First Name: </label>
            <input type="text" name="first" value="<?php echo $FirstName;?>" />
            <br>
            <label>Last Name: </label>
            <input type="text" name="last" value="<?php echo $LastName;?>"/>
            <br>
            <label>Married: </label>
            <input type="radio" id="yes" name="married" value="1" />
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="married" value="0" />
            <label for="no">No</label>
            <br>
            <label>Birth Date: </label>
            <input type="Date" name="birthdate" value="<?php echo $BirthDate;?>"/>
            <br>


            <div>
                &nbsp;
            </div>
            <div>
                <!-- WE CAN USE OUR 'ACTION' VALUE FROM THE GET RESULT TO MANIPULATE THE FORM! -->
                <input type="submit" name="<?= $action; ?>_patient" value="<?= $action; ?> Patient Information" />
            </div>
           
        </div>

       
    </form>
    <p>
       
    </p>


    </body>
</html>