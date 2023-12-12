<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Edit Game</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
   

<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_games.php';
    
    $error = "";

    


    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'GameId');


        
        if($action == "Update"){
            
            $game = getGame($id);
            $GameName = $game["GameName"];
            $PublishedDate = $game["PublishedDate"];
            $Rated = $game["Rated"];
            $Review = $game["Review"];
            $Developer = $game["Developer"];
            
        }
        else{
            $GameName = "";
            $PublishedDate = "";
            $Rated = "";
            $Review = "";
            $Developer = "";
        }

        
    }
    if (isset($_POST['Update_game'])){
        $id = filter_input(INPUT_POST, 'id');
        $GameName = filter_input(INPUT_POST, 'name');
        $PublishedDate = filter_input(INPUT_POST, 'published');
        $Rated = filter_input(INPUT_POST, 'rated');
        $Review = filter_input(INPUT_POST, 'review');
        $Developer = filter_input(INPUT_POST, 'dev');

        if ($GameName == "") $error .= "<li>Please Provide game name</li>";
        if ($PublishedDate == "") $error .= "<li>Please Provide published date</li>";
        if ($Rated == "") $error .= "<li>Please Provide rated viewing</li>";
        if ($Review == "") $error .= "<li>Please Provide the review</li>";
        if ($Developer == "") $error .= "<li>Please Provide the developer</li>";



        if ($error == ""){
            updategame($id, $GameName, $PublishedDate, $Rated, $Review, $Developer);
            header('Location: index.php');
        }
        
        

       
    }
    elseif (isset($_POST['Delete_game'])){
        $id = filter_input(INPUT_POST, 'id');
        
        deletegame($id);
        header('Location: index.php');
    }

?>
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



    <h2>Update Game Info</h2>

    <form name="team" method="post" action="edit_game.php">
        
        
        <div class="wrapper">
        <form method="post" name="addgame">
            <input type="hidden" name="id" value="<?= $id?>" >
            <label>Game: </label>
            <input type="text" name="name" value="<?php echo $GameName;?>" />
            <br>
            <label>Published Date: </label>
            <input type="Date" name="published" value="<?php echo $PublishedDate;?>"/>
            <br>
            <label>Rated: </label>
            <input type="text" name="rated" value="<?= $Rated;?>"/>
            <br>
            <label>Review (/5): </label>
            <input type="text" name="review" value="<?php echo $Review;?>"/>
            <br>
            <label>Developer: </label>
            <input type="text" name="dev" value="<?php echo $Developer;?>"/>


            <div>
                &nbsp;
            </div>
            <div>
            <input type="submit" name="Update_game" value="Update Game" />
            </div>
            <div>
                &nbsp;
            </div>
            <div>
            <input type="submit" name="Delete_game" value="Delete Game" />
            </div>
        </form> 
        <br>
        <a href="index.php">Back to View All</a>  
        <br>
        <ul>
            <?= $error ?>
        </ul>
        </div>

       
    </form>


    </body>
</html>