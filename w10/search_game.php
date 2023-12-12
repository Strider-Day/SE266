<?php
    session_start();

    include __DIR__ . '/model/model_games.php';

    
    if (isset($_POST['searchgame'])){
        $GameName = filter_input(INPUT_POST, 'name');
        $Developer = filter_input(INPUT_POST, 'dev');

        $games = searchGame($GameName, $Developer);
        
        
    }
    else{
        $GameName = "";
        $Developer = "";
        $games = []; 
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
    <title>Search Games</title>
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
        <form method="post" name="gamesearch">
            <label>Game: </label>
            <input type="text" name="name" value="" />
            <br>
            <label>Developer: </label>
            <input type="text" name="dev" value=""/>
            <br>
            

            <div >
                &nbsp;
            </div>
            <div>
                <input type="submit" name="searchgame" value="Search Games" />
            </div>

            <a href="index.php">Back to View All</a>
        </form>
    </div>

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
</body>