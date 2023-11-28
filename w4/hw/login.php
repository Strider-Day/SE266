<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_patient.php';

    $Result = 0;
    if (isset($_POST['login'])){
        $LoginUser = filter_input(INPUT_POST, 'userName');
        $LoginPass = filter_input(INPUT_POST, 'password');

        $Result = Login($LoginUser, $LoginPass);

        if ($Result == 1){
            $_SESSION['user'] = $LoginUser;


            header ('Location: view_patient.php');
        }

    }
?>

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