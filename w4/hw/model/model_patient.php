<?php

    include (__DIR__ . '/db.php');
    
    function getPatients(){
        global $db;

        $results = [];

        $sqlstring = $db ->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients ORDER BY patientLastName");

        if ($sqlstring -> execute() && $sqlstring -> rowCount() > 0){
            $results = $sqlstring -> fetchAll(PDO::FETCH_ASSOC);

        }

        return ($results);
    }

    function Login($LoginUser, $LoginPass){
        global $db;

        $results = "";

        $stmt = $db->prepare("SELECT * FROM userlogin WHERE 0=0 AND login_user LIKE :l AND login_pass LIKE :p");

        $binds = array(
            ":l" => $LoginUser,
            ":p" => sha1($LoginPass) 
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = "1";
        }
        else{
            $results = "2";
        }
        return $results;
    }


    function addpatient ($FirstName, $LastName, $Married, $BirthDate) {
        //grab $db object - 
        //needs global scope since object is coming from outside the function
        global $db;

        $BirthDate = new DateTimeImmutable($BirthDate);

        //initialize return dataset
        $result = "";

        //prepare our SQL statment
        //$sql = "INSERT INTO patients set patientFirstName = :f, patientLastName = :l, patientMarried = :m, patientBirthDate = :b, ";
        $stmt = $db->prepare("INSERT INTO patients set patientFirstName = :f, patientLastName = :l, patientMarried = :m, patientBirthDate = :b ");

        //bind values
        $binds = array(
            ":f" => $FirstName,
            ":l" => $LastName,
            ":m" => $Married,
            ":b" => $BirthDate ->format("Y-m-d H:i:s")
        );
        
        //if our SQL statement returns results, populate our results confirmation string
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = 'Data Added';
        }
        
        //return results
        return ($result);
       
    }

    

    function updatePatient ($id, $FirstName, $LastName, $Married, $BirthDate) {
        global $db;

        $formatdate = new DateTimeImmutable($BirthDate);

        $results = "";
        $sql = "UPDATE patients SET patientFirstName = :f, patientLastName = :l, patientMarried = :m, patientBirthDate = :b  WHERE id=:id ";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':f', $FirstName);
        $stmt->bindValue(':l', $LastName);
        $stmt->bindValue(':m', $Married);
        $stmt->bindValue(':b', $formatdate ->format("Y-m-d H:i:s"));


        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }

 
    function deletePatient ($id) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }

    function getPatient($id){

        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM patients WHERE id=:id");
        $stmt->bindValue(':id', $id);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
        }
         
        return ($result);
    }

    function searchPatients ($first, $last, $married) {
        global $db;
        $binds = array();
    
        $sql =  "SELECT * FROM  patients WHERE 0=0";
        if ($first != "") {
            $sql .= " AND patientFirstName LIKE :first";
            $binds['first'] = '%'.$first.'%';
        }
    
        if ($last != "") {
            $sql .= " AND patientLastName LIKE :last";
            $binds['last'] = '%'.$last.'%';
        }
            
        if ($married != "") {
            $sql .= " AND patientMarried = :married";
            $binds['married'] = $married;
        }
    
        $results = array();
        $stmt = $db->prepare($sql);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
             
        return ($results);
    }

    //$teams = getTeams();
    //var_dump($teams);

    //echo addTeam('Tech Tigers', 'NEIT');
    //deleteTeam(47);
?>