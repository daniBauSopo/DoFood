<?php 
include "header.php";
$restaurantes = ControladorFormularios::ctrAcordeonRestaurantes();
$localizacion = ControladorFormularios::ctrTraerLocalizacion();
?>
    <div class="container-restaurantes-acordeon">
        <p>Restaurantes</p>
        <ul class="lista-restaurantes">
               <?php foreach($localizacion as $l){ ?>
                <li id=<?php echo $l["localizacion_restaurante"]; ?>>
                    <div>
                        <a href=<?php echo "#".$l["localizacion_restaurante"]; ?>><?php echo $l["localizacion_restaurante"]; ?></a>
                        <p><i class="fas fa-caret-down"></i></p> 
                    </div>
                    
                    <ul class="lista-restaurantes-detalle">
                        <?php foreach($restaurantes as $restaurante){
                            if($restaurante[7] == $l["localizacion_restaurante"]){ ?>
                        <li>
                            <p><?php echo $restaurante[1]; ?></p>
                            <p><?php echo $restaurante[8].",".$restaurante[7]; ?></p>
                        </li>
                        <?php    }
                        } ?>

                    </ul>
                </li>
            <?php  }?>
        </ul>
    </div>
<?php 
include "footer.php";
?>