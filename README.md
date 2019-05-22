# practica03-JavaScript
tres deberes

        #CALCULADOR
        #VALIDACIONES
        #GALERIA
INSTRUCCIONES	A partir de los siguientes problemas se pide implementar soluciones basadas en el lenguaje de programación de JavaScript usando funciones y eventos.

1.	Se pide construir una calculadora en el lenguaje de programación de JavaScript con base a un formulario HTML usando botones y una caja de texto. Además, para que permita realizar operaciones aritméticas de complejidad básica, como: suma, resta, multiplicación, división, raíz cuadrada, entre otros. A continuación, se muestra un ejemplo de las operaciones que debe realizar la calculadora

Funcionamiento

 
<!DOCTYPE html>
<html>
<head>
<title>Calculadora básica</title>
<meta charset="utf-8"/>
<link href="estilo.css" rel="stylesheet" type="text/css"/>
<script  type="text/javascript" src="funcionalidad.js"></script>
</head>
<body>
<center>
<h1>Calculadora Básica</h1>
<form name="f1"><br>
<input type="text" name="txtcaja1">
<br>
<input type="text" name="txtcaja2" value="0">
<br>
<input type="button" class="arit" onClick="arit('%')" value="%">
<input type="button" onClick="raiz()" value="√">
<input type="button" onClick="escribir('7')" value="x²">
<input type="button" onClick="escribir('7')" value="¹/×">
<br>
<input type="button" class="clear" onClick="document.f1.txtcaja2.value='0'" value="CE">
<input type="button" class="clear" onClick="document.f1.reset(); blocdel = false;" value="C">
<input type="button" class="clear" onClick="deletecarac()" value="◄">
 
<input type="button" class="arit" onClick="arit('/')" value="÷">
<br>
<input type="button" onclick="escribir(this.value)" value="7">
<input type="button" onclick="escribir(this.value)" value="8">
<input type="button" onclick="escribir(this.value)" value="9">
<input type="button" class="arit" onClick="arit('*')" value="×">
<br>
<input type="button" onclick="escribir(this.value)" value="4">
<input type="button" onclick="escribir(this.value)" value="5">
<input type="button" onclick="escribir(this.value)" value="6">
<input type="button" class="arit" onClick="arit('-')" value="-">
<br>
<input type="button" onclick="escribir(this.value)" value="1">
<input type="button" onclick="escribir(this.value)" value="2">
<input type="button" onclick="escribir(this.value)" value="3">
<input type="button" class="arit" onClick="arit('+')" value="+">
<br>
<input type="button" class="arit" onClick="masmenos()" value="±">
<input type="button" onclick="escribir(this.value)" value="0">
<input type="button" onClick="escribir('.')" value=".">
<input type="button" class="igual" onClick="calcular()" value="=">
<br>
</form>
</center>
</body>
</html>

/////////////////JAVASCRIPT CALCULADORA//////
var borrar = false;
	function deletecarac(){
		var caja2 = document.f1.txtcaja2.value;
            if (caja2 == "" || caja2 == "0" || caja2.length == 1 && blocdel!=true){
            	document.f1.txtcaja2.value = "0";
            }
            else if(blocdel!=true){
             	var res = caja2.substring(0,caja2.length-1);
             	document.f1.txtcaja2.value = res;
            }
	}
   function escribir(n){
		var caja2 = document.f1.txtcaja2.value;
		if (borrar) {
            
            document.f1.txtcaja2.value="";
			borrar = false;
			document.f1.txtcaja2.value = n;
		}
		else if (caja2 == "0" && n != "."){
			cajao = caja2.replace("0", "")
			document.f1.txtcaja2.value = cajao + n;
		}
		else{
			document.f1.txtcaja2.value = caja2 + n;
		}
	}
	function raiz(){
		var caja1 = document.f1.txtcaja1.value;
		var caja2 = document.f1.txtcaja2.value;
		document.f1.txtcaja1.value = "Math.sqrt("+ caja2 + caja1 +")";
		document.f1.txtcaja2.value = "";
	}
	function arit(o){
		var caja1 = document.f1.txtcaja1.value;
		var caja2 = document.f1.txtcaja2.value;
		var unum = caja1.substring(caja1.length-1);
		calcular()
		if (unum == "+" || unum == "-" || unum=="*" || unum=="/") {
			unum = unum.replace(unum,o);
			var res = caja1.substring(0,caja1.length-1);
			document.f1.txtcaja1.value = res+unum;
		}
		if (caja1 == "" && caja2 != ""){
			document.f1.txtcaja1.value = caja2 + o;
		}
		else{
			document.f1.txtcaja1.value = caja1 + caja2 + o;
 		}
 		borrar = true;
	}
	function calcular(){
		var caja1 = document.f1.txtcaja1.value;
		var caja2 = document.f1.txtcaja2.value;
		document.f1.txtcaja2.value = eval(caja1 + caja2);
		document.f1.txtcaja1.value = "";
		borrar = true;
		blocdel = true;
	}
	function masmenos(){
		var caja2 = document.f1.txtcaja2.value;
		if (caja2 > 0){
			document.f1.txtcaja2.value = "(-" + caja2 + ")";
		}
		else{
			cajaplus = caja2.replace(/[-|(|)]/g, "");
			document.f1.txtcaja2.value = cajaplus;
		}
	}
  
  //////////////////////////CSS CALCULADORA//////
  
  body{
    background-image: url("images/imageC.jpg");
    background-size: 100%;
  }
  h1{
    color: lightskyblue;
    font-family: cursive;
  }
  form input[type="button"]:hover{
		background-color:slategray;
    cursor: pointer;
  }
  input[type="button"]:active{
    background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px)
  }
	input[type="button"].arit{
    background-color:rgb(0, 128, 6);
    box-shadow:  0 5px rgb(77, 73, 73);
    border-radius: 20px;
    padding: 10px;
    border-spacing: 10px;
	}
	input[type="button"].igual{
    background-color: rgb(128, 0, 85);
    box-shadow:  0 5px rgb(77, 73, 73);
    border-radius: 20px;
	}
	input[type="button"].clear{
    background-color:rgb(12, 91, 143);
    box-shadow:  0 5px rgb(77, 73, 73);
    border-radius: 20px;
	}
	form{
    /*background-image: linear-gradient(to right, rgba(175, 51, 51, 0), rgb(153, 0, 255));*/
    border: outset rgb(129, 55, 20) 10px;
    width: 300px;
    height: 500px;
    padding: 10px;
    

	}
	input[type="text"]{
		background-color: white;
		border:0px;
		width:250px;
		height: 40px;
		font-size: 20px;
		color: rgb(114, 16, 16);
		text-align: right;
		pointer-events: none;
	}
	input[name="txtcaja1"]{
		height: 20px;
    font-size: 16px;
    border: cadetblue;
	}
	input[name="txtcaja2"]{
		margin-bottom: 5px;
    font-size: 26px;
    
	}
	input[type="button"]{
		font-size: 18px;
		font-weight:lighter;
		font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
		width:60px;border:0px;
		height: 60px;
		color: white;
		background-color:rgb(255, 123, 0);
    margin-bottom: 5px;
    box-shadow:  0 5px rgb(77, 73, 73);
    border-radius: 20px;
    border-spacing: 10px;
        }
	body{
		background-color:#f1f1f1;
  }
 form{
   align-content: center;
 }

 



 




2.	Diseñar una interfaz en HTML que permita ingresar los siguientes campos en un formulario: cedula, nombres, apellidos, dirección, teléfono, fecha de nacimiento y correo electrónico. Luego, usando funciones de JavaScript se debe validar que todos los campos han sido ingresados, además; que los valores ingresados en cada campo del formulario sean correctos teniendo en cuenta las siguientes condiciones:
         ////////////////////////////////////////////////
        #VALIDACIONES 
        
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


































 


 
#javascript de la galeria
  {"id":1,"imagen":"images/foto1.jpg"},
    {"id":2,"imagen":"images/foto2.jpg"},
    {"id":3,"imagen":"images/foto3.jpg"},
    {"id":4,"imagen":"images/foto4.jpg"},
    {"id":5,"imagen":"images/foto5.jpg"},
    {"id":6,"imagen":"images/foto6.jpg"},
    {"id":7,"imagen":"images/foto7.jpg"},
    {"id":8,"imagen":"images/foto8.jpg"},
    {"id":9,"imagen":"images/foto9.jpg"},
    {"id":10,"imagen":"images/foto10.jpg"}
    
]
imagenes = [1,2,3,4,5];
var posActual=0;

function inicio(){
    for (i=0 ; i<5; i++){
        
        imagenes[i] = Math.floor(Math.random() * (10));    
        
        
    }
    posActual = 0;
    
    verificar();
    imprimir();
}

//creo una función que muestre la imagen en una section ya creada en el archivo html,
function imprimir(){
    console.log(imagenes);
    //creo codigo html como texto tomando el valor de la lista.
    var texto = "<img src="+lista[imagenes[posActual]].imagen+">";
    //ingresa el codigo HTML al section con id imagen.
     window.document.getElementById("imagen").innerHTML =texto;
     
    
}
function verificar(){
    //Verfica si ya se esta en la ultima imagen para deshabilitar el boton siguiente
    if(posActual==4){
         window.document.getElementById("btn_siguiente").disabled = true;
        window.document.getElementById("btn_anterior").disabled = false;
   
    }
    //conpruebo si se está mostrando la primera imagen par deshabilitar el boton anterior
    else if(posActual == 0){
              window.document.getElementById("btn_anterior").disabled = true;
            window.document.getElementById("btn_siguiente").disabled = false;
   
    }else{
         window.document.getElementById("btn_siguiente").disabled = false;
              window.document.getElementById("btn_anterior").disabled = false;
        
   
    }
}

function anterior(){
    posActual--;
    verificar();
    imprimir();
    
}
function siguiente(){
    
    posActual++;
    verificar();
    imprimir();
    
    
}
    
  
  #html y css de galeria 
  <!doctype html>
<html>
    <head>
        
        <script src="JavaScript/galeria.js"></script>
        
        <meta charset="utf-8"/>
        <style>
            body{
                margin: 30px 200px;
                align-self: center;  
            }
            img{
                width: 500px;
            }
            table{
                width: 400px;
            }
            button{
                width: 70px;
                height: 25px;
                text-align: center;

            }
        
        </style>
    </head>
    <body onload="inicio();" >
        <section id="imagen" >
            
        </section>
        <table>
            <tr>
                <td><input type="button" id="btn_anterior" onclick="anterior();" value="Anterior"/></td>
                <td><button id="btn_inicio" onclick="inicio();">Inicio</button></td>
                <td><input type="button" id="btn_siguiente" onclick="siguiente();" value="Siguiente"/></td>
            </tr>
        </table>
    </body>
</html>
        

ACTIVIDADES POR DESARROLLAR
1.	Crear un repositorio en GitHub con el nombre “Practica03 – Javascript”

 


2.	Crear una carpeta para la solución de cada ejercicio antes mencionado

 












3.	Realizar un commit y push por cada requerimiento de los puntos antes descritos.

 


