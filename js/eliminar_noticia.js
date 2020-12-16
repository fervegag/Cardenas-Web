function delete_news (event_rp){
    if(confirm("¿Está seguro que desea eliminar esta noticia?")){
        return true;
    }else{
        event_rp.preventDefault();
    }
}
let linkRechProf = document.querySelectorAll(".link_delete");

for(var i = 0; i < linkRechProf.length; i++){
    linkRechProf[i].addEventListener('click', delete_news);
}