<?php 
include "../../controladores/formularios.controlador.php";
include "../../modelos/formularios.modelo.php";
$val = ControladorFormularios::ctrTraerRestaurantes();
 foreach($val as $res){?>
 <li id=<?php echo $res["id_restaurante"]; ?>>
     <img src= <?php echo "http://localhost/DoFood/public/img/restaurantes/".$res["foto_restaurante"]; ?>>
     <div class="minimo">
         <p>Mínimo:<?php echo " ".$res["minimo"]."€"; ?></p>
     </div>
     <div class="lista-productos-primero">
         <p class="nombre-restaurante"><?php echo $res["nombre_restaurante"]; ?></p>
         <p class="categoria-restaurante"><span>&middot</span> <?php echo $res["nombre_categoria"]; ?></p>
     </div>
     <div class="lista-productos-segundo">
         <p class="entrega-restaurante"><i class="fas fa-archive"></i>Entrega <?php if($res["precio_entrega"] == 0){echo "gratis";}else{echo $res["precio_entrega"]."€";} ?></p>
         <p class="modo-restaurante"><?php echo $res["modo_entrega"]; ?></p>
         <p class="tiempo-restaurante"><?php echo $res["tiempo_entrega"]."min"; ?></p>
     </div>
 </li>
 <?php }
 ?>