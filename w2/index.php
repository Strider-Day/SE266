<?php

$error = "";
$fname = "";
$lname = "";
$married = "";
$birthdate = "";
$fheight = "";
$iheight = "";
$weight = "";
$age = "";
$bmi = "";
$classification = "";
$status = "display: none";




if (isset($_POST['btnsubmit'])){
    $fname = filter_input(INPUT_POST, 'first');
    $lname = filter_input(INPUT_POST, 'last');
    $married = filter_input(INPUT_POST, 'married');
    $birthdate = filter_input(INPUT_POST, 'birthdate');
    $fheight = filter_input(INPUT_POST, 'fheight', FILTER_VALIDATE_INT);
    $iheight = filter_input(INPUT_POST, 'iheight', FILTER_VALIDATE_INT);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);

    $status = "none";

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
    elseif($birthdate > date("Y-m-d", time())){
        $error .= "<li>ERROR: You entered a future date</li>";
    }
    if ($fheight == ""){
        $error .= "<li>ERROR: Need to submit a height(feet)</li>";
    }
    elseif($fheight <= 0 or $fheight > 10){
        $error .= "<li>ERROR: Please enter a valid height(ft)";
        $fheight = "";
    }
    if ($iheight == ""){
        $error .= "<li>ERROR: Need to submit a height(inches)</li>";
    }
    elseif($iheight < 0 or $iheight >= 12){
        $error .= "<li>ERROR: Please enter a valid height(in)";
        $iheight = "";
    }
    if ($weight == ""){
        $error .= "<li>ERROR: Need to submit a weight</li>";
    }
    elseif($weight <= 0 or $weight >= 1000){
        $error .= "<li>ERROR: Weight is an invalid value</li>";
    }


    if ($error == ""){
        $bdate = new DateTime($birthdate);
        $now = new DateTime();
        $age = $now->diff($bdate);
        $age = $age->y;

        $kg = $weight / 2.20462;
        $in = $fheight * 12 + $iheight;
        $meters = $in * .0254;

        $bmi = $kg/ $meters**2;

        if ($bmi < 18.5){
            $classification = "underweight";
        }
        elseif ($bmi >= 18.5 and $bmi < 25){
            $classification = "normal weight";
        }
        elseif ($bmi >= 25 and $bmi < 30){
            $classification = "normal weight";
        }
        else{
            $classification = "obese";
        }

        $status = "";

    }

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
        <input type="text" name="first" value="<?php echo $fname;?>" />
        <br>
        <label>Last Name: </label>
        <input type="text" name="last" value="<?php echo $lname;?>"/>
        <br>
        <label>Married: </label>
        <input type="radio" id="yes" name="married" value="yes" />
        <label for="yes">Yes</label>
        <input type="radio" id="no" name="married" value="no" />
        <label for="no">No</label>
        <br>
        <label>Birth Date: </label>
        <input type="Date" name="birthdate" value="<?php echo $birthdate;?>"/>
        <br>
        <label>Height </label>
        <label for="fheight">Feet</label>
        <input type="text" name="fheight" value="<?php echo $fheight;?>"/>
        <label for="iheight">Inches</label>
        <input type="text" name="iheight" value="<?php echo $iheight;?>"/>
        <br>
        <label>Weight (lbs): </label>
        <input type="text" name="weight" value="<?php echo $weight;?>"/>
        <br>
        <input type="submit" name="btnsubmit" />
    </form>
    <br>
    <br>
    <div class="confirm" style="<?php echo $status?>">
        <h2> Confirmation Info </h2>
        <?php echo "<li>Name: $fname $lname</li>" ?>
        <?php echo "<li>Married: $married</li>" ?>
        <?php echo "<li>Birthdate: $birthdate</li>" ?>
        <?php echo "<li>Age: $age</li>" ?>
        <?php echo "<li>Height: $fheight ft $iheight in</li>" ?>
        <?php echo "<li>Weight: $weight</li>" ?>
        <?php echo "<li>BMI: $bmi</li>" ?>
        <?php echo "<li>Classification: $classification</li>" ?>

    </div>
</body>
</html>
