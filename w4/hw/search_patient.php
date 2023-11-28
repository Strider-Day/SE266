<?php
    session_start();

    if  (!isset($_SESSION['user'])){
        header ('Location: view_patient.php');
    
    }

    include __DIR__ . '/model/model_patient.php';

    
    if (isset($_POST['searchpatient'])){
        $FirstName = filter_input(INPUT_POST, 'first');
        $LastName = filter_input(INPUT_POST, 'last');
        $Married = filter_input(INPUT_POST, 'married');

        $patients = searchPatients($FirstName, $LastName, $Married);
        
        
    }
    else{
        $FirstName = "";
        $LastName = "";
        $Married = "";
        $patients = []; 
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
    <title>Add Patient</title>
</head>
<body>
    <div class="wrapper">
        <form method="post" name="addpatient">
            <label>First Name: </label>
            <input type="text" name="first" value="" />
            <br>
            <label>Last Name: </label>
            <input type="text" name="last" value=""/>
            <br>
            <label>Married: </label>
            <input type="radio" id="yes" name="married" value="1" />
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="married" value="0" />
            <label for="no">No</label>
            <br>

            <div >
                &nbsp;
            </div>
            <div>
                <input type="submit" name="searchpatient" value="Search Patients" />
            </div>

            <a href="view_patient.php">Back to View All</a>
        </form>
    </div>

    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>

                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Married</th>
                    <th>Birth Date</th>
                </tr>
            </thead>
            <tbody>
           
            
            <?php foreach ($patients as $p): ?>
                <tr>
                    <td><?= $p['id']; ?></td>
                    <td><?= $p['patientFirstName']; ?></td>
                    <td><?= $p['patientLastName']; ?></td>
                    <td><?= $p['patientMarried']==0?"No":"Yes"; ?></td>
                    <td><?= $p['patientBirthDate']; ?></td> 
                    <td><a href="edit_patient.php?action=Update&Patientid=<?= $p['id']; ?>">Edit</a></td>        
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</body>