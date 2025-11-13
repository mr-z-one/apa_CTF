<?php 

 require_once __DIR__ . '/../../src/bootstrap.php' ;
 require_once __DIR__ .'/../inc/upload-writeup.model.php';

 require_login();

if (! is_post_request()) {
    redirect_to("profile-challenge-list.php");
}

$src_writeup = upload_file("pdf",["application/pdf"=> "pdf"],'/../../uploads',20*1024*1024);

   if (strpos($src_writeup,"error",0)!==false){
    redirect_with_message("profile-challenge-list.php","مشکل در آپلود pdf : ");
}

$fields = [
 "id" => "string|required"

];

[$input,$error] = filter($_REQUEST,$fields );

if (! empty($error)) {
    redirect_with_message("profile-challenge-list.php",reset( $error ));
}

$user_id = $_SESSION["user_id"];
$challenge_id = $input["id"];

if (is_writeup_submitted($user_id,$challenge_id)) {
        redirect_with_message("profile-challenge-list.php","کاربر رایتاپ خود را اپلود کرده");
}

if (submitted_writeup($user_id,$challenge_id,$src_writeup)) {

        redirect_with_message("profile-challenge-list.php","رایتاپ با موفقیت ثبت گردید");

}else{
        redirect_with_message("profile-challenge-list.php","مشکل در ثبت رایتاپ به پشتیبان پیام دهید");
}