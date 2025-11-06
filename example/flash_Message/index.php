

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

            <?php
            
            require __DIR__."/inc/config_session.php";
            require __DIR__."/inc/flash.php" ;  
             ?>

         <?php
          flash("account","حساب ک.ینی خست","warning");
          flash("account1","حساب ک.ینی خست","warning");
          flash("account2","حساب ک.ینی خست","warning");
          //var_dump($_SESSION);
         ?>
   <p>
     <a href="./test.php">Visit W3Schools.com!</a>
   </p>
</body>
</html>
