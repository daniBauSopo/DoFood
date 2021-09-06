<?php 

require_once "conexion.php";

    Class ModeloFormularios{

        /*===================================
        REGISTRO
        ====================================*/

        static public function mdlRegistro($tabla, $datos){
            
            $stmt = Conexion::conectar();

                $verificar = self::mdlEstaRegistrado($tabla, $datos['email']);

                if($verificar){
                    echo '<div class="alert alert-danger">Usuario ya existe en la base de datos</div>';
                }else{

                $sql = "INSERT INTO $tabla (email, pass) VALUES ('$datos[email]','$datos[pass]')";

                if($stmt->query($sql) === TRUE){
                return "ok";
                }else{
                 echo "Error: " . $sql . "<br>" . $stmt->error;
                }
                }
        
                $stmt->close();
    }

        static public function mdlEstaRegistrado($tabla,$email){
                $stmt = Conexion::conectar();
            
                $sql = "SELECT * FROM $tabla WHERE email = '$email'";

                $res = $stmt->query($sql);

                if($res->num_rows > 0){
                    return true;
                }else{
                    return false;
                }
    }

        static public function mdlSeleccionarRegistros($tabla,$valor){
            $stmt = Conexion::conectar();
            $sql = "SELECT * FROM $tabla WHERE email = '$valor'";

            $res = $stmt->query($sql);
            
            $dato = $res->fetch_assoc();

            return $dato;

            $stmt->close();

        }

        static public function mdlSeleccionarCategoria($tabla){
            $stmt = Conexion::conectar();
            $sql = "SELECT * FROM $tabla";

            $res = $stmt->query($sql);

            $dato = $res->fetch_all();

            return $dato;
            $stmt->close();
        }

        static public function mdlTraerCiudad($ciudad,$tabla){
            $stmt =  Conexion::conectar();
            $sql = "SELECT localizacion_restaurante FROM $tabla WHERE localizacion_restaurante = '$ciudad'";
            
            $res = $stmt->query($sql);

            $dato = $res->fetch_assoc();

            return $dato;
            $stmt->close();
        }
        static public function mdlTraerRestaurantes($tabla1,$tabla2,$ciudad,$comida){
            $stmt = Conexion::conectar();
            if(!isset($comida)){
                $sql = "SELECT $tabla1.*,$tabla2.nombre_categoria 
                FROM $tabla1,$tabla2 WHERE $tabla2.id_categoria = $tabla1.id_categoria_restaurante 
                AND $tabla1.localizacion_restaurante = '$ciudad'";

                $res = $stmt->query($sql);
                while($dato = $res->fetch_assoc()){
                    $array[] = $dato;
                }
            }elseif(isset($comida)){
                $sql = "SELECT $tabla1.*,$tabla2.nombre_categoria 
                        FROM $tabla1,$tabla2 WHERE $tabla2.id_categoria = $tabla1.id_categoria_restaurante 
                        AND $tabla1.id_categoria_restaurante = $comida
                        AND $tabla1.localizacion_restaurante = '$ciudad'";

                $res = $stmt->query($sql);
                while($dato = $res->fetch_assoc()){
                    $array[] = $dato;
                }
            } 
            return $array;
            
            $stmt->close();
        }

    }

