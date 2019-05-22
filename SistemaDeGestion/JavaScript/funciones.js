function revisar(elemento){ 
    if(elemento.value==''){
        elemento.type='error';
    }else{
        elemento.type='input';
    }
}