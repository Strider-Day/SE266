<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>GG Home</title>

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


    <div class="container">
                
        <div class="col-sm-12">
            <h2>Games</h2>
        
            <a href="add_game.php">Add New Game</a>
            <br>
            <a href="search_game.php">Search Games</a>
            <br>
            
    
        <?php

            
            
            include __DIR__ . '/model/model_games.php';
            include __DIR__ . '/model/model_cust.php';
            $games = getgames();
            $cust = getCustomers();
            
            
        ?>
    
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>

                        <th>Game</th>
                        <th>Published Date</th>
                        <th>Rated</th>
                        <th>Review</th>
                        <th>Developer</th>
                    </tr>
                </thead>
                <tbody>
            
                
                <?php foreach ($games as $g): ?>
                    <tr>
                        <td><?= $g['GameId']; ?></td>
                        <td><?= $g['GameName']; ?></td>
                        <td><?= $g['PublishedDate']; ?></td>
                        <td><?= $g['Rated']; ?></td>
                        <td><?= $g['Review']; ?></td>
                        <td><?= $g['Developer']; ?></td> 
                        <?php if (isset($_SESSION['user'])){?>
                            <td><a href="edit_game.php?action=Update&GameId=<?= $g['GameId']; ?>">Edit</a></td>
                        <?php
                        }
                        ?>            
                    </tr>
                <?php endforeach; ?>
                </tbody>
        </table>
            
        <br>
        </div>
    </div>

    <?php if (isset($_SESSION['user'])){?>
        <div class="container">
                    
            <div class="col-sm-12">
                <h2>Customers</h2>
            
                <a href="add_cust.php">Add New Customer</a>
                <br>
                <a href="search_cust.php">Search Customers</a>
        
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
    <?php
    }
    ?>
</body>
</html>

