<?php
    session_start();
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


        if ($FirstName == "") $error .= "<li>Please Provide first name</li>";
        if ($LastName == "") $error .= "<li>Please Provide last name</li>";
        if ($Email == "") $error .= "<li>Please Provide Email</li>";
        if ($PhoneNumber == "") $error .= "<li>Please Provide Phone Number</li>";
    }

    if (isset($_POST['storecust']) && $error == "" ){
        addcustomer($FirstName, $LastName, $Email, $PhoneNumber);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Add Customer</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container text-center">
            <div class="row">
            <?php 
            if (isset($_SESSION['user'])){?>
                <div class="col-sm-2"><a href="logoff.php">Logout</a></div>
            <?php
            }
            else{?>
                <div class="col-sm-2"><a href="login.php">Employee Login</a></div>
            <?php 
            }
            ?>
                <div class="col-sm-12"><h1>Generation Gamers</h1></div>
            </div>
        </div>
    </header> 
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
        <br>
        <a href="index.php">Back to View All</a> 
        <br>
        <ul>
            <?= $error ?>
        </ul>


    </div>
    <?php
        if (isset($_POST['storecust']) && $error == ""){

            header ('Location: index.php');
        }
        
    ?>
</body>
</html>