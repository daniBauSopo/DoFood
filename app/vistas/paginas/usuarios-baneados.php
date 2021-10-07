                <li>
                    <div>
                         <a href="#"><?php echo $usu[1]; ?></a>
                         <p class="baneado">Baneado</p>
                         <p><?php echo $usu[3]; ?></p>
                    </div>
                    <input type="hidden" id="cod_revocar" value=<?php echo $usu[0]; ?>>
                    <input type="button" value=<?php echo $usu[0]; ?> name="revocar" class="btn-revocar"><i class="fas fa-clipboard-check"></i></button>
                </li>
<?php $respuesta = ControladorFormularios::ctrRevocarUsuario(); ?>