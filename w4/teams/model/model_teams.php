<?php

include (__DIR__ . '/db.php');



function getTeams(){
    global $db;

    $results = [];

    $stmt = $db->prepare("SELECT id, teamName, division FROM teams ORDER BY teamName");

    if ($stmt->execute() && $stmt->rowCount() > 0 ) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return ($results);
}

function addTeam($teamName, $division) {

    global $db;

    $result = "";

    $sql = "INSERT INTO teams set teamName = :t, division = :d";
    $stmt = $db->prepare($sql);

    $binds = array(
        ":t" => $teamName,
        ":d" => $division
    );

    if($stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = 'Data Added';
    }

    return ($result);
}