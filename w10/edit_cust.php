<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer edit</title>
</head>
<body>
    

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_cust.php';
    
    $error = "";

    


    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'CustomerId');


        
        if($action == "Update"){
            $customer = getCustomer($id);
            $FirstName = $customer["FirstName"];
            $LastName = $customer["LastName"];
            $Email = $customer["Email"];
            $PhoneNumber = $customer["PhoneNumber"];

            
        }
        else{
            $error = "";
            $FirstName = "";
            $LastName = "";
            $Email = "";
            $PhoneNumber = "";
        }

        
    }
    if (isset($_POST['Update_cust'])){
        $id = filter_input(INPUT_POST, 'id');
        $FirstName = filter_input(INPUT_POST, 'first');
        $LastName = filter_input(INPUT_POST, 'last');
        $Email = filter_input(INPUT_POST, 'email');
        $PhoneNumber = filter_input(INPUT_POST, 'phone');


        if ($FirstName == "") $error .= "<li>Please Provide first name";
        if ($LastName == "") $error .= "<li>Please Provide last name";
        if ($Email == "") $error .= "<li>Please Provide Email";
        if ($PhoneNumber == "") $error .= "<li>Please Provide Phone Number";



        if ($error == ""){
            updateCustomer($id, $FirstName, $LastName, $Email, $PhoneNumber);
            header('Location: index.php');
        }
        
        

       
    }
    elseif (isset($_POST['Delete_cust'])){
        $id = filter_input(INPUT_POST, 'id');
        
        deletecustomer($id);
        header('Location: index.php');
    }

?>


    <h2>Update Customer Info</h2>

    <form name="team" method="post" action="edit_cust.php">
        
        
        <div class="wrapper">
        <form method="post" name="editcust">
            <input type="hidden" name="id" value="<?= $id?>" >
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


            <div>
                &nbsp;
            </div>
            <div>
            <input type="submit" name="Update_cust" value="Update customer" />
            </div>
            <div>
                &nbsp;
            </div>
            <div>
            <input type="submit" name="Delete_cust" value="Delete Customer" />
            </div>
        </form>   
        </div>

       
    </form>


    </body>
</html>