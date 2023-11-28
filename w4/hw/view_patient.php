<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Patients</title>
</head>
<body>
    



    <div class="container">
                
     <div class="col-sm-12">
        <h1>Patients</h1>
       
        <a href="add_patient.php">Add New Patient</a>

        <a href="login.php">Login</a>

   
    <?php
        
        include __DIR__ . '/model/model_patient.php';
        $patients = getPatients();
        
        
    ?>
  
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
        
        <br />
        <a href="edit_patient.php?action=Add">Add New Patient</a>
    </div>
    </div>
</body>
</html>