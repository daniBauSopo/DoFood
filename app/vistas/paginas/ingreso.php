
<div class="inicio-body">
    <div class="inicio-centro">
        <form class="inicio-form" method="post">
            <p class="inicio-titulo">DoFood</p>
            <input type="email" autocomplete="off" placeholder="email" id="ingresoEmail" autofocus name="ingresoEmail"/>
            <input type="password" placeholder="password" id="ingresoPassword" name="ingresoPassword"/>
            <a href="index.php?pagina=registro">Registrarse</a>
            <button type="submit" class="inicio-btn" >Iniciar</button>
        </form>
        <?php 

            $ingreso = new ControladorFormularios();
            $ingreso->ctrIngreso();
        
        ?>
    </div>
</div>
