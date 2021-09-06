<?php 

Class Conexion{
    static public function conectar(){
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $db = "dofood";
            
        $conn = new mysqli($servername, $user, $pass, $db);

        if($conn->connect_error){
            die("Conexion fallida ".$conn->connect_error);
        }
        
        return $conn;
    }

}

?>