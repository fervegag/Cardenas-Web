function validarAlumno() {
    const nombre = document.getElementById("add_nombre").value;
    const apellido = document.getElementById('add_apellido').value;
    const fecha = document.getElementById('add_fecha').value;
    const telefono = document.getElementById('add_telefono').value;
    const emergencias = document.getElementById('add_emergencias').value;
    const sangre = document.getElementById('add_sangre').value;
    const cinta = document.getElementById('add_cinta').value;
    const estado = document.getElementById('add_estado').value;
    const foto = document.getElementById('add_foto').value;
    const direccion = document.getElementById('add_direccion').value;
    const gym = document.getElementById('gimnasio').textContent;

    const extPermitidas = /(.png|.jpg|jpeg)$/i;
    if(gym == "1"){
        alert("Antes de agregar a un alumno debe ingresar el gimnasio al que pertenece");
        return false;
    }else if (nombre.trim() == "" || apellido.trim() == "" || fecha.trim() == "" || telefono.trim() == "" || emergencias.trim() == "" || sangre === "3" || cinta === "0" || estado === "3" || foto.trim() == "" || direccion.trim() == "") {//validar todos los campos vacios
        alert("Todos los campos son obligatorios");
        return false;
    } else if (nombre.length > 25) {
        alert("El nombre es muy largo");
        return false;
    } else if(apellido.length > 30){
        alert("El apellido es muy largo");
        return false;
    }else if(telefono.length != 10){
        alert("El teléfono debe contener 10 dígitos");
        return false;
    }else if(emergencias.length != 10){
        alert("El teléfono de emergencias debe contener 10 dígitos");
        return false;
    }else if(direccion.length > 250){
        alert('La dirección en muy larga');
        return false;
    }else if (!extPermitidas.exec(foto)) {
        alert("Solo se admiten imagenes como foto");
        return false;
    }else if(isNaN(telefono)){
        alert("El teléfono no es valido");
        return false;
    }else if(isNaN(emergencias)){
        alert("El teléfono de emergencias no es valido");
        return false;
    }

}