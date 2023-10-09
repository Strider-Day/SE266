<?php

//function for checking age to enter the bar, under 21 will tell use they are underage. All other responses will state they may enter
function agecheck($age){
    if ($age < 21){
        echo "underage";
    }
    else{
        echo "old enough to enter";
    }
};


//calling function in 2 seperate cases
agecheck(18);
echo '<br>';
agecheck(22);