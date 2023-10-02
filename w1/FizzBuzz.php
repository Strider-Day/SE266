<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    /* Return Fizz Buzz if multiple of 2 and 3 (6)
    Return Fizz if multiple of 2
    Return Buzz if multiple of 3
    Return $num otherwise
    */
    function fizzBuzz($num) 
    {
        // Multiple if statements for each scenario. Did Fizz Buzz first because it was most specific. Used remainder and checked to see if it was 0.
        if ($num % 2 == 0 && $num % 3 == 0)
        {
            $result = "Fizz Buzz";
            return $result;
        }
        elseif ($num % 2 == 0)
        {
            $result = "Fizz";
            return $result;
        }
        elseif ($num % 3 == 0)
        {
            $result = "Buzz";
            return $result;
        }
        else
        {
            $result = $num;
            return $result;
        }
    }

    ?>
    <h2>Fizz Buzz Up to 100</h2>
    
    <?php
    //calling fizzbuzz for up to 100, incrementing i by 1 for each time fizzbuzz is called
    for ($i=0; $i<=100; $i++)
    {?>
        <?php echo fizzBuzz($i)?><br />
        <?php
    }?>
    
    
</body>
</html>

