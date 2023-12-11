<?php

    include (__DIR__ . '/db.php');
    
    function getPatients(){
        global $db;

        $results = [];

        $sqlstring = $db ->prepare("SELECT GameId, GameName, PublishedDate, Rated, Rewview, Developer FROM games ORDER BY GameName");

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


    function addgame ($GameName, $PublishedDate, $Rated, $Review, $Developer) {
        global $db;

        $BirthDate = new DateTimeImmutable($BirthDate);


        $result = "";

        $stmt = $db->prepare("INSERT INTO games set GameName = :n, PublishedDate = :p, Rated = :m, Review = :r, Developer = :d ");

        $binds = array(
            ":n" => $GameName,
            ":p" => $PublishedDate ->format("Y-m-d H:i:s"),
            ":m" => $Rated,
            ":r" => $Review,
            ":d" => $Developer
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = 'Data Added';
        }
        
        return ($result);
       
    }

    

    function updategame ($GameId, $GameName, $PublishedDate, $Rated, $Review, $Developer) {
        global $db;

        $formatdate = new DateTimeImmutable($PublishedDate);

        $results = "";
        $sql = "UPDATE games SET GameName = :n, PublishedDate = :p, Rated = :m, Review = :r, Developer = :d  WHERE GameId=:id ";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':id', $GameId);
        $stmt->bindValue(':n', $GameName);
        $stmt->bindValue(':p', $formatdate ->format("Y-m-d H:i:s"));
        $stmt->bindValue(':m', $Rated);
        $stmt->bindValue(':r', $Review);
        $stmt->bindValue(':d', $Developer);


        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }

 
    function deletegame ($GameId) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM games WHERE GameId=:id");
        
        $stmt->bindValue(':id', $GameId);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }

    function getGame($GameId){

        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM games WHERE GameId=:id");
        $stmt->bindValue(':id', $GameId);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
        }
         
        return ($result);
    }

    function searchGame ($GameName, $Developer) {
        global $db;
        $binds = array();
    
        $sql =  "SELECT * FROM  games WHERE 0=0";
        if ($GameName != "") {
            $sql .= " AND GameName LIKE :gn";
            $binds['gn'] = '%'.$GameName.'%';
        }
    
        if ($Developer != "") {
            $sql .= " AND Developer LIKE :dv";
            $binds['dv'] = '%'.$Developer.'%';
        }
    
        $results = array();
        $stmt = $db->prepare($sql);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
             
        return ($results);
    }

?>