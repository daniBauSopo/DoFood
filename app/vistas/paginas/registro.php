
<div class="registro-body">
    <div class="registro-centro">
        <form class="registro-form" id="formulario-registro" method="POST">
            <p class="registro-titulo">DoFood</p>
            <input type="email" placeholder="email" autocomplete="off" min=10 id="id_registroEmail" autofocus name="registroEmail"/>
            <input type="password" placeholder="contraseña" min="8" id="id_registroPassword" name="registroPassword"/>
            <a href="index.php?pagina=ingreso">Ya tienes cuenta?</a>  
            <button type="submit" id="btn-registro" class="registro-btn" >Registrarse</button>
        </form>
        <?php
    
        $registro = ControladorFormularios::ctrRegistro();

    
        if($registro == "ok"){
            echo '<script>
            if(window.history.replaceState){
        
                window.history.replaceState(null,null,window.location.href);
        
            }
            
            </script>';            
        }
    
        ?> 
    </div>
</div>


 



