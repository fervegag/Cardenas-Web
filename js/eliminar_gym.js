function conf_del_gym(event_delg){
    if(confirm("¿Está seguro que desea eliminar este gimnasio?")){
        return true;
    }else{
        event_delg.preventDefault();
    }
}
let linkDelGym = document.querySelectorAll(".link_del_gym");

for(var i = 0; i < linkDelGym.length; i++){
    linkDelGym[i].addEventListener('click', conf_del_gym);
}