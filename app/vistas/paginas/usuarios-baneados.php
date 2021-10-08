                <li>
                    <div>
                         <a href="#"><?php echo $usu[1]; ?></a>
                         <p class="baneado">Baneado</p>
                         <p><?php echo $usu[3]; ?></p>
                    </div>
                    <input type="button" value="Desbloquear" name="revocar" class="btn-revocar" onclick="RevocarUsuario(<?php echo $usu[0]; ?>);"/>
                </li>
