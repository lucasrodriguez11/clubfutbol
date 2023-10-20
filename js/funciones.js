jQuery.validator.addMethod("mayus", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[A-Z].*$/.test( value );
}, 'Debe contener una mayuscula al inicio');

$(document).ready(function(){

        $("#form_registro").validate({
            rules: {
                    nombreyapellido: {
                        required: true,
                    },
                    dni: {
                        required: true,
                        minlength: 8
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    clave: {
                        required: true,
                        minlength: 6,
                        mayus: true
                    },
                },
            
            messages:{
                        nombreyapellido:{
                            required: "Ingrese Nombre y Apellido para continuar"
                        },
                        dni: {
                            required: "Ingrese el Dni para continuar",
                            minlength: "Minimo 8 digitos para continuar"
                        },
                        email: {
                            required: "Ingrese su Email para continuar",
                            email: "El Email ingresado no es valido"
                        },
                        clave: {
                            required: "Ingrese una contraseña para continuar",
                            minlength: "Minimo 6 digitos para continuar"
                        }
                 }
        
        });

    
});