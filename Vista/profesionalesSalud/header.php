
<?php
    
    ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(E_ALL);
    if(!isset($_SESSION['rut'])){
        header('location:../main/index.php');
    }else{
        if(!isset($_SESSION['rol'])==5){
            header('location:../main/index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALDROID</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Publico/css/menuProfesional.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Publico/css/profesional.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Publico/css/home.css">
</head>
<body>

<div class="padre">