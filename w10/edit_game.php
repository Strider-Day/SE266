<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game edit</title>
</head>
<body>
    

<?php 
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

        if ($GameName == "") $error .= "<li>Please Provide game name";
        if ($PublishedDate == "") $error .= "<li>Please Provide published date";
        if ($Rated == "") $error .= "<li>Please Provide rated viewing";
        if ($Review == "") $error .= "<li>Please Provide the review";
        if ($Developer == "") $error .= "<li>Please Provide the developer";



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
        </div>

       
    </form>


    </body>
</html>