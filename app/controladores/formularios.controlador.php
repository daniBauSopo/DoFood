<?php 

error_reporting (5);

Class ControladorFormularios{

    /*===================================
    REGISTRO
    ====================================*/

    static public function ctrRegistro(){

        if(isset($_POST["registroEmail"]) && isset($_POST["registroPassword"])){
            $correo = filter_var($_POST["registroEmail"],FILTER_SANITIZE_EMAIL);
            $pass = filter_var($_POST["registroPassword"], FILTER_SANITIZE_STRING);
            if($correo != "" && $pass != ""){

                $tabla = "usuarios";

                $datos = array("email" =>$correo,
                                "pass" => $pass);

            
                $res = ModeloFormularios::mdlRegistro($tabla,$datos);

                return $res;
            }

        }
        
    }

    public function ctrIngreso(){
        if(isset($_POST["ingresoEmail"]) && isset($_POST["ingresoPassword"])){
            $correo = filter_var($_POST["ingresoEmail"],FILTER_SANITIZE_EMAIL);
            $pass = filter_var($_POST["ingresoPassword"], FILTER_SANITIZE_STRING);
            if($correo != "" && $pass != ""){
                $tabla = "usuarios";
                $valor = $_POST["ingresoEmail"];

                $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla,$valor);
                if($respuesta['email'] == $correo && $respuesta['pass'] == $pass){
                    $_SESSION["validarIngreso"] = "ok";
                    setcookie("CorreoIngreso",$correo,time() + (86400 * 30),"/");
                    echo '<script>
					if(window.history.replaceState){
		
						window.history.replaceState(null,null,window.location.href);
		
					}

					window.location = "index.php?pagina=inicio";

				    </script>';
                }else{
                    echo '<script>
					if(window.history.replaceState){
		
						window.history.replaceState(null,null,window.location.href);
		
					}
				    </script>';
                    ?>

				    <div class="alerta" style="padding: 20px; background-color: #fff; color: #dd4e3e;  position: relative; margin-top:10px; border-radius: 5px;font-size: 17px;font-family:'Quicksand', sans-serif;">Error al ingresar al sistema</div>

                    <?php
                }
            }else{
                echo '<script>
                if(window.history.replaceState){
    
                    window.history.replaceState(null,null,window.location.href);
    
                }
                </script>';
                ?>

                <div class="alerta" style="padding: 20px; background-color: #fff; color: #dd4e3e;  position: relative; margin-top:10px; border-radius: 5px;font-size: 17px;font-family:'Quicksand', sans-serif;">Campos obligatorios</div>

                <?php
            }
        }
        ?>
        <script>
        const notificacion = document.querySelector(".alerta");

        setTimeout(() => {
            notificacion.classList.add('visible');
            setTimeout(() => {
                notificacion.classList.remove('visible');
                setTimeout(() => {
                    notificacion.remove();
                },500)
            },3000);
        },100);
        </script>
        <?php
    }

    static public function ctrTraerCategorias(){
        $tabla = "categorias";

        $respuesta = ModeloFormularios::mdlSeleccionarCategoria($tabla);

        return $respuesta;
    }
    static public function ctrRestaurantesCiudad(){
        if(isset($_POST["ciudadPedido"])){
            $ciudad = filter_var($_POST["ciudadPedido"], FILTER_SANITIZE_STRING);
            $nombreCiudad = explode(",",$ciudad,2);
            if($ciudad != ""){
                $tabla = "restaurantes";
                $ciudades = ModeloFormularios::mdlTraerCiudad($nombreCiudad[1],$tabla);
                if($nombreCiudad[1] === $ciudades["localizacion_restaurante"]){
                    $_SESSION["calle"] = $ciudad;
                    $_SESSION["nombreCiudad"] = $nombreCiudad[1];
                    setcookie("calleCookie",$ciudad,time() + (86400 * 30),"/");
                    echo '<script>
					if(window.history.replaceState){
		
						window.history.replaceState(null,null,window.location.href);
		
					}

					window.location = "index.php?pagina=productos";

				    </script>';
                }
            }
        }
    }

    static public function ctrTraerRestaurantes(){
        $tabla1 = "restaurantes";
        $tabla2 = "categorias";
        $ciudad = $_SESSION["nombreCiudad"];
        $comida = $_GET["comida"];
        
        $respuesta = ModeloFormularios::mdlTraerRestaurantes($tabla1,$tabla2,$ciudad,$comida);

        return $respuesta;
    }
}




