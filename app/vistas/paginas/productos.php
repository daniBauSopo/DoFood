<?php 
    include "header.php";
?>
    <div class="container-restaurantes">
        <div class="flex-container">
            <div class="aside-container">
                <div class="aside-sitio">
                    <p><?php echo $_COOKIE["calleCookie"]; ?></p>
                    <a href="index.php?pagina=inicio">Cambiar direccion</a>
                </div>
                <div class="aside-categorias">
                    <div>
                        <p>Categorias</p>
                        <i class="fas fa-utensils"></i>
                    </div>
                    <script>
                        function mostrarProductos(str){
                            if(str == ""){
                                document.querySelector(".lista-productos").innerHTML = "";
                                return;
                            }
                        }
                    </script>
                    <form>
                        <?php $res = ControladorFormularios::ctrTraerCategorias();
                            foreach($res as $i){
                                if(isset($_GET["comida"])){
                                    if($i[0] == $_GET["comida"]){?>
                                        <input type="checkbox" id=<?php echo $i[0]; ?> name="tipos[]" value=<?php echo $i[0];?> checked>
                                        <label for=<?php echo $i[0]; ?>><?php echo $i[1]; ?></label><br>
                                <?php }else{ ?>
                                        <input type="checkbox" id=<?php echo $i[0]; ?> name="tipos[]" value=<?php echo $i[0];?>>
                                        <label for=<?php echo $i[0]; ?>><?php echo $i[1]; ?></label><br>
                                      <?php  }  
                                }elseif(!isset($_GET["comida"])){?>
                                    <input type="checkbox" id=<?php echo $i[0]; ?> name="tipos[]" value=<?php echo $i[0];?>>
                                    <label for=<?php echo $i[0]; ?>><?php echo $i[1]; ?></label><br>
                             <?php   } 
                            }
                        ?>
                    </form>
                </div>
                <div class="aside-filtro">
                    <div>
                        <p>Filtro</p>
                        <i class="fas fa-filter"></i>
                    </div>
                    <form>
                        <input type="checkbox" id="abierto" name="filtro[]">
                        <label for="abierto">Abierto</label><br>
                        <input type="checkbox" id="entrega-gratis" name="filtro[]">
                        <label for="entrega-gratis">Entrega Gratis</label><br>
                        <input type="checkbox" id="recogida" name="filtro[]">
                        <label for="recogida">Recogida</label><br>
                        <input type="checkbox" id="domicilio" name="filtro[]">
                        <label for="domicilio">Domicilio</label><br>
                    </form>
                </div>
            </div>
            <div class="principal-container">
                <form action="GET">
                    <input type="text" placeholder="Categoría o restaurante" class="busqueda-container">
                </form>
                <ul class="lista-productos">
                    <?php 
                       $val = ControladorFormularios::ctrTraerRestaurantes();
                        foreach($val as $res){?>
                        <li>
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
                </ul>
            </div>
        </div>
        <br>
        <br>
        <br>
<?php 
include "footer.php";
?>