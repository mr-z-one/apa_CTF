<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../src/libs/connection.php' ;


function get_all_challenge_card():array{

    $sql = "SELECT * from challenge_cards";

    $stm = db() -> prepare($sql);

    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    
    return $result;

}