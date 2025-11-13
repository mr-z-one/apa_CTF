<?php 

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../src/libs/connection.php' ;


function is_writeup_submitted($user_id,$challenge_id):bool{

    $sql = 'SELECT user_id,challenge_id FROM submit_writeup WHERE
        user_id =:user_id and challenge_id =:challenge_id';


    $stmt = db()->prepare($sql);

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':challenge_id', $challenge_id);

    $stmt->execute();


    return $stmt ->fetchColumn();
}

function submitted_writeup($user_id,$challenge_id, $url):bool{

    $sql = 'INSERT INTO submit_writeup (user_id,challenge_id,url)
            VALUES(:user_id,:challenge_id,:url)';

    $stmt = db()->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':challenge_id', $challenge_id);
    $stmt->bindParam(':url', $url);

    return $stmt->execute();
}