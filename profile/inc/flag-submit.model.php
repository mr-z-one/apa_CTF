<?php 

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../src/libs/connection.php' ;


function is_flag_submitted($user_id,$challenge_id):bool{

    $sql = 'SELECT user_id,challenge_id FROM submit_flags WHERE
        user_id =:user_id and challenge_id =:challenge_id';


    $stmt = db()->prepare($sql);

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':challenge_id', $challenge_id);

    $stmt->execute();


    return $stmt ->fetchColumn();
}

function submitted_flag($user_id,$challenge_id, $flag):bool{

    $sql = 'INSERT INTO submit_flags (user_id,challenge_id,flag)
            VALUES(:user_id,:challenge_id,:flag)';

    $stmt = db()->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':challenge_id', $challenge_id);
    $stmt->bindParam(':flag', $flag);

    return $stmt->execute();
}