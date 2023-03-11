
//Funciones Generales
$(document).ready(function(){
    $("#btnVerDetalles").prop("hidden", true);
});

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
            if (Respuesta == "Ok") {
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
                    IdMascota= Dato[10];

                    //Pintar Tabla Detalles
                    var IdCliente = $("<input id='InputIdCliente' hidden>");
                    IdCliente.val(Clave);
                    $("#frmActualizar").append(IdCliente);
                    var InputIdMascota = $("<input id='InputIdMascota' hidden>");
                    InputIdMascota.val(IdMascota);
                    $("#DatosCitas").append(InputIdMascota);
                    
                    $("#DetalleTipoMascota").empty();
                    $("#DetalleTipoMascota").append(TipoMascota);
                    $("#DetalleNombreMascota").empty();
                    $("#DetalleNombreMascota").append(NombreMascota);
                    $("#DetalleGenero").empty();
                    $("#DetalleGenero").append(GeneroMascota);
                    $("#DetalleTipoDocu").empty();
                    $("#DetalleTipoDocu").append(TipoDocu);
                    $("#DetalleIdentificacion").empty();
                    $("#DetalleIdentificacion").append(Identificacion);
                    $("#DetalleNombre").empty();
                    $("#DetalleNombre").append(Nombre);
                    $("#DetalleApellidos").empty();
                    $("#DetalleApellidos").append(Apellidos);
                    $("#DetalleTelefono").empty();
                    $("#DetalleTelefono").append(Telefono);
                    $("#DetalleFecha").empty();
                    $("#DetalleFecha").append(FechaRegistro);
                    $("#DetalleCorreo").empty();
                    $("#DetalleCorreo").append(Correo);
                    if(TipoMascota == "Canino"){
                        $("#ViewFoto").empty();
                        $("#ViewFoto").append("🐶");
                    }else if(TipoMascota == "Felino"){
                        $("#ViewFoto").empty();
                        $("#ViewFoto").append("🐱");
                    }else if(TipoMascota == "Equino"){
                        $("#ViewFoto").empty();
                        $("#ViewFoto").append("🐴");
                    }else if(TipoMascota == "Lepórido"){
                        $("#ViewFoto").empty();
                        $("#ViewFoto").append("🐰");
                    }else if(TipoMascota == "Ave"){
                        $("#ViewFoto").empty();
                        $("#ViewFoto").append("🦜");
                    }
                    
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

                    var OptionTipoMascota = $("<option class='bg-info'>");
                    OptionTipoMascota.text(TipoMascota);
                    OptionTipoMascota.val(TipoMascota);
                    $("#Act_SelectTipoMascota").append(OptionTipoMascota);
                    var OptionGeneroMascota = $("<option class='bg-info'>");
                    OptionGeneroMascota.text(GeneroMascota);
                    OptionGeneroMascota.val(GeneroMascota);
                    $("#Act_SelectGeneroMascota").append(OptionGeneroMascota);

                    $.ajax({
                        url: "../app/Http/Controllers/ListasDesplegables.php",
                        dataType: "json",
                        type: 'POST',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (php_response){
                            Respuesta = php_response.msg;
                            if(Respuesta == "Ok"){
                                var OptionTipoDocumento= php_response.ListaTipoDocumento;
                                $("#Act_SelectTipoDocu").append(OptionTipoDocumento);
                                var OptionGenero= php_response.ListadoGenero;
                                $("#Act_SelectGeneroMascota").append(OptionGenero);
                                var OptionTipoMascota= php_response.ListadoTipoMascota;
                                $("#Act_SelectTipoMascota").append(OptionTipoMascota);
                                
                            }else if(Respuesta == "Error"){
                                Swal.fire({
                                    icon: 'error',
                                    title: '¡Error Al Consultar Informacion!  🤨',
                                    text: 'Por Favor, Consultar Con El Desarrollador Del Sistema...',
                                    confirmButtonColor: '#2892DB'
                                })
                                console.log('error: ', php_response.msg);
                            }
                        },
                        error: function (php_response){
                            php_response = JSON.stringify(php_response);
                            console.log("php_response: ", php_response)
                            Swal.fire({
                                icon: 'error',
                                title: '¡Fallo La Comunicacion Con El Servidor!  😵',
                                text: 'Por Favor, Consultar Con El Desarrollador Del Sistema...',
                                confirmButtonColor: '#2892DB'
                            })
                            console.log(php_response);
                        }
                    });
                    
                });

            } else if (Respuesta == "SinResultados") {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error Al Consultar Informacion!  🤨',
                    text: 'No Se Encontro Información En El Sistema...',
                    confirmButtonColor: '#2892DB'
                })
            } else if (Respuesta == "Error") {
                console.log(php_response.Falla);
                Swal.fire({
                    icon: 'error',
                    title: '¡Fallo La Comunicacion Con El Servidor!  😵',
                    text: 'Por Favor, Consultar Con El Desarrollador Del Sistema...',
                    confirmButtonColor: '#2892DB'
                })
            }
        },
        error: function(php_response) {
            php_response = JSON.stringify(php_response);
            console.log("php_response: ", php_response);
            Swal.fire({
                icon: 'error',
                title: '¡Fallo La Comunicacion Con El Servidor!  😵',
                text: 'Por Favor, Consultar Con El Desarrollador Del Sistema...',
                confirmButtonColor: '#2892DB'
            })
        }
    })
}

function VerInfoCliente(Clave) {
    var Clave= Clave;
    ConsultarInfo(Clave);
    $("#btnVerDetalles").click();
}

//PDF
$("#BtnPDF").click(function(){
    print();
});

