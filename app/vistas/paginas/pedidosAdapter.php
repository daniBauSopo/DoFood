<?php
include "../../controladores/formularios.controlador.php";
include "../../modelos/formularios.modelo.php";  ?>
<li>
    <p>Nombre de la comida</p>
    <?php if(isset($_GET["idProductoCesta"])){
        $id_prods = $_GET["idProductoCesta"];
        echo $id_prods;
        $array_Productos = array();
        $meteDatos = array_push($array_Productos,$id_prods);
        for($i = 1;$i < count($array_Productos);$i++){
            $array_Productos[$i] = $id_prods;
            echo $array_Productos[$i];
        }
        echo count($array_Productos);
    } ?>
    <div class="btn-comida-adapter">
        <p><i class="far fa-minus-square"></i></p>
        <input type="number">
        <p><i class="far fa-plus-square"></i></p>
    </div>
</li>
<button type="button" >Pagar</button>