<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Home"  ?></title>
    <link rel="stylesheet" href="/bootstrap-5.3.8-dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/style.css">
</head>

<body class="d-flex align-items-center p-5 bg-dark text-white  ">
    <main class="form-signin w-100 m-auto ">
        <?php flash();?>