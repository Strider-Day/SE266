<?php

    include (__DIR__ . '/db.php');
    
    function getCustomers(){
        global $db;

        $results = [];

        $sqlstring = $db ->prepare("SELECT CustId, FirstName, LastName, Email, PhoneNumber FROM customers ORDER BY LastName");

        if ($sqlstring -> execute() && $sqlstring -> rowCount() > 0){
            $results = $sqlstring -> fetchAll(PDO::FETCH_ASSOC);

        }

        return ($results);
    }


    function addcustomer ($FirstName, $LastName, $Email, $PhoneNumber) {
        global $db;

        $result = "";

        $stmt = $db->prepare("INSERT INTO customers set FirstName = :f, LastName = :l, Email = :e, PhoneNumber = :p ");


        $binds = array(
            ":f" => $FirstName,
            ":l" => $LastName,
            ":e" => $Email,
            ":p" => $PhoneNumber
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = 'Data Added';
        }

        return ($result);
       
    }

    

    function updateCustomer ($CustId, $FirstName, $LastName, $Email, $PhoneNumber) {
        global $db;

        $results = "";
        $sql = "UPDATE customers SET FirstName = :f, LastName = :l, Email = :e, PhoneNumber = :p  WHERE Custid=:id ";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':id', $CustId);
        $stmt->bindValue(':f', $FirstName);
        $stmt->bindValue(':l', $LastName);
        $stmt->bindValue(':e', $Email);
        $stmt->bindValue(':p', $PhoneNumber );


        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }

 
    function deletecustomer ($CustId) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM customers WHERE CustId=:id");
        
        $stmt->bindValue(':id', $CustId);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }

    function getCustomer($CustId){

        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM customers WHERE CustId=:id");
        $stmt->bindValue(':id', $CustId);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
        }
         
        return ($result);
    }

    function searchCustomer ($first, $last) {
        global $db;
        $binds = array();
    
        $sql =  "SELECT * FROM  customers WHERE 0=0";
        if ($first != "") {
            $sql .= " AND FirstName LIKE :first";
            $binds['first'] = '%'.$first.'%';
        }
    
        if ($last != "") {
            $sql .= " AND LastName LIKE :last";
            $binds['last'] = '%'.$last.'%';
        }
    
        $results = array();
        $stmt = $db->prepare($sql);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
             
        return ($results);
    }

?>