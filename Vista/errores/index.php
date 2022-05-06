<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Publico/css/error.css">
    <title>Error</title>
</head>
<body>
    <?php
        include_once 'Vista/header.php';
        include_once 'Vista/menu.php';
    ?>
    <h1 class="error"><?php echo 'Ups!! no existe el recurso que buscas.'; ?></h1>
    <?php
        include_once 'Vista/footer.php';
    ?>
