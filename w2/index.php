<?php

$error = "";

if (isset($_POST['btnsubmit'])){
    $fname = filter_input(INPUT_POST, 'first');
    $lname = filter_input(INPUT_POST, 'last');
    $married = filter_input(INPUT_POST, 'married');
    $birthdate = filter_input(INPUT_POST, 'birthdate');
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);

    
}

if ($fname == ""){
    $error .= "<li>ERROR: Need to submit a first name</li>";
}
if ($lname == ""){
    $error .= "<li>ERROR: Need to submit a last name</li>";
}
if ($married == ""){
    $error .= "<li>ERROR: Need to check a married option</li>";
}
if ($birthdate == ""){
    $error .= "<li>ERROR: Need to submit a birth date</li>";
}
if ($height == ""){
    $error .= "<li>ERROR: Need to submit a height</li>";
}
if ($weight == ""){
    $error .= "<li>ERROR: Need to submit a weight</li>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Form</title>
</head>
<body>
    <h1>Patient Form</h1>
    <div class="error">
        <?php echo $error; ?>
    </div>
    
    <form action="index.php" name="patient" method="post">
        <label>First Name: </label>
        <input type="text" name="first" />
        <br>
        <label>Last Name: </label>
        <input type="text" name="last" />
        <br>
        <label>Married: </label>
        <input type="radio" id="yes" name="married" value="yes" />
        <label for="yes">Yes</label>
        <input type="radio" id="no" name="married" value="no" />
        <label for="no">No</label>
        <br>
        <label>Birth Date: </label>
        <input type="Date" name="birthdate" />
        <br>
        <label>Height (in): </label>
        <input type="text" name="height" />
        <br>
        <label>Weight (lbs): </label>
        <input type="text" name="weight" />
        <br>
        <input type="submit" name="btnsubmit" />
    </form>
</body>
</html>
