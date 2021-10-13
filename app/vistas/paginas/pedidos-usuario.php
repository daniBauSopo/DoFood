<?php 
    include "header.php";
    $traerPedidos = ControladorFormularios::ctrTraerPedidosUsuario();
?>

<div class="contenedor-pedidos-usu">
    <p class="titulo-pedidos-usu">Pedidos <span><?php echo $_COOKIE["CorreoIngreso"]; ?></span></p>
    <ul class="lista-pedidos-usu">
    <?php foreach($traerPedidos as $pedido){ ?>
        <li>
            <div class="li-pedido1">
                <p>Id Pedido: <span><?php echo "#".$pedido[0]; ?></span></p>
                <div class="pedido-div1">
                    <p><?php echo $pedido[7]; ?></p>
                    <p><?php echo $pedido[14].",". $pedido[13]; ?></p>
                </div>
                <div class="pedido-div2">
                    <p><?php echo ($pedido[4] == 0) ? "Procesado" : ($pedido[4] == 1 ? "Enviado" : ($pedido[4] == 2 ? "Entregado" : "Error")); ?></p>
                    <p><?php echo $pedido[5]; ?></p>
                </div>
            </div>
            <div class="li-pedido2">
                <p><?php echo $pedido[3]."€"; ?></p>
            </div>
        </li>
    <?php    
    } ?>
    </ul>
</div>

<?php 
include "footer.php";
?>