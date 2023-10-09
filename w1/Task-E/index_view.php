<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php
        //put a check in the foreach loop to identify when completed is called. If Completed == true a checkbox will appear, if not it will say incomplete
            foreach ($task as $key => $val) {
                if ($key == "completed"){
                    if ($val == true){
                        echo "<li><strong>$key</strong>: <span>&#9989;</span></li>";
                    }
                    else{
                        echo "<li><strong>$key</strong>: Incomplete</li>";
                    }
                }
                else{
                    echo "<li><strong>$key</strong>: $val</li>";
                }
                
            }
        ?>
    </ul>
</body>
</html>