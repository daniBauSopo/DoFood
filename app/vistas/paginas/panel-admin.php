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
            <a href="index.php?pagina=ingreso">Salir</a>
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
                            let estado = document.querySelectorAll('.estado-pedido');
                            for(let es of estado){
                                switch(es.innerHTML){
                                    case "Procesado":
                                        es.style.backgroundColor = '#dd4e3e'
                                    break;
                                    case "Enviado":
                                        es.style.backgroundColor = '#FA9A16'
                                    break;
                                    case "Entregado":
                                        es.style.backgroundColor = '#2BFA16'
                                    break;
                                }
                            }
                        }
                    };
                    xhr.open("GET","http://localhost/DoFood/app/vistas/paginas/frame-admin.php?admin="+str,true);
                    xhr.send();
                }
            }

            function ChangeStatus(ob1,ob2){
                var parametros = {"ID_pedido":ob1,"Estado":ob2};
                $.ajax({
                    data:parametros,
                    url:'http://localhost/DoFood/app/vistas/paginas/li-pedido.php',
                    type:'post'
                });
            }

            function BanearUsuario(baneo){
                var parametros = {"ID_usuario_ban":baneo};
                $.ajax({
                    data:parametros,
                    url:'http://localhost/DoFood/app/vistas/paginas/usuarios-admin.php',
                    type:'post'
                });
            }

            function RevocarUsuario(revocar){
                var parametros = {"ID_usuario_des":revocar};
                $.ajax({
                    data:parametros,
                    url:'http://localhost/DoFood/app/vistas/paginas/usuarios-admin.php',
                    type:'post'
                });
            }

        </script>
    </div>
    <div class="admin-content">
        <?php include "frame-admin.php"; ?>
    </div>
</div>
