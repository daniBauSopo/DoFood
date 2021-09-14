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
                            let listaAjax = document.querySelector("ul.lista-productos");
                            if(str == ""){
                                listaAjax.innerHTML = "";
                                return;
                            }else{
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function(){
                                    if(this.readyState == 4 && this.status == 200){
                                        listaAjax.innerHTML = this.responseText;
                                        
                                    }
                                };
                                xhr.open("GET","http://localhost/DoFood/app/vistas/paginas/lista-productos.php?comida="+str,true);
                                xhr.send();
                            }
                        }
                    </script>
                    <form>
                        <?php $res = ControladorFormularios::ctrTraerCategorias();
                            foreach($res as $i){
                                if(isset($_GET["comida"])){
                                    if($i[0] == $_GET["comida"]){?>
                                        <input type="checkbox" id=<?php echo $i[0]; ?> name="tipos[]" value=<?php echo $i[0];?> checked onclick="mostrarProductos(this.value)">
                                        <label for=<?php echo $i[0]; ?>><?php echo $i[1]." "; ?></label><br>
                                <?php }else{ ?>
                                        <input type="checkbox" id=<?php echo $i[0]; ?> name="tipos[]" value=<?php echo $i[0];?> onclick="mostrarProductos(this.value)">
                                        <label for=<?php echo $i[0]; ?>><?php echo $i[1]." "; ?></label><br>
                                      <?php  }  
                                }elseif(!isset($_GET["comida"])){?>
                                    <input type="checkbox" id=<?php echo $i[0]; ?> name="tipos[]" value=<?php echo $i[0];?> onclick="mostrarProductos(this.value)">
                                    <label for=<?php echo $i[0]; ?>><?php echo $i[1]." "; ?></label><br>
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
                            include "lista-productos.php";
                            echo "<script>
                            let listaProd = document.querySelectorAll('.lista-productos > li');
                            for (let i = 0; i < listaProd.length; i++) {
                                listaProd[i].addEventListener('click',function(){
                                    let id_Producto = listaProd[i].id;
                                    window.location = 'index.php?pagina=pagina-producto&restaurante='+id_Producto;
                                })
                            }
                            </script>";
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