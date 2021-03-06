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
function actualizarAlumno(){
    const id = $("#id_alumno").val();
    const nombre = $("#nombre_alumno").val();
    const apellidos = $("#apellidos_alumno").val();
    const telefono = $("#telefono").val();
    var tel = telefono.replace(/\s+/g, '');
    const emergencias = $("#emergencias").val();
    var emer = emergencias.replace(/\s+/g, '');
    const estado = $("#estado").val();
    const direccion = $("#direccion").val();
    if(nombre === "" || apellidos === "" || telefono === "" || emergencias === "" || estado === "3" || direccion === "" || nombre.trim() == "" || apellidos.trim() == "" || telefono.trim() == "" || emergencias.trim() == "" || direccion.trim() == "" ){
        alert("Todos los campos son obligatorios");
    }else if(nombre.length > 25){
        alert("El nombre es muy largo");
    }else if(apellidos.length > 30){
        alert("El apellido es muy largo");
    }else if(tel.length > 10 || tel.length < 10){
        alert("El teléfono debe contener 10 digitos");
    }else if(emer.length > 10 || emer.length < 10){
        alert("El teléfono de emergencias debe contener 10 digitos");
    }else if(direccion.length > 250){
        alert("La dirección es muy larga");
    }else if(isNaN(telefono)){
        alert("El teléfono no es valido");
    }else if(isNaN(emergencias)){
        alert("El teléfono de emergencias no es valido");
    }else{
        window.location="./actualizar_Alumno.php?varid="+id+"&varnombre="+nombre+"&varapellidos="+apellidos+"&vartel="+tel+"&varemer="+emer+"&varestado="+estado+"&vardir="+direccion;
    }
}

function actualizarGym(){
    const id = $('#id_gym').val();
    const name = $('#nombre_gym').val();
    const adress = $('#adress').val();

    if(name.trim() == "" || adress.trim() == ""){
        alert("Todos los campos son obligatorios");
    }else if(name.length > 24){
        alert("El nombre es muy largo");
    }else if(adress.length > 250){
        alert("La dirección es muy larga");
    }else{
        window.location="./actualizar_Gym.php?varid="+id+"&varname="+name+"&varadress="+adress;
    }
}
function actualizarAdmin(){
    const codigo = $('#id_admin').val();
    const puesto = $('#puesto').val();
    const cinta = $('#cinta').val();
    const correo = $('#correo').val();
    const telefono = $('#telefono').val();
    expresion = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    if(puesto.trim() == "" || cinta === "0" || correo.trim() == "" || telefono.trim() == ""){
        alert("Todos los campos son obligatorios");
    }else if(puesto.length > 30 ){
        alert("El puesto es muy largo");
    }else if(correo.length > 30){
        alert("El correo es muy largo");
    }else if(telefono.length != 10){
        alert("El teléfono debe contener 10 digitos");
    }else if (isNaN(telefono)){
        alert("El teléfono no es valido");
    }else if(!expresion.test(correo)){
        alert("El correo no es valido");
    }else{
        window.location="./actualizarAdmin.php?varcodigo="+codigo+"&varpuesto="+puesto+"&varcinta="+cinta+"&varcorreo="+correo+"&vartelefono="+telefono;
    }
}
function actualizarProf(){
    const codigo = $('#id_prof').val();
    const cinta = $('#cinta').val();
    const correo = $('#correo').val();
    const telefono = $('#telefono').val();
    const gym = $('#gym').val();
    expresion = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    if(cinta === "0" || correo.trim() == "" || telefono.trim() == "" || gym === "0"){
        alert("Todos los campos son obligatorios");
    }else if(correo.length > 30){
        alert("El correo es muy largo");
    }else if(telefono.length != 10){
        alert("El teléfono debe contener 10 digitos");
    }else if (isNaN(telefono)){
        alert("El teléfono no es valido");
    }else if(!expresion.test(correo)){
        alert("El correo no es valido");
    }else{
        window.location="./actualizarProf.php?varcodigo="+codigo+"&varcinta="+cinta+"&varcorreo="+correo+"&vartelefono="+telefono+"&vargym="+gym;
    }
}
function actualizarEvento(){
    const id = $('#id_evento').val();
    const nombre = $('#nombre').val();
    const tipo = $('#tipo').val();
    const fecha = $('#fecha').val();
    const hora = $('#hora').val();
    const direccion = $('#direccion').val();
    if(nombre.trim() == "" || tipo.trim() == "" || fecha.trim() == "" || hora.trim() == "" || direccion.trim() == ""){
        alert("Todos los campos son obligatorios");
    }else if(nombre.length > 25){
        alert("El nombre es muy largo")
    }else if(tipo.length > 15){
        alert("El tipo de evento es muy largo")
    }else{
        window.location="./actualizarEvento.php?varid="+id+"&varnombre="+nombre+"&vartipo="+tipo+"&varfecha="+fecha+"&varhora="+hora+"&vardireccion="+direccion;
    }
}