<?php 

 require_once __DIR__ . '/../../src/bootstrap.php' ;
 require_once __DIR__ .'/../inc/flag-submit.model.php';

 require_login();



 if (! is_post_request()) {
    redirect_to("profile-challenge-list.php");
 }

$fields = [
 "id" => "string|required",
 "txt_flag"=> "string|required"

];

[$input,$error] = filter($_REQUEST,$fields );

if (! empty($error)) {
    redirect_with_message("profile-challenge-list.php",reset( $error ));
}

$user_id = $_SESSION["user_id"];
$challenge_id = $input["id"];
$txt_flag = $input["txt_flag"];

try {
    if (is_flag_submitted( $user_id, $challenge_id )) {
        redirect_with_message("profile-challenge-list.php","فلگ توسط کاربر ثبت شده است!");
    }
    //TODO: check for is challenge is active?

    if (submitted_flag( $user_id, $challenge_id, $txt_flag )) {
    
         redirect_with_message("profile-challenge-list.php","فلگ با موفقیت ثبت گردید!");
    
    }
    //code...
} catch (Exception $e) {
       var_dump($_SESSION);
    var_dump($e->getMessage());
}
