function validar(){
    const nombre = document.getElementById("add_nombre").value;
    const dir = document.getElementById("add_direccion").value;
    if(nombre.trim() == "" || dir.trim() == ""){
        alert("Todos los campos son obligatorios");
        return false;
    }else if(nombre.length > 25){
        alert("El nombre es muy largo");
    }else if(dir.length > 250){
        alert("La dirección es muy larga");
        return false;
    }
}