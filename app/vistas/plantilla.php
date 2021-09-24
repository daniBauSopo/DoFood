<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>DoFood</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&family=Roboto+Slab:wght@100;200;300;400;500;700;800&family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="http://localhost/DoFood/public/css/estilos.css" type="text/css" rel="stylesheet">
</head>
<body>
    <?php 

    if(isset($_GET["pagina"])){

        if($_GET["pagina"] == "registro" ||
           $_GET["pagina"] == "ingreso" ||
           $_GET["pagina"] == "inicio" ||
           $_GET["pagina"] == "productos" ||
           $_GET["pagina"] == "pagina-producto" ||
           $_GET["pagina"] == "panel-admin"){
            include "paginas/".$_GET["pagina"].".php";

           }else{
               include "paginas/error404.php";
           } 

    }else{
        include "paginas/inicio.php";

    }
    
    ?>
<script type="text/javascript" src="http://localhost/DoFood/public/js/script.js"></script>
</body>
</html>