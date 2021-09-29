<?php
include "../../controladores/formularios.controlador.php";
include "../../modelos/formularios.modelo.php"; 
$res = ControladorFormularios::ctrLlenarCesta();
$restaurante = ControladorFormularios::ctrTraerRestaurante();
$sumador=0; 
$suma=0;
?>
<ul class="listar-cesta">
    <?php
foreach($res as $i){
    $_SESSION["idComidaSesion"] = $i;
    $res_cada_comida = ControladorFormularios::ctrOtenerDatosComidaCesta();
    $sumador = $res_cada_comida["precio_comida"];
?>
<li>
    <div class="comida-adapter">
        <p><?php echo $res_cada_comida["nombre_comida"]; ?></p>
        <p><?php echo $res_cada_comida["precio_comida"]."€"; ?></p>
    </div>
    <form method="POST" class="btn-comida-adapter">
        <p class="restar" name="restar"><i class="far fa-minus-square"></i></p>
        <input type="number" class="cantidad" name="cantidadPedido" value=1>
        <p class="sumar" name="sumar"><i class="far fa-plus-square"></i></p>
    </form>
</li>
<?php 
    $suma += $sumador;
    }
 ?>
</ul>
<?php
    $min = 2;
    if(number_format($suma,2,'.','') < $restaurante["minimo"]){ ?>
        <p>Cuota por no superar el minimo: <?php echo $min ?></p>
        <p class="total-pago">Total: <?php echo number_format($suma,2,'.','') + $min."€";?></p>
<?php }elseif(number_format($suma,2,'.','') >= $restaurante["minimo"]){ ?>
        <p class="total-pago">Total: <?php echo number_format($suma,2,'.','')."€";?></p>
    <?php } ?>

<button class="pagar" name="pagar" type="button">Pagar</button>
<?php
    function restarCantidad(){
        if(isset($_POST["restar"]) && isset($_POST["cantidadPedido"])){
            $_POST["restar"] = 1;
            $resta = $_POST["cantidadPedido"] - $_POST["restar"];
            return $resta;
        }
    }
    function sumarCantidad(){
        if(isset($_POST["restar"]) && isset($_POST["cantidadPedido"])){
            $_POST["restar"] = 1;
            $resta = $_POST["cantidadPedido"] - $_POST["restar"];
            return $resta;
        }
    }
?>