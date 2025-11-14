<?php  

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../src/libs/connection.php' ;
function update_user_data(string $user_id, string $name,string $last_name,string $phone_number,string $gender="m") {

        $sql = 'UPDATE users
            SET name = :name,
                last_name = :last_name,
                phone_number = :phone_number,
                gender = :gender
            WHERE id=:id';

        $stmt = db() -> prepare( $sql );

        $stmt->bindParam(":id", $user_id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":phone_number", $phone_number);
        $stmt->bindParam(":gender", $gender);

        return $stmt->execute();



}