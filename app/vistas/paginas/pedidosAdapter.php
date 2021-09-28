<?php
include "../../controladores/formularios.controlador.php";
include "../../modelos/formularios.modelo.php";
$res = ControladorFormularios::ctrLlenarCesta(); 

foreach($res as $i){
    $_SESSION["idComidaSesion"] = $i;
    $res_cada_comida = ControladorFormularios::ctrOtenerDatosComidaCesta(); ?>
<li>
    <div class="comida-adapter">
        <p><?php echo $res_cada_comida["nombre_comida"]; ?></p>
        <p><?php echo $res_cada_comida["precio_comida"]; ?></p>
    </div>
    <div class="btn-comida-adapter">
        <p><i class="far fa-minus-square"></i></p>
        <input type="number" name="cantidadPedido">
        <p><i class="far fa-plus-square"></i></p>
    </div>
</li>
<?php } ?>
<button type="button">Pagar</button>