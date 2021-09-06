<?php 

    include "header.php";
    include "banner-header.php";
    
?>
    <div class="container">
        <div class="categorias">
        <?php 
            if(isset($_COOKIE["calleCookie"])){ ?>
            <h3>Categorias</h3>
            <p>Haz el pedido dependiendo de la categoria elegida</p>
            <ul>

            <?php $res = ControladorFormularios::ctrTraerCategorias();
                  foreach($res as $i){
                    ?>
                    <li id=<?php echo $i[0]; ?>>
                        <img src=<?php echo "http://localhost/DoFood/public/img/".$i[2]; ?> alt=<?php echo $i[1]; ?>>
                        <p><?php echo $i[1]; ?></p>
                    </li>
                    <?php
                  }
                echo "<script>
                let lista = document.querySelectorAll('.categorias > ul >li');
                let buscador = document.getElementById('nombreCiudad');
                let vacio = document.querySelector('#vacio');
                console.log(buscador);
                for (let i = 0; i < lista.length; i++) {
                    lista[i].addEventListener('click',function(){
                    if(buscador!=''){
                        let valor = lista[i].id;
                        window.location = 'index.php?pagina=productos&comida='+valor;
                        
                    }
                    })
                }
            </script>";
            ?>
            
            </ul>
        
           <?php }
        ?>
        </div>
        <div class="ofertas">
            <h1>Comida de todo tipo</h1>
            <div class="ofertas-comida">
                <p>Fiestas</p>
                <p>Eventos</p>
                <p>Reuniones</p>
                <p>Cenas</p>
            </div>
        </div>
        <?php 
        
        include "footer.php";

        ?>
</div>