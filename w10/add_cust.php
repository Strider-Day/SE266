<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_cust.php';

    $error = "";
    $FirstName = "";
    $LastName = "";
    $Email = "";
    $PhoneNumber = "";
    

    if (isset($_POST['storecust'])){
        $FirstName = filter_input(INPUT_POST, 'first');
        $LastName = filter_input(INPUT_POST, 'last');
        $Email = filter_input(INPUT_POST, 'email');
        $PhoneNumber = filter_input(INPUT_POST, 'phone');


        if ($FirstName == "") $error .= "<li>Please Provide first name";
        if ($LastName == "") $error .= "<li>Please Provide last name";
        if ($Email == "") $error .= "<li>Please Provide Email";
        if ($PhoneNumber == "") $error .= "<li>Please Provide Phone Number";
    }

    if (isset($_POST['storecust']) && $error == "" ){
        addcustomer($FirstName, $LastName, $Email, $PhoneNumber);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add customer</title>
</head>
<body>
    <h2>Add Customer</h2>
    <div class="wrapper">
        <form method="post" name="addcust">
            <label>First Name: </label>
            <input type="text" name="first" value="<?php echo $FirstName;?>" />
            <br>
            <label>Last Name: </label>
            <input type="text" name="last" value="<?php echo $LastName;?>"/>
            <br>
            <label>Email: </label>
            <input type="text" name="email" value="<?= $Email;?>"/> 
            <br>
            <label>Phone Number: </label>
            <input type="text" name="phone" value="<?php echo $PhoneNumber;?>"/>
            <br>

            <div >
                &nbsp;
            </div>
            <div>
                <input type="submit" name="storecust" value="Save new Customer" />
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['storecust']) && $error == ""){

            header ('Location: index.php');
        }
        
    ?>
</body>
</html>