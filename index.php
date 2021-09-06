<?php 

require_once "app/controladores/plantilla.controlador.php";
require_once "app/controladores/formularios.controlador.php";
require_once "app/modelos/formularios.modelo.php";
$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();

//  $servername = "localhost";
//  $user = "root";
//  $pass = "";
//  $db = "dofood";
    
//  $conn = new mysqli($servername, $user, $pass, $db);

//  $sql = "SELECT restaurantes.*,categorias.nombre_categoria FROM restaurantes,categorias WHERE restaurantes.id_categoria_restaurante = categorias.id_categoria AND restaurantes.localizacion_restaurante = 'Granada'";
            
//  $res = $conn->query($sql);

//  $dato = $res->fetch_assoc();

//  var_dump($dato);


?>
