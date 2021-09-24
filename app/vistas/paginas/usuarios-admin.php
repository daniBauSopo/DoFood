<?php
include "../../controladores/formularios.controlador.php";
include "../../modelos/formularios.modelo.php";
$res = ControladorFormularios::ctrTraerUsuariosAdmin(); ?>
<div class="con-usuarios">
    <ul class="admin-usuarios">
        <p>Usuarios y Baneados</p>
        <?php foreach($res as $usu){
            if($usu[4] == 0){ ?>
                <li>
                    <div>
                         <a href="#"><?php echo $usu[1]; ?></a>
                         <p class="verificado" >Verificado</p>
                         <p><?php echo $usu[3]; ?></p>
                    </div>
                    <form class="formBaneo" method="POST">
                        <button type="submit" onclick="preDefault();" value=<?php echo $usu[0]; ?> name="baneo"><i class="fas fa-ban"></i></button>
                        <button type="submit" onclick="preDefault();" value=<?php echo $usu[0]; ?> name="revocar" disabled><i class="fas fa-clipboard-check"></i></button>
                    </form>
                </li>
        <?php } elseif($usu[4] == 1){ ?>
            <?php
                include "usuarios-baneados.php";
            }
        }?> 
    </ul>
</div>
<?php $respuesta = ControladorFormularios::ctrBanearUsuario(); ?>