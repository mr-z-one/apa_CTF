<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../src/libs/connection.php' ;

function add_card($name,$description,$challengeLink,$src_image,bool $is_active){

    $sql  = "INSERT into challenge_cards (name,description,challenge_link,src_image,is_active)
             VALUES(:name,:description,:challenge_link,:src_image,:is_active) ";

    $stmt  = db() ->prepare($sql);

    $is_active = (int) $is_active;

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":challenge_link", $challengeLink);
    $stmt->bindParam(":src_image", $src_image);
    $stmt->bindParam(":is_active",  $is_active , PDO::PARAM_INT);

    return $stmt->execute();
    
}