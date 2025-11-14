<?php 

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../src/libs/connection.php' ;



function get_user($user_id):array{

    $sql = "SELECT username,email,name,last_name,gender,phone_number from users WHERE id=:user_id";

    $stm = db() -> prepare($sql);
    
    $stm->bindParam(":user_id", $user_id);
    $stm->execute();

    $result = $stm->fetch(PDO::FETCH_ASSOC);

    
    return $result;


}