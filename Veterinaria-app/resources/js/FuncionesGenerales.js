
//Función para enviar datos Cliente
function ConsultarInfo(Clave) {
    console.log("Clave: ", Clave)
    let form_data = new FormData();
    form_data.append('Clave', Clave);
    $.ajax({
        url: "../app/Http/Controllers/ConsultarRegistro.php",
        dataType: "json",
        type: "POST",
        cache: false,
        processData: false,
        contentType: false,
        data: form_data,
        success: function(php_response) {
            Respuesta = php_response.msg;
            Datos= php_response.Resultado;
            console.log("Respuesta: ", Respuesta);
            console.log("Datos: ", Datos);
            if (Respuesta == "Ok") {
                console.log("😉👉🏽®♠👽🎮👻🤙👨‍💻");
                console.log(Datos);

                
                Datos.forEach((Dato) => {
                    console.log("Datos Consultados: ", Dato);
                    TipoDocu= Dato[0];
                    Identificacion= Dato[1];
                    Nombre= Dato[2];
                    Apellidos= Dato[3];
                    Telefono= Dato[4];
                    Correo= Dato[5];
                    FechaRegistro= Dato[6];
                    TipoMascota= Dato[7];
                    NombreMascota= Dato[8];
                    GeneroMascota= Dato[9];
                    
                    //Pintar Formulario Actualizar
                    var OptionTipoDocu = $("<option class='bg-info'>");
                    OptionTipoDocu.text(TipoDocu);
                    OptionTipoDocu.val(TipoDocu);
                    $("#Act_SelectTipoDocu").append(OptionTipoDocu);

                    $("#Act_InputDocumento").val(Identificacion);
                    $("#Act_InputNombre").val(Nombre);
                    $("#Act_InputApellidos").val(Apellidos);
                    $("#Act_InputTelefono").val(Telefono);
                    $("#Act_InputEmail").val(Correo);
                    $("#Act_InputNombreMascota").val(NombreMascota);
                    //$("#Act_marcaSelectModal").empty();
                    
                });

            } else if (Respuesta == "SinResultados") {
                alert("No se encontraron departamentos de este pais, consultar con el administrador de sistema!");
            } else if (Respuesta == "Error") {
                alert("Se genero una falla en la asignación!");
                console.log("Error en el sistema");
                console.log(php_response.Falla);
            }
        },
        error: function(php_response) {
            console.log("php_response: ", php_response);
            php_response = JSON.stringify(php_response);
            console.log("php_response: ", php_response);
            alert("Error en la comunicacion con el servidor!");
        }
    })
}

function VerInfoCliente(Clave) {
    var Clave= Clave;
    ConsultarInfo(Clave);
}

function EditarInfoCliente(Clave) {
    var Clave= Clave;
    ConsultarInfo(Clave);
}