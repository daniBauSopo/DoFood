                <li>
                    <div>
                         <a href="#"><?php echo $usu[1]; ?></a>
                         <p class="baneado">Baneado</p>
                         <p><?php echo $usu[3]; ?></p>
                    </div>
                    <form class="formBaneo" method="POST">
                        <button type="submit" onclick="preDefault();" value=<?php echo $usu[0]; ?> name="baneo" disabled><i class="fas fa-ban"></i></button>
                        <button type="submit" onclick="preDefault();" value=<?php echo $usu[0]; ?> name="revocar"><i class="fas fa-clipboard-check"></i></button>
                    </form>
                </li>
<?php $respuesta = ControladorFormularios::ctrRevocarUsuario(); ?>