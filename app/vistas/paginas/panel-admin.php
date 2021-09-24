<div class="contenedor-admin-todo">
    <div class="contenedor-panel">
        <h1>Panel de control</h1>
        <div class="panel-configuracion">
            <p>Configuración</p>
            <p><i class="fas fa-tools"></i></p>
        </div>
        
        <div class="botonera-admin">
            <p onclick="cambiarFrame(usuarios);">Usuarios</p>
            <p onclick="cambiarFrame(pedidos);">Pedidos</p>
            <a href="index.php?pagina=inicio">Salir</a>
        </div>
        <script>
            let usuarios = document.querySelectorAll('.botonera-admin > p')[0].innerText;
            let pedidos = document.querySelectorAll('.botonera-admin > p')[1].innerText;
            function cambiarFrame(str){
                let cambio = document.querySelector(".admin-content");
                if(str == ""){
                    cambio.innerHTML = "";
                    return;
                }else{
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            cambio.innerHTML = this.responseText;
                            console.log(this.responseURL);
                        }
                    };
                    xhr.open("GET","http://localhost/DoFood/app/vistas/paginas/frame-admin.php?admin="+str,true);
                    xhr.send();
                }
            }
        </script>
    </div>
    <div class="admin-content">
        <?php include "frame-admin.php"; ?>
    </div>
</div>