<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_games.php';

    $error = "";
    $GameName = "";
    $PublishedDate = "";
    $Rated = "";
    $Review = "";
    $Developer = "";
    

    if (isset($_POST['storegame'])){
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
    }

    if (isset($_POST['storegame']) && $error == "" ){
        addgame($GameName, $PublishedDate, $Rated, $Review, $Developer);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Game</title>
</head>
<body>
    <h2>Add a Game</h2>
    <div class="wrapper">
        <form method="post" name="addgame">
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
                <input type="submit" name="storegame" value="Save new Game" />
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['storegame']) && $error == ""){

            header ('Location: index.php');
        }
    ?>
</body>
</html>