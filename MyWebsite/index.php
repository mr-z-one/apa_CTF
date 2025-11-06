<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    $_SESSION["name"] = "navid";

	echo php_ini_loaded_file();

	$fields = [
    'email'=> 'required | email',
    'username' => 'required | alphanumeric | between: 3,255'
	];
	echo '\n' . $fields['email'];
?>


</body>
</html>
