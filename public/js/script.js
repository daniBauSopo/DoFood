'use strict'
// INICIO
let burguer = document.querySelector('.header-barra-hamburguesa > i');
let menu = document.querySelector('.menu-lateral');
let cerrarMenu= document.querySelector('.menu-lateral > p');
let input = document.querySelector('.header-input');


menu.style.display="none";
burguer.addEventListener('click',function(){
        menu.classList.add("mostrar");
        menu.style.display="flex";
});
cerrarMenu.addEventListener('click',function(){
    if(menu.classList.contains("mostrar")){
            menu.classList.remove("mostrar");
            menu.style.display="none";
    }
});
// let lista = document.querySelectorAll('.categorias > ul >li');
// let buscador = document.getElementById('nombreCiudad').value;
// let vacio = document.querySelector('#vacio');
// for (let i = 0; i < lista.length; i++) {
//     lista[i].addEventListener('click',function(){
//             let valor = lista[i].id;
//             window.location = "index.php?pagina=productos&comida="+valor;
        
//     })
//   }




    

