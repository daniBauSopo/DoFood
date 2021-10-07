<?php 
    include "header.php";
    $res = ControladorFormularios::ctrTraerRestaurante();
    $resTipoComida = ControladorFormularios::ctrTraerTipoComida();
    $resComida = ControladorFormularios::ctrTraerComida();
?>
    <div class="imagen-producto" style="background-image: url(http://localhost/DoFood/public/img/restaurantes/<?= $res['foto_restaurante'] ?>)">
    </div>
<div class="container-producto">
    <div class="producto-flex">
        <div class="producto-todo">
            <div class="producto-info">
                    <p class="producto-info-nombre"><?php echo $res["nombre_restaurante"]; ?></p>
                    <p class="producto-info-calle"><?php echo $res["calle"].", ".$res["localizacion_restaurante"]; ?></p>
                    <p class="producto-info-mas"><i class="fas fa-home"></i> <?php echo $res["modo_entrega"]; ?> <span>&middot</span> <i class="fas fa-coins"></i> <?php if($res["precio_entrega"] == 0){echo "Entrega Gratis";}else{echo $res["precio_entrega"]."€";} ?></p>
            </div>
            <div class="nav-producto">
                <?php foreach($resTipoComida as $nav){?>
                    <a class="tipo-comida" href=<?php echo "#".$nav["tipo_comida"]; ?>><?php echo $nav["tipo_comida"]; ?></a>
                <?php
                } ?>
            </div>
             <div class="producto-comidas">
             <?php foreach($resTipoComida as $nav){?>
                    <p id=<?php echo $nav["tipo_comida"]; ?>><?php echo $nav["tipo_comida"]; ?></p>
                    <ul class="lista-comida">
                    <?php foreach($resComida as $comida){
                        if($comida["tipo_comida"] == $nav["tipo_comida"]){?>
                        <li>
                            <p class="nombre-comida"><?php echo $comida["nombre_comida"]; ?></p>
                            <div class="precio-añadir">
                                <p class="precio-comida"><?php echo $comida["precio_comida"]."€"; ?></p>
                                <?php if(!isset($_COOKIE["CorreoIngreso"])){ 
                                    $id_res=$_GET["restaurante"];
                                    $_SESSION["añadir"] = $id_res;?>
                                    <button class="añadir" onclick="goIndex();">Añadir</button>
                                    <script>
                                    function goIndex(){
                                        window.location.replace("index.php?pagina=ingreso");
                                    }
                                    </script>
                                <?php }else{ ?>
                                    <button class="añadir" onclick="llenarCesta(<?php echo $comida['id_comida']; ?>);">Añadir</button>
                                    
                                <?php    
                                } ?> 
                            </div>
                        </li>
                    <?php }
                    } ?>
                    </ul>
                <?php
                } ?>
            </div>
        </div>
        <script>
            let contenedor = []
            function llenarCesta(str){
                let id_rest = document.querySelector("p.gasto-minimo > span").innerText;
                let carrito = document.querySelector('.producto-cesta-llena');
                inter = parseInt(id_rest);
                contenedor.push(str)
                if(contenedor.length > 0){
                    document.querySelector('.producto-cesta > form#form-pagar').style.display = 'block';
                }
                if(str == ""){
                    carrito.innerHTML = "";
                    return;
                }else{
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                        carrito.innerHTML = this.responseText;
                        
                        }
                        
                };
                xhr.open("GET","http://localhost/DoFood/app/vistas/paginas/pedidosAdapter.php?idProductoCesta="+contenedor+"&restaurante="+<?php echo $res["id_restaurante"]; ?>,true);
                xhr.send();
                }
            }
                let pagar = document.querySelector(".producto-cesta > form > button.pagar");
                
                pagar.addEventListener("click",cambiarValor());

                function cambiarValor(){
                    pagar.value = 1;
                }
                function settboton(){
                    pagar.value = 0;
                }

            
        </script>
        <div class="producto-cesta">
            <p class="titulo-cesta">Tu cesta <i class="fas fa-shopping-basket"></i></p>
            <p id="gasto-minimo" class="gasto-minimo">Gasto mínimo <span><?php echo $res["minimo"]."€"; ?></span></p>
            <div class="producto-cesta-llena">
                <img src="http://localhost/DoFood/public/img/carrito-vacio.png">   
            </div>
                <form style="display: none;" id="form-pagar" method="POST">
                    <button onload="settboton()" class="pagar" name="pagar" type="submit">Pagar</button> 
                </form>
            <?php 
        
         $pedido = ControladorFormularios::ctrIngresarPedido(); 
        
        if($pedido == "ok"){
            echo '<script>
            if(window.history.replaceState){
        
                window.history.replaceState(null,null,window.location.href);
        
            }
            
            </script>';   
            setcookie("total","",time() - 3600,"/");
            ?>
            <div class="pedido">
                <p>Pedido realizado</p>
            </div>
            <?php         
        }?>
        </div>
    </div>
</div>
<?php
    include "footer.php";
?>