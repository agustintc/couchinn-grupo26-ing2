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
    $("#formulario").submit(function () {
        if (validarEmail()&& validarName()&& validarLastName()&& validarPassword() && validarRepeatPassword () )
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
		
		if (validarEmail() && validarPassword())
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
    var text = $('#nombre').val();
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

function validarLastName() {
    var text = $('#apellido').val();
    var exprText = new RegExp("^[^A-Za-z\s]+");
   // if (text.search(exprText)==true)
    if ((text !=="")&&(text.search(exprText))) 
    {
           
            $("#ErrorLastName").text("");
            return true;
        }
    else {
         
          $("#ErrorLastName").text("Error. Apellido Invalido");
          $("#ErrorLastName").css('color','#d32e12');
          return false;
    }
}

function validarEmail () {
    var text = $('#mail').val();
    var exprText = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    
    if ((text!=="")&&(text.match(exprText))) {
        $("#ErrorEmail").text("");
        return true;
    }
    else { 
        $("#ErrorEmail").text("Error. Email Invalido");
        $("#ErrorEmail").css('color','#d32e12');
        return false;
    }
} 

function validarPhone ()
{
    var text = $('#phone').val();
    var exprText = /\d{8,10}/;
    if ((text!=="") && (text.match(exprText))) {
        
        $("#ErrorPhone").text("");
        return true;
    }
    else {
        $("#ErrorPhone").text("Error. Telefono Invalido");
        $("#ErrorPhone").css('color','#d32e12');
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
		
        $("#ErrorPassword").text("Error. Contraseña Invalida,minimo 6 caracteres");
        $("#ErrorPassword").css('color','#d32e12');
        return false;
    }
}

function validarRepeatPassword ()
{
    var passOrig = $("#password").val();
    var passRep = $("#repassword").val();
    if ((passRep!=="") && (passOrig == passRep)) {
        $("#ErrorRPassword").text("");
        return true;
    }
    else {
		
        $("#ErrorRPassword").text("Error. Las Contraseñas deben ser iguales");
        $("#ErrorRPassword").css('color','#d32e12');
		 return false;
    }
    
}


// ^[A-Za-z\d]+ // ^[A-Za-z\d]{6,20} //ExpresionPasword
//^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$ //expresion Email
// \d{8,10} // expresion Telefono
// Fin de Validacion de Campos de Formulario de Registro de Usuario
