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

                $sql = "INSERT INTO $tabla (email, pass, bloqueado) VALUES ('$datos[email]','$datos[pass]',0)";

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
                AND $tabla1.localizacion_restaurante = '$ciudad' ORDER BY RAND()";

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

        static public function mdlTraerRestaurante($restaurantes,$categorias,$id_res){
            $stmt = Conexion::conectar();
            $sql = "SELECT $restaurantes.*,$categorias.nombre_categoria FROM $restaurantes,$categorias WHERE $restaurantes.id_restaurante = $id_res";
            
            $res = $stmt->query($sql);

            $dato = $res->fetch_assoc();

            return $dato;
            $stmt->close();
        }

        static public function mdlTraerTipoComida($comida,$categorias,$restaurantes,$id_res){
            $stmt = Conexion::conectar();
            $sql = "SELECT DISTINCT $comida.tipo_comida FROM $comida,$categorias,$restaurantes 
            WHERE $comida.id_comida_categoria = $categorias.id_categoria 
            AND $restaurantes.id_categoria_restaurante = $categorias.id_categoria 
            AND $restaurantes.id_restaurante = $id_res ORDER BY $comida.tipo_comida ASC";
            
            $res = $stmt->query($sql);

            while($dato = $res->fetch_assoc()){
                $array[] = $dato;
            }
            return $array;
            
            $stmt->close();
        }

        static public function mdlTraerComida($comida,$categorias,$restaurantes,$id_res){
            $stmt = Conexion::conectar();
            $sql = "SELECT $comida.* FROM $comida,$categorias,$restaurantes 
            WHERE $comida.id_comida_categoria = $categorias.id_categoria 
            AND $restaurantes.id_categoria_restaurante = $categorias.id_categoria 
            AND $restaurantes.id_restaurante = $id_res";
            
            $res = $stmt->query($sql);

            while($dato = $res->fetch_assoc()){
                $array[] = $dato;
            }
            return $array;
            
            $stmt->close();
        }

        static public function mdlTraerUsuariosAdmin($usuarios){
            $stmt = Conexion::conectar();
            $sql = "SELECT * FROM $usuarios";

            $res = $stmt->query($sql);

            $dato = $res->fetch_all();

            return $dato;
            $stmt->close();
        }

        static public function mdlTraerPedidosAdmin($usuarios,$pedidos,$restaurantes,$id_us){
            $stmt = Conexion::conectar();
            $sql = "SELECT $pedidos.*,$usuarios.*,$restaurantes.* FROM $pedidos,$usuarios,$restaurantes 
            WHERE $pedidos.id_pedido_usuario = $usuarios.id AND $pedidos.id_pedido_restaurante = $restaurantes.id_restaurante 
            AND $pedidos.id_pedido_usuario = $id_us";
            
            $res = $stmt->query($sql);

            $dato = $res->fetch_all();

            return $dato;
            $stmt->close();
        }

        static public function mdlBanearUsuarios($usuarios,$id_usuario){
            $stmt = Conexion::conectar();
            $sql = "UPDATE $usuarios SET bloqueado = 1 WHERE id = '$id_usuario' AND bloqueado = 0";

            if($stmt->query($sql) === TRUE){
                return "ok";
            }else{
                echo "Error: " . $sql . "<br>" . $stmt->error;
            }
        }

        static public function mdlRevocarUsuarios($usuarios,$id_usuario){
            $stmt = Conexion::conectar();
            $sql = "UPDATE $usuarios SET bloqueado = 0 WHERE id = '$id_usuario' AND bloqueado = 1";

            if($stmt->query($sql) === TRUE){
                return "ok";
            }else{
                echo "Error: " . $sql . "<br>" . $stmt->error;
            }
        }

        static public function mdlCambiarEstado($pedidos,$num_estado,$id_pedido){
            $stmt = Conexion::conectar();
            if($num_estado == 0){
                $sql = "UPDATE $pedidos SET estado_pedido = 1 WHERE id_pedido = '$id_pedido'";
            }elseif($num_estado == 1){
                $sql = "UPDATE $pedidos SET estado_pedido = 2 WHERE id_pedido = '$id_pedido'";
            }

            if($stmt->query($sql) === TRUE){
                return "ok";
            }else{
                echo "Error: " . $sql . "<br>" . $stmt->error;
            }
        }

        static public function mdlLlenarCesta($comida,$id_comida){
            $stmt = Conexion::conectar();
            $arrayIds = [];
            $array = explode(",",$id_comida);
            for($i = 0 ; $i<count($arrayIds);$i++){
                $id = $arrayIds[$i];
                
            }
            $sql = "SELECT * FROM $comida WHERE $comida.id_comida = '$id'";

            $res = $stmt->query($sql);

            while($dato = $res->fetch_all()){
                $array[] = $dato;
            }
            
            return $array;
               

            $stmt->close(); 
        }

        static public function mdlOtenerDatosComidaCesta($id){
            $stmt = Conexion::conectar();
            $sql = "SELECT * FROM comida WHERE comida.id_comida = '$id'";

            $res = $stmt->query($sql);

            $dato = $res->fetch_assoc();

            return $dato;
            $stmt->close();
        }

        static public function mdlIngresarPedido($pedidos,$usuarios,$total,$id_res,$correo_usu){
            $stmt = Conexion::conectar();

            $id_usu = self::mdlTraerIdUsuario($usuarios,$correo_usu);

            if(count($id_usu) > 0){

                $sql = "INSERT INTO $pedidos (id_pedido_restaurante, id_pedido_usuario , total_pedido, estado_pedido) VALUES ('$id_res','$id_usu[id]','$total',0)";

                if($stmt->query($sql) === TRUE){
                return "ok";
                }else{
                 echo "Error: " . $sql . "<br>" . $stmt->error;
                }
            }
            
            $stmt->close();
            
        }

        static public function mdlTraerIdUsuario($tabla,$email){
            $stmt = Conexion::conectar();
        
            $sql = "SELECT * FROM $tabla WHERE email = '$email'";

            $res = $stmt->query($sql);

            if($res->num_rows > 0){
                $dato = $res->fetch_assoc();
                return $dato;
            }else{
                return false;
            }
        }

        static public function mdlTraerPedidosUsuario($pedidos,$restaurantes,$usuarios,$correo_usu){
            $stmt = Conexion::conectar();

            $sql = "SELECT $pedidos.*,$restaurantes.*,$usuarios.email FROM $pedidos,$restaurantes,$usuarios 
            WHERE $pedidos.id_pedido_usuario = $usuarios.id AND $pedidos.id_pedido_restaurante = $restaurantes.id_restaurante
            AND $usuarios.email = '$correo_usu' ORDER BY $pedidos.fecha_pedido DESC";

            $res = $stmt->query($sql);

            $datos = $res->fetch_all();

            return $datos;
            $stmt->close();


        }

        static public function mdlLlenarUsuariosSelec($usuarios){
            $stmt = Conexion::conectar();

            $sql = "SELECT $usuarios.email,$usuarios.id FROM $usuarios";

            $res = $stmt->query($sql);

            $dato = $res->fetch_all();

            return $dato;
            $stmt->close();
        }

        static public function mdlAcordeonRestaurantes($restaurantes){
            $stmt = Conexion::conectar();

            $sql = "SELECT $restaurantes.* FROM $restaurantes";

            $res = $stmt->query($sql);

            $dato = $res->fetch_all();

            return $dato;
            $stmt->close();
        }

        static public function mdlTraerLocalizacion($restaurantes){
            $stmt = Conexion::conectar();

            $sql = "SELECT DISTINCT $restaurantes.localizacion_restaurante FROM $restaurantes";

            $res = $stmt->query($sql);

            while($dato = $res->fetch_assoc()){
                $array[] = $dato;
            }
            return $array;

            $stmt->close();
        }

    }
