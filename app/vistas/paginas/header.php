<header>
    <div class="menu-lateral">
        <?php 
            navegarEntrePaginas();
        ?>
        <p><i class="fas fa-times"></i></p>
    </div>
        <div class="bg-color">
            <div class="header-barra-superior">
                <div class="header-barra-logo">
                    <a href="index.php?pagina=inicio">DoFood</a>
                </div>
                <div class="header-barra-hamburguesa">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="header-barra-a">
                    <?php 
                       navegarEntrePaginas();
                    ?>   
                </div>
            </div>
        </div>
</header>

<?php 
    function navegarEntrePaginas(){
        if(isset($_GET["pagina"])){
            $pagina = $_GET["pagina"];
            switch($pagina){
                case "inicio":
                    if(isset($_COOKIE["CorreoIngreso"])){
                        ?>
                        <a href="#contacto" class="contacto">Contacto</a>
                        <a href="index.php?pagina=restaurantes">Restaurantes</a>
                        <a href="index.php?pagina=pedidos-usuario" class="cuenta"><?php echo $_COOKIE["CorreoIngreso"]; ?></a>
                        <a href="index.php?pagina=ingreso" onclick="<?php session_destroy(); ?>">Salir</a>
                        <?php
                    }else{
                        ?>
                        <a href="#contacto" class="contacto">Contacto</a>
                        <a href="index.php?pagina=restaurantes">Restaurantes</a>
                        <a href="index.php?pagina=registro" class="registrarse">Registro</a>            
                        <a href="index.php?pagina=ingreso" class="iniciar">Iniciar Sesion</a>
                        <?php
                    }
                    break;
                case "productos":
                    if(isset($_COOKIE["CorreoIngreso"])){
                        ?>
                            <a href="index.php?pagina=pedidos-usuario" class="cuenta"><?php echo $_COOKIE["CorreoIngreso"]; ?></a>
                            <a href="index.php?pagina=ingreso" onclick="<?php session_destroy(); ?>">Salir</a>
                        <?php
                        }else{
                            ?>
                            <a href="index.php?pagina=ingreso">Iniciar Sesion</a>
                            <?php
                        }
                        break;
                case "pagina-producto":
                    if(isset($_COOKIE["CorreoIngreso"])){
                        ?>
                            <a href="index.php?pagina=pedidos-usuario" class="cuenta"><?php echo $_COOKIE["CorreoIngreso"]; ?></a>
                            <a href="index.php?pagina=ingreso" onclick="<?php session_destroy(); ?>">Salir</a>
                        <?php
                        }else{
                            ?>
                            <a href="index.php?pagina=ingreso">Iniciar Sesion</a>
                            <?php
                        }
                        break;
                case "pedidos-usuario":
                    if(isset($_COOKIE["CorreoIngreso"])){
                        ?>
                            <a href="index.php?pagina=pedidos-usuario" class="cuenta"><?php echo $_COOKIE["CorreoIngreso"]; ?></a>
                            <a href="index.php?pagina=ingreso" onclick="<?php session_destroy(); ?>">Salir</a>
                        <?php
                        }else{
                            ?>
                            <a href="index.php?pagina=ingreso">Iniciar Sesion</a>
                            <?php
                        }
                        break;
                case "restaurantes":
                    if(isset($_COOKIE["CorreoIngreso"])){
                        ?>
                            <a href="index.php?pagina=pedidos-usuario" class="cuenta"><?php echo $_COOKIE["CorreoIngreso"]; ?></a>
                            <a href="index.php?pagina=ingreso" onclick="<?php session_destroy(); ?>">Salir</a>
                        <?php
                        }else{
                            ?>
                            <a href="index.php?pagina=ingreso">Iniciar Sesion</a>
                            <?php
                        }
                        break;
                default:
                        echo "<script>
                        window.location = 'index.php?pagina=error404';
                        </script>";
                        break;
            }
        }else if(!isset($_GET["pagina"])){
            setcookie("CorreoIngreso","",time() - 3600,"/");
            ?>
            <a href="#contacto" class="contacto">Contacto</a>
            <a href="index.php?pagina=restaurantes">Restaurantes</a>
            <a href="index.php?pagina=registro" class="registrarse">Registro</a>            
            <a href="index.php?pagina=ingreso" class="iniciar">Iniciar Sesion</a>
            <?php
        }
        
    }

    function salir(){
        setcookie("CorreoIngreso","",time() - 3600,"/");
        setcookie("calleCookie","",time() - 3600,"/");
        session_destroy();
    }
?>