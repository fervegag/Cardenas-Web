function validar(){
    const nombre = document.getElementById("add_nombre").value;
    const tipo = document.getElementById("add_tipo").value;
    const fecha = document.getElementById("add_fecha").value;
    const hora = document.getElementById("add_hora").value;
    const direccion = document.getElementById("add_direccion").value;
    const imagen = document.getElementById("add_imagen").value;
    const extPermitidas = /(.png|.jpg|jpeg)$/i;
    if(nombre.trim() == "" || tipo.trim() == "" || fecha.trim() == "" || hora.trim() == "" || direccion.trim() == "" || imagen.trim() == ""){
        alert("Todos los campos son obligatorios");
    }else if(nombre.length > 25){
        alert("El nombre es muy largo");
        return false;
    }else if(tipo.length > 15){
        alert("El tipo de evento es muy largo");
        return false;
    }else if(!extPermitidas.exec(imagen)){
        alert("Solo se admiten imagenes");
        return false;
    }
}