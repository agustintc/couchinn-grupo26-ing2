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
    // alert("hola");
    $("#altaTipoHosp").submit(function () {
        if (validarNameTipo() && validarDescripTipo())
        {
          return true;        
          
        }
          return false;
    
    });
   
    $("#updateTipoHosp").submit(function () {
        if (validarNameTipo() && validarDescripTipo())
        {
          return true;        
          
        }
          return false;
    
    });
    $("#formOlvide").submit( function () {
		
		if (validarEmail())
		{
			return true;
			/*$('#email').val("");
			$('#password').val("");
			alert("Sin Implementar");*/
		}    
		return false;
    });
    //alert("chau");
    
    $("#cambiar-contrasenia").submit( function() {
		
		if(validarPassword() && validarRepeatPassword())
		{
			return true;
			}
		return false;		
		
		});
    $("#reservaHosp").submit(function(){
		if(validarFechas())
		{return true;}
		return false;
		});
	$("#formCal").submit(function(){
		if(validarCalificacion()&&validarComentario() )
		{return true;}
		return false;	
	});	
});

//Funcion de Validacion de Campos de Formulario de Registro de Usuario
function validarNameTipo() {
    var text = $('#nombreTipo').val();
    var exprText = new RegExp("^[^A-Za-z\s]+");
   // if (text.search(exprText)==true)
    if ((text !=="")&&(text.search(exprText))) 
    {
            //alert("Form Valido");
           $("#errorNombreTipo").text("");
            return true;
        }
    else {
          //alert("formInvalido");
          $("#errorNombreTipo").text("Error. Nombre Invalido");
          $("#errorNombreTipo").css('color','#d32e12');
          return false;
    }
}

function validarDescripTipo() {
    var text = $('#descTipo').val();
    var exprText = new RegExp("^[^A-Za-z\s]+");
   // if (text.search(exprText)==true)
    if ((text !=="")&&(text.search(exprText))) 
    {
            //alert("Form Valido");
            $("#ErrorName").text("");
            return true;
        }
    else if (text ==""){
			 //alert("Form Valido");
            $("#errorDescTipo").text("");
            return true;
        }
        else {
			
			 //alert("formInvalido");
          $("#errorDescTipo").text("Error. Descripcion Invalida");
          $("#errorDescTipo").css('color','#d32e12');
          return false;
			
			}
}


// ____________________________________________________________//






function validarLastName() {
    var text = $('#lastName').val();
    var exprText = new RegExp("^[^A-Za-z\s]+");
   // if (text.search(exprText)==true)
    if ((text !=="")&&(text.search(exprText))) 
    {
            //alert("Form Valido");
            $("#ErrorLastName").text("");
            return true;
        }
    else {
          //alert("formInvalido");
          $("#ErrorLastName").text("Error. Apellido Invalido");
          $("#ErrorLastName").css('color','#d32e12');
          return false;
    }
}

function validarEmail () {
    var text = $('#email').val();
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
        $("#ErrorPassword").text("Error. Contraseña Invalida")
        $("#ErrorPassword").css('color','#d32e12');
        return false;
    }
}

function validarRepeatPassword ()
{
    var passOrig = $("#password").val();
    var passRep = $("#rPassword").val();
    if ((passRep!=="") && (passOrig == passRep)) {
        $("#ErrorRPassword").text("");
        return true;
    }
    else {
        $("#ErrorRPassword").text("Error. La Contraseña debe ser iguales");
        $("#ErrorRPassword").css('color','#d32e12');
    }
    
}

function validarFechas(){
	
	var fechaComienzo = $("#fechaIng").val();
	var fechaFinalizacion = $("#fechaSal").val();

	if ((fechaComienzo !== fechaFinalizacion) && (fechaComienzo < fechaFinalizacion) && ( ((new Date()).toJSON().slice(0,10)) <= fechaComienzo) ){
	
		return true;
	
	}
	else{
		$("#errorFecha").text("Error. La fechas son invalidas");
        $("#errorFecha").css('color','#d32e12');
		return false;
	}
	
	
}

function validarCalificacion()
	{
		var valor = $('#calificacion').val();
		//alert(valor);
		if (valor != '0')
		{
			 $("#errorCal").text("");
			return true;
			}
		else {
			 $("#errorCal").text("Debe Selecionar Una Calificacion...");
			  $("#errorCal").css('color','#d32e12');
			return false;
		}	
	
	}
function validarComentario()
{
	 var text = $('#comentario').val();
    var exprText = /^[A-Za-z\d]{1,50}/;
    //alert(text);
    if ((text!=="") && (text.match(exprText))) {
        
        $("#errorComentario").text("");
        //alert("treu");
        return true;
    }
    else {
        $("#errorComentario").text("Error. Debe Escribir un Comentario")
        $("#errorComentario").css('color','#d32e12');
        return false;
    }
}	

// ^[A-Za-z\d]+ // ^[A-Za-z\d]{6,20} //ExpresionPasword
//^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$ //expresion Email
// \d{8,10} // expresion Telefono
// Fin de Validacion de Campos de Formulario de Registro de Usuario
