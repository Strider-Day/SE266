<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_games.php';

    $Result = 0;
    if (isset($_POST['login'])){
        $LoginUser = filter_input(INPUT_POST, 'userName');
        $LoginPass = filter_input(INPUT_POST, 'password');

        $Result = Login($LoginUser, $LoginPass);

        if ($Result == 1){
            $_SESSION['user'] = $LoginUser;


            header ('Location: index.php');
        }

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
    <title>Login</title>

    <link rel="stylesheet" href="style.css">
</head>

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

<div class="container">
    <h2>Login Page</h2>

    <div id="mainDiv">
        <form method="post" action="login.php">
           
            <div class="rowContainer">
                <h3>Please Login</h3>
            </div>
            <div class="rowContainer">
                <div class="col1">User Name:</div>
                <div class="col2"><input type="text" name="userName" ></div> 
            </div>
            <div class="rowContainer">
                <div class="col1">Password:</div>
                <div class="col2"><input type="password" name="password" ></div> 
            </div>
              <div class="rowContainer">
                <div class="col1">&nbsp;</div>
                <div class="col2"><input type="submit" name="login" value="Login" class="btn btn-warning"></div> 
            </div>
            
        </form>

        <p><?= $Result==2?"Login Failed. Try Again":"";?></p>
        
    </div>
</div>