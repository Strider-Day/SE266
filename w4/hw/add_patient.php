<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_patient.php';

    $error = "";
    $FirstName = "";
    $LastName = "";
    $Married = "";
    $BirthDate = "";
    $now = new DateTime;

    function age($bday) {  
        $date = new DateTime($bday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    if (isset($_POST['storepatient'])){
        $FirstName = filter_input(INPUT_POST, 'first_name');
        $LastName = filter_input(INPUT_POST, 'last_name');
        $Married = filter_input(INPUT_POST, 'married');
        $BirthDate = filter_input(INPUT_POST, 'bday');


        if ($FirstName == "") $error .= "<li>Please Provide first name";
        if ($LastName == "") $error .= "<li>Please Provide last name";
        if ($Married == "") $error .= "<li>Please Provide marriage status";
        if ($BirthDate == "") $error .= "<li>Please Provide BirthDate";
    }

    if (isset($_POST['storepatient']) && $error == "" ){
        addpatient($FirstName, $LastName, $Married, $BirthDate);
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

            <div >
                &nbsp;
            </div>
            <div>
                <input type="submit" name="storepatient" value="Save new Patient Information" />
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['storepatient']) && $error == ""):
    ?>
        <h2>Patient was Added</h2>
        
        <ul>
            <li><?= "First Name: $FirstName"; ?></li>
            <li><?= "LastName: $LastName"; ?></li>
        </ul>

        <a href="view_patient.php">View All Patients</a>
    <?php
        endif;
    ?>
</body>
</html>