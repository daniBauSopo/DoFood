<div class="header-imagenes">
    <p>La mejor comida a domicilio</p>
    <div class="header-input">
        <p>Lugar para entregar</p>
            <form method="post">
                <input type="text" maxlength="40" autocomplete="off" name="ciudadPedido" placeholder="Calle Palencia,Granada" id="nombreCiudad" value="<?php echo $_COOKIE["calleCookie"]; ?>"">
                <input type="submit" value="Buscar">
            </form>
            <p id="vacio"></p>
    </div>    
</div>

<?php
   $val = ControladorFormularios::ctrRestaurantesCiudad();
?>