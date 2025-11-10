<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../src/libs/connection.php' ;

function add_card($name,$description,$challengeLink,$src_image){

    $sql  = "INSERT into challenge_cards (name,description,challenge_link,src_image)
             VALUES(:name,:description,:challenge_link,:src_image) ";

    $stmt  = db() ->prepare($sql);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":challenge_link", $challengeLink);
    $stmt->bindParam(":src_image", $src_image);

    return $stmt->execute();

}