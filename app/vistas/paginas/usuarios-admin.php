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
                        <input type="hidden" id="cod_baneo" value=<?php echo $usu[0]; ?>>
                        <input type="button" value="Bloquear" name="baneo" class="btn-banear"><i class="fas fa-ban"></i>
                </li>
        <?php } elseif($usu[4] == 1){ ?>
            <?php
                include "usuarios-baneados.php";
            }
        }?> 
    </ul>
</div>
<?php $respuesta = ControladorFormularios::ctrBanearUsuario();
if($respuesta == "ok"){
    echo '<script>
    if(window.history.replaceState){

        window.history.replaceState(null,null,window.location.href);

    }
    
    </script>';

} ?>