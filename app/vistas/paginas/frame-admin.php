<?php if(isset($_GET["admin"])){
            $paginacion = $_GET["admin"];
            switch($paginacion){
                case "Usuarios":
                    include "usuarios-admin.php";
                    break;
                case "Pedidos";
                    include "pedidos-admin.php";
                    break;
            }
        }
 ?>