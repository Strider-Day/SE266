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
        //calling the array with a foreach loop
            foreach ($animals as $type) {
                echo "<li>$type</li>";
            }
        ?>
    </ul>
</body>
</html>