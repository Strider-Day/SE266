<?php

    include (__DIR__ . '/db.php');
    
    


    function addpatient ($FirstName, $LastName, $Married, $BirthDate) {
        //grab $db object - 
        //needs global scope since object is coming from outside the function
        global $db;

        //initialize return dataset
        $result = "";

        //prepare our SQL statment
        $sql = "INSERT INTO patients set patientFirstName = :f, patientLastName = :l, patientMarried = :m, patientBirthDate = :b, ";
        $stmt = $db->prepare($sql);

        //bind values
        $binds = array(
            ":f" => $FirstName,
            ":l" => $LastName,
            ":m" => $Married,
            ":b" => $BirthDate
        );
        
        //if our SQL statement returns results, populate our results confirmation string
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = 'Data Added';
        }
        
        //return results
        return ($result);
       
    }

    

    function updateTeam ($id, $teamName, $division) {
        global $db;

        $results = "";
        $sql = "UPDATE teams SET teamName = :teamName, division = :division WHERE id=:id ";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':teamName', $teamName);
        $stmt->bindValue(':division', $division);

      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }

 
    function deleteTeam ($id) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM teams WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }

    function getPatient(){

        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM patients");
        //$stmt->bindValue(':id', $id);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
        }
         
        return ($result);
    }

    //$teams = getTeams();
    //var_dump($teams);

    //echo addTeam('Tech Tigers', 'NEIT');
    //deleteTeam(47);
?>