function delete_pupil (event_ra){
    if(confirm("¿Está seguro que desea eliminar a este alumno?")){
        return true;
    }else{
        event_ra.preventDefault();
    }
}
let linkBorrarAlumno = document.querySelectorAll(".link_delete");

for(var i = 0; i < linkBorrarAlumno.length; i++){
    linkBorrarAlumno[i].addEventListener('click', delete_pupil);
}