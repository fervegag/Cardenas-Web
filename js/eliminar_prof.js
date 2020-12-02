function conf_rech_prof(event_rp){
    if(confirm("¿Está seguro que desea eliminar a este profesor?")){
        return true;
    }else{
        event_rp.preventDefault();
    }
}
let linkRechProf = document.querySelectorAll(".link_rech_prof");

for(var i = 0; i < linkRechProf.length; i++){
    linkRechProf[i].addEventListener('click', conf_rech_prof);
}