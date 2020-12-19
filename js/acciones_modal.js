function actualizarNoticia(){
    const id = $("#id_noticia").val();
    const titulo = $("#titulo_noticia").val();
    const noticia = $("#noticia").val();
    var f = new Date();
    var y = f.getFullYear();
    var m = f.getMonth();
    var d = f.getDate();
    var fecha = y + "-" + m + "-" + d;


    if(titulo.length == 0 || titulo.trim() == ""){
        alert('El titulo de la noticia no puede quedar vacio')
    }
    else{
        if(noticia.length == 0 || noticia.trim() == ""){
            alert('El contendio de la noticia no puede quedar vacio')
        }
        else{
            window.location="./actualizarNoticia.php?varid="+id+"&vartitulo="+titulo+"&varnoticia="+noticia+"&varfecha="+fecha;
        }
    }

}
// function nuevaNoticia(){
//     const titulo = $("#add_titulo_noticia").val();
//     const noticia = $("#add_noticia").val();
//     var f = new Date();
//     var y = f.getFullYear();
//     var m = f.getMonth();
//     var d = f.getDate();
//     var fecha = y + "-" + m + "-" + d;

//     if(titulo.length == 0 || titulo.trim() == ""){
//         alert('El titulo de la noticia no puede quedar vacio')
//     }
//     else{
//         if(noticia.length == 0 || noticia.trim() == ""){
//             alert('El contendio de la noticia no puede quedar vacio')
//         }
//         else{
//             // window.location="./actualizarNoticia.php?varid="+id+"&vartitulo="+titulo+"&varnoticia="+noticia+"&varfecha="+fecha;

//         }
//     }
// }