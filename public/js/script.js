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

const links = document.querySelectorAll(".header-barra-a > a.contacto");
for(const link of links){
        link.addEventListener("click", clickHandler);
}
const linkers = document.querySelectorAll(".nav-producto > a.tipo-comida");
for(const link of linkers){
        link.addEventListener("click", clickHandler);
}
function clickHandler(e) {
        e.preventDefault();
        const href = this.getAttribute("href");
        const offsetTop = document.querySelector(href).offsetTop;
       
        scroll({
          top: offsetTop,
          behavior: "smooth"
        });
      }
function preDefault(e){
        e.preventDefault();
}
// let checkCategorias = document.querySelectorAll(".aside-categorias > form > input");
// for(const check of checkCategorias){
//         console.log(check.checked);
//         if(check.checked == false){
//                 console.log("ola estoy unchecked");
//         }else if(check.checked == true){
//                 alert("ola estoy checked");
//         }
// }



// let lista = document.querySelectorAll('.categorias > ul >li');
// let buscador = document.getElementById('nombreCiudad').value;
// let vacio = document.querySelector('#vacio');
// for (let i = 0; i < lista.length; i++) {
//     lista[i].addEventListener('click',function(){
//             let valor = lista[i].id;
//             window.location = "index.php?pagina=productos&comida="+valor;
        
//     })
//   }




    

