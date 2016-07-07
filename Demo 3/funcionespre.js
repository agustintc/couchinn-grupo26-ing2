$(document).ready(function () {
    
   /* var fUpdate;
    var fecha = new Date();
	var dia = fecha.getDate();
	var mes = fecha.getMonth() + 1;
	var anio= fecha.getFullYear();
	if (dia<10) dia='0'+dia; 
    if (mes<10) mes='0'+mes; 
	fUpdate=  dia+'/'+ mes +'/'+anio;
    fecha=dia+'/'+mes+'/'+anio; 
    $("#name").val(fUpdate);*/
    $("#premium").submit(function () {
        if ( validarName()&& validarEmpresa()&& validarPassword() && validarRepeatPassword () )
        {
          return true;
        /*  $('#name').val("");
          $('#lastName').val("");
          $('#email').val("");
          $('#phone').val("");
          $('#password').val("");
           $('#rPassword').val("");
          alert("Sin Implementar");*/
          
          
        }    

          return false;
    
    });
    
    $("#FormLogin").submit( function () {
		
		if (true)
		{
			return true;
			/*$('#email').val("");
			$('#password').val("");
			alert("Sin Implementar");*/
		}    
		return false;
    });
    //alert("chau");
});

//Funcion de Validacion de Campos de Formulario de Registro de Usuario
function validarName() {
    var text = $('#ptarjeta').val();
    var exprText = new RegExp("^[^A-Za-z\s]+");
   // if (text.search(exprText)==true)
    if ((text !=="")&&(text.search(exprText))) 
    {
            
            $("#ErrorName").text("");
            return true;
        }
    else {
          
          $("#ErrorName").text("Error. Nombre Invalido");
          $("#ErrorName").css('color','#d32e12');
          return false;
    }
}

function validarEmpresa() {
    var text = $('#etarjeta').val();
    var exprText = new RegExp("^[^A-Za-z\s]+");
   // if (text.search(exprText)==true)
    if ((text !=="")&&(text.search(exprText))) 
    {
           
            $("#ErrorLastName").text("");
            return true;
        }
    else {
         
          $("#ErrorLastName").text("Error. Nombre de empresa no valida");
          $("#ErrorLastName").css('color','#d32e12');
          return false;
    }
}


function validarPassword() {
    var text = $('#password').val();
    var exprText = /^[A-Za-z\d]{6,20}/;
    //alert(text);
    if ((text!=="") && (text.match(exprText))) {
        
        $("#ErrorPassword").text("");
        return true;
    }
    else {
		
        $("#ErrorPassword").text("Error. clave Invalida");
        $("#ErrorPassword").css('color','#d32e12');
        return false;
    }
}




// ^[A-Za-z\d]+ // ^[A-Za-z\d]{6,20} //ExpresionPasword
//^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$ //expresion Email
// \d{8,10} // expresion Telefono
// Fin de Validacion de Campos de Formulario de Registro de Usuario
