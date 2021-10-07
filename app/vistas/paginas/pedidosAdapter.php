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
    $nombre = $res_cada_comida["nombre_comida"];
    $cont = array_count_values($res);
    echo $cont;?>
    <li>
        <div class="comida-adapter">
            <p><?php echo $nombre; ?></p>
        <p><?php echo $sumador."€"; ?></p>
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
    $cuota = 2.40;
    if(number_format($suma,2) < $restaurante["minimo"]){ 
        $total = $suma + $cuota + $restaurante["precio_entrega"]; ?>
        <p class="cuota">Cuota por no superar el minimo: <?php echo number_format($cuota,2)."€"; ?></p>
        <p class="pagar-precio-entrega" ><?php echo ($restaurante["precio_entrega"] > 0) ? "Precio de entrega ". $restaurante["precio_entrega"]."€" : "Entrega gratis" ; ?></p>
        <p class="total-pago">Total: <?php echo number_format($total,2)."€";?></p>
<?php }elseif(number_format($suma,2) >= $restaurante["minimo"]){ 
        $total = $suma + $restaurante["precio_entrega"]; ?>
        <p class="pagar-precio-entrega pagar-precio-entrega-active" ><?php echo ($restaurante["precio_entrega"] > 0) ? "Precio de entrega ". $restaurante["precio_entrega"]." €" : "Entrega gratis" ; ?></p>
        <p class="total-pago">Total: <?php echo number_format($total,2)."€";?></p>
    <?php } 
    setcookie("total",number_format($total,2),time() + (86400 * 30),"/");
    setcookie("id_res_pedido",$restaurante["id_restaurante"],time() + (86400 * 30),"/");?>
