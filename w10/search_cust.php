<?php
    session_start();

    if  (!isset($_SESSION['user'])){
        header ('Location: index.php');
    
    }

    include __DIR__ . '/model/model_cust.php';

    
    if (isset($_POST['searchcust'])){
        $FirstName = filter_input(INPUT_POST, 'first');
        $LastName = filter_input(INPUT_POST, 'last');

        $cust = searchCustomer($FirstName, $LastName);
        
        
    }
    else{
        $FirstName = "";
        $LastName = "";
        $cust = []; 
    }
        
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Search Customers</title>
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
    <div class="wrapper">
        <form method="post" name="custsearch">
            <label>First Name: </label>
            <input type="text" name="first" value="" />
            <br>
            <label>Last Name: </label>
            <input type="text" name="last" value=""/>
            <br>
            

            <div >
                &nbsp;
            </div>
            <div>
                <input type="submit" name="searchcust" value="Search Customer" />
            </div>

            <a href="index.php">Back to View All</a>
        </form>
    </div>

    <div class="container">
                    
            <div class="col-sm-12">
        
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    
                    <?php foreach ($cust as $c): ?>
                        <tr>
                            <td><?= $c['CustId']; ?></td> 
                            <td><?= $c['FirstName']; ?></td>
                            <td><?= $c['LastName']; ?></td>
                            <td><?= $c['Email']; ?></td>
                            <td><?= $c['PhoneNumber']; ?></td>
                            
                            <td><a href="edit_cust.php?action=Update&CustomerId=<?= $c['CustId']; ?>">Edit</a></td>
            
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
            </div>
    </div>
</body>