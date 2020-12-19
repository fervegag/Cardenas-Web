function validar() {
        const titulo = document.getElementById("add_titulo_noticia").value;
        const noticia = document.getElementById("add_noticia").value;
        const imagen = document.getElementById("add_imagen").value;
        const extPermitidas = /(.png|.jpg|jpeg)$/i;
        if(titulo === "" || noticia === "" || imagen === "" || titulo.trim() == "" || noticia.trim() == "" ||imagen.trim() == ""){//validar todos los campos vacios
            alert("Todos los campos son obligatorios");
            return false;
        }else if(titulo.length > 50){
            alert("El título de la noticia es muy largo");
            return false;
        }else if(!extPermitidas.exec(imagen)){
            alert("Solo se admiten imagenes");
            return false;
        }

}
// function valida_noticia(event){
//     const titulo = document.getElementById("add_titulo_noticia").value;
//     const noticia = document.getElementById("add_noticia").value;
//     const imagen = document.getElementById("add_imagen").value;
//     if(titulo.length == 0 || titulo.trim() == ""){
//         alert("Debe agregar un título a la noticia");
//         event.stopPropagation ();
//     }else{
//         if(noticia.length == 0 || noticia.trim() == ""){
//             alert("Debe agregar información a la noticia");
//             event.stopPropagation ();
//         }else{
//             if(imagen.length == 0 || imagen.trim() == ""){
//                 alert("Debe agregar una imagen");
//                 event.stopPropagation ();
//             }else{
//                 return true;
//             }
//         }
//     }

// }
// let botonNoticia = document.querySelectorAll(".agrega_noticia");

// for(var i = 0; i < botonNoticia.length; i++){
//     botonNoticia[i].addEventListener('click', valida_noticia());
// }
