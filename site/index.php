<h1>PHP and My SQL - Andrew Rockwell</h1>

<h2>Assignments</h2>

<!--taken from class_web_site and edited to my folder names-->
    <ul>
        <li><a href="../w1/index.php">Week 1</a></li>
        <li><a href="../w2/index.php">Week 2</a></li>
        <li><a href="../w3/atm_starter.php">Week 3</a></li>
        <li><a href="../w4/view_patient.php">Week 4</a></li>
        <li><a href="../w4/view_patient.php">Week 5</a></li>
        <li><a href="../w4/view_patient.php">Week 6</a></li>
        <li><a href="../w7/index.php">Week 7</a></li>
        <li><a href="../w8/index.php">Week 8</a></li>
        <li><a href="../w9/index.php">Week 9</a></li>
        <li><a href="../w10/index.php">Week 10</a></li>
    </ul>

<?php 
    $file = basename($_SERVER['PHP_SELF']);
    echo "File was last modified: " . date ("F d Y H:i:s.", filemtime($file));