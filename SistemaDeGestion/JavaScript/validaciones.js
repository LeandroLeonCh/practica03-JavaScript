
var cedu=false;
var letra=false;
var letar1=false;
function validarCedula(){
	
    var numero = document.getElementById('ced').value.trim();
    var total = 0;
    var longitud = numero.length;
    var checkLongitud = longitud - 1;

    if (numero != '' && longitud == 10){
      for(var i = 0; i < checkLongitud; i++){
          
        if (i%2 == 0) {
            
          var aux = numero.charAt(i) * 2;
           
          if (aux > 9)
            aux -= 9;
            total += aux;
            
        } else {
          total += parseInt(numero.charAt(i));
        
        }
      }

      total = total % 10 ? 10 - total % 10 : 0;
      
      if (numero.charAt(longitud-1) == total && total!=0) {
        
        document.getElementById('mensajeCedula').innerHTML='Cedula Valida';
        //cedula.style.borderColor ="";
        cedu=true;
        return true;
        
      }else{
        
      document.getElementById('mensajeCedula').innerHTML='Cedula invalida';
        //cedula.style.borderColor ="red";
        cedu=false;
        return false;
        
      }
    }else{
        document.getElementById('mensajeCedula').innerHTML='debe ingresar 10 numeros ';
       // cedula.style.borderColor ="red";
        cedu=false;
        return false;
       
        
      }


}

function isDate(ExpiryDate) { 
    var objDate,  // date object initialized from the ExpiryDate string 
        mSeconds, // ExpiryDate in milliseconds 
        day,      // day 
        month,    // month 
        year;     // year 
    // date length should be 10 characters (no more no less) 
    if (ExpiryDate.length !== 10) { 
       
        return false;
     
    } 
    
    if (ExpiryDate.substring(2, 3) !== '/' || ExpiryDate.substring(5, 6) !== '/') { 
        
        return false; 
    } 
     
    month = ExpiryDate.substring(0, 2) - 1; // because months in JS start from 0 
    day = ExpiryDate.substring(3, 5) - 0; 
    year = ExpiryDate.substring(6, 10) - 0; 
    
    if (year < 1000 || year > 3000) { 
        
        return false; 
    } 
     
    mSeconds = (new Date(year, month, day)).getTime(); 
    
    objDate = new Date(); 
    objDate.setTime(mSeconds); 
     
    if (objDate.getFullYear() !== year || 
        objDate.getMonth() !== month || 
        objDate.getDate() !== day) { 
            
        return false; 
    } 
    // otherwise return true 
    fech=true;
    return true; 
}
/*
function validarSoloLetras(){

	var valor2 = document.getElementById('name').value;


var contar=0;
var mayusculas = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz";

for( var a=0; a<mayusculas.length; a++){
	for (var b=0; b<valor2.length; b++){
		if (valor2[b]==mayusculas[a]){
			contar+=1;
		}
	}
}
		
		 if(contar==1){
            document.getElementById('mensajeNombre').innerHTML = 'Nombre incorrecto';
            letra=false;
            return false;

		}else if (contar==2){
            document.getElementById('mensajeNombre').innerHTML = 'nombre correcto';
           
            letra=true;
			return true;
		}else if(contar >=3){
            document.getElementById('mensajeNombre').innerHTML = 'nombre incorrecto';
           letra=false;
			return false;
		}
	
	}

function validarSoloLetras1(){
	
	var valor2 = document.getElementById('l_name').value;


	var contar=0;
	var mayusculas = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz";
	
	for( var a=0; a<mayusculas.length; a++){
		for (var b=0; b<valor2.length; b++){
			if (valor2[b]==mayusculas[a]){
				contar+=1;
			}
		}
	}
			
			 if(contar==1){
                document.getElementById('mensajeApellido').innerHTML = 'apellido incorrecto';
                letar1=false;
				return false;
                
	
			}else if (contar==2){
                document.getElementById('mensajeApellido').innerHTML = 'apellido correcto';
                letar1=true;
				return true;
			}else if(contar >=3){
               document.getElementById('mensajeApellido').innerHTML = 'apellido incorrecto';
                letar1=false;
				return false;
			}
	
}
*/


function validarCorreo(){
	var cadena = document.getElementById('correo').value;


	if (cadena.indexOf("@est.ups.edu.ec", 0) <0)
	{
		document.getElementById('salida4').innerHTML = ' correo incorrecto';
		return false;
	}else{
		document.getElementById('salida4').innerHTML = 'correo correcto';
		return true;
	}


}

function validarCampos(){
    var va=true;
    var cedula=document.getElementById('ced').value;
    var nombre  = document.getElementById('name').value;
    var mail = document.getElementById('email').value;
    var telf = document.getElementById('telf').value;
    var ape= document.getElementById('l_name').value;
    var fech= document.getElementById('born').value;
    var dir=document.getElementById('address').value;
    var values = nombre.split(' ').filter(function(v){return v!==''});
    var values1=ape.split(' ').filter(function(v){return v!==''});

    if (cedu==false){
        document.getElementById('mensajeCedula').innerHTML='Invalid ID';
        va =false;
    }
    if(isNaN(cedula)){
        document.getElementById('mensajeCedula').innerHTML='Enter only numbers'
    }
    /*if(letar1==false){
        document.getElementById('mensajeApellido').innerHTML='Debe ingresar solamenete letras';
        //not enough words
        va= false;
    }*/
  
    if (values.length != 2 ) {
        document.getElementById('mensajeNombre').innerHTML='Must enter 2 names';
        //not enough words
        va= false;
    }

    if(nombre==''||nombre.length==0){
        document.getElementById('mensajeNombre').innerHTML='Must enter any value';
        va= false;
    }

    if (values1.length != 2) {
        document.getElementById('mensajeApellido').innerHTML='Must enter 2 last names';
        //not enough words
        va= false;
    }

    if(ape==''||ape.length==0){
        document.getElementById('mensajeApellido').innerHTML='Must enter any value';
        va= false;
    }

    if(dir==''){
        document.getElementById('mensajeDir').innerHTML='Enter the address';
    }

    if(mail.indexOf("@est.ups.edu.ec", 0) < 0){
        document.getElementById('mensajeMail').innerHTML='The format is example@est.ups.edu.ec';
        va= false;
    }
 

    
    if(isNaN(telf)||telf==''){
        document.getElementById('mensajeTelf').innerHTML='Must enter any value  or only numbers';
        va= false;
    }

    
    if(!isDate(fech)){
        document.getElementById('mensajeFecha').innerHTML='Fail Date';
        va=false;
    }
    
    if(!va){
        alert('Complet correctly the datas!!');
    }
    return va;
}

