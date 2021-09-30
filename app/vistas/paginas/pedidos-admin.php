<?php
include "../../controladores/formularios.controlador.php";
include "../../modelos/formularios.modelo.php";
$pedidos = ControladorFormularios::ctrTraerPedidosAdmin();?>
<div class="con-pedidos">
    <p>Pedidos</p>
    <ul class="admin-pedidos">
        <?php foreach($pedidos as $pedido){ ?>
                <li>
                    <div class="pedido-primera-parte">
                         <p class="id-pedido">ID: <?php echo "#". $pedido[0]; ?></p>
                         <p class="cliente-pedido">Cliente: <?php echo $pedido[7]; ?></p>
                         <p class="restaurante-pedido">Restaurante: <?php echo $pedido[12]; ?></p>
                    </div>
                    <div class="pedido-segunda-parte">
                        <div class="sub-primero">
                            <p class="titulo-pedido">Estado pedido</p>
                            <p class="estado-pedido"><?php echo ($pedido[4] == 0) ? "Procesado" : ($pedido[4] == 1 ? "Enviado" : ($pedido[4] == 2 ? "Entregado" : "Error")); ?></p>
                            <form method="POST">
                                <button class="btn-cambiar-estado" type="submit" onclick="preDefault();" value=<?php echo $pedido[4]; ?> name="cambiar-estado">Cambiar Estado</button>
                                <input type="hidden" name="id_pedido" value=<?php echo $pedido[0]; ?>>
                            </form>
                        </div>
                        <div class="sub-segundo">
                            <p class="fecha-pedido">Fecha pedido: <?php echo $pedido[5]; ?></p>
                            <p class="localizacion-pedido">Localizacion: <?php echo $pedido[18]; ?></p>
                        </div>
                        
                    </div>
                    <div class="pedido-tercera-parte">
                        <p class="titulo_precio">Precio</p>
                        <p class="precio-pedido"><?php echo $pedido[3] ."€"; ?></p>
                    </div>
                </li>
            <?php } ?>
    </ul>
</div>
<?php $cambio = ControladorFormularios::ctrCambiarEstado(); ?>