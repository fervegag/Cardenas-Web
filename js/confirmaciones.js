// aprobar profesores
function conf_conf_prof(event_cp){
    if(confirm("¿Está seguro que desea aprobar a este profesor?")){
        return true;
    }else{
        event_cp.preventDefault();
    }
}
let linkConfProf = document.querySelectorAll(".link_ap_prof");

for(var i = 0; i < linkConfProf.length; i++){
    linkConfProf[i].addEventListener('click', conf_conf_prof);
}
// rechazar profesores
function conf_rech_prof(event_rp){
    if(confirm("¿Está seguro que desea rechazar a este profesor?")){
        return true;
    }else{
        event_rp.preventDefault();
    }
}
let linkRechProf = document.querySelectorAll(".link_rech_prof");

for(var i = 0; i < linkRechProf.length; i++){
    linkRechProf[i].addEventListener('click', conf_rech_prof);
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++
//aprobar administradores
function conf_conf_admin(event_ca){
    if(confirm("¿Está seguro que desea aprobar a este administrador?")){
        return true;
    }else{
        event_ca.preventDefault();
    }
}
let linkConfAdmin = document.querySelectorAll(".link_ap_admin");

for(var i = 0; i < linkConfAdmin.length; i++){
    linkConfAdmin[i].addEventListener('click', conf_conf_admin);
}
//rechazar administradores
function conf_rech_admin(event_ra){
    if(confirm("¿Está seguro que desea rechazar a este administrador?")){
        return true;
    }else{
        event_ra.preventDefault();
    }
}
let linkRechAdmin = document.querySelectorAll(".link_rech_admin");

for(var i = 0; i < linkRechAdmin.length; i++){
    linkRechAdmin[i].addEventListener('click', conf_rech_admin);
}