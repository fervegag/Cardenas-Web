function conf_ins_alumno(event_ia){
    if(confirm("¿Está seguro que desea inscribir a este alumno al torneo?")){
        return true;
    }else{
        event_ia.preventDefault();
    }
}
let linkInscribir = document.querySelectorAll(".link_ins_alumno");

for(var i = 0; i < linkInscribir.length; i++){
    linkInscribir[i].addEventListener('click', conf_ins_alumno);
}

function conf_can_alumno(event_ca){
    if(confirm("¿Está seguro que desea sacar a este alumno del torneo?")){
        return true;
    }else{
        event_ca.preventDefault();
    }
}
let linkCancelar = document.querySelectorAll(".link_can_alumno");

for(var i = 0; i < linkCancelar.length; i++){
    linkCancelar[i].addEventListener('click', conf_can_alumno);
}