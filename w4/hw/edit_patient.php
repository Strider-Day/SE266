
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient edit</title>
</head>
<body>
    

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_patient.php';
    
    $error = "";

    


    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'Patientid');


        
        if($action == "Update"){
            
            $patient = getPatient($id);
            $FirstName = $patient["patientFirstName"];
            $LastName = $patient["patientLastName"];
            $Married = $patient["patientMarried"];
            $BirthDate = $patient["patientBirthDate"];
            
        }
        else{
            $FirstName = "";
            $LastName = "";
            $Married = "";
            $BirthDate = "";
        }

        
    }
    if (isset($_POST['Update_patient'])){
        $id = filter_input(INPUT_POST, 'id');
        $FirstName = filter_input(INPUT_POST, 'first');
        $LastName = filter_input(INPUT_POST, 'last');
        $Married = filter_input(INPUT_POST, 'married');
        $BirthDate = filter_input(INPUT_POST, 'birthdate');


        updatePatient($id, $FirstName, $LastName, $Married, $BirthDate);
        header('Location: view_patient.php');

       
    }
    elseif (isset($_POST['Delete_patient'])){
        $id = filter_input(INPUT_POST, 'id');
        
        deletePatient($id);
        header('Location: view_patient.php');
    }

?>


    <h2>Update Patient Info</h2>

    <form name="team" method="post" action="edit_patient.php">
        
        <!--FORM-->
        <div class="wrapper">
        <form method="post" name="addpatient">
            <input type="hidden" name="id" value="<?= $id?>" >
            <label>First Name: </label>
            <input type="text" name="first" value="<?php echo $FirstName;?>" />
            <br>
            <label>Last Name: </label>
            <input type="text" name="last" value="<?php echo $LastName;?>"/>
            <br>
            <label>Married: </label>
            <input type="radio" id="yes" name="married" value="1" <?= $Married ==1?"checked":""?>/>
            <label for="yes">Yes</label>
            <input type="radio" id="no" name="married" value="0" <?= $Married ==0?"checked":""?>/>
            <label for="no">No</label>
            <br>
            <label>Birth Date: </label>
            <input type="Date" name="birthdate" value="<?php echo $BirthDate;?>"/>
            <br>


            <div>
                &nbsp;
            </div>
            <div>
            <input type="submit" name="Update_patient" value="Update Patient Information" />
            </div>
            <div>
                &nbsp;
            </div>
            <div>
            <input type="submit" name="Delete_patient" value="Delete Patient Information" />
            </div>
        </form>   
        </div>

       
    </form>


    </body>
</html>