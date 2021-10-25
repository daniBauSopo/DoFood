<?php
include "../../controladores/formularios.controlador.php";
include "../../modelos/formularios.modelo.php";
$usuarioSelec = ControladorFormularios::ctrLlenarUsuariosSelec();
?>
<div class="con-pedidos">
    <div class="pedidos-select-admin">
    <p>Pedidos</p>
    <select name="correo_admin" id="select-admin" class="select-admin" onchange="VerPedidoUsuario(this.value)">
        <option value="0">Seleccione usuario:</option>
        <?php foreach($usuarioSelec as $sel){
            echo '<option value="'.$sel[1].'">'.$sel[0].'</option>';
        } ?>
    </select>
    </div>
    <ul class="admin-pedidos">
        
    </ul>
</div>
