
$("#BtnActualizar").click(function(){
    let form_data = new FormData();
    var InputIdCliente= $("#InputIdCliente").val();
    form_data.append('InputIdCliente', InputIdCliente);
    var Act_SelectTipoDocu= $("#Act_SelectTipoDocu").val();
    form_data.append('Act_SelectTipoDocu', Act_SelectTipoDocu);
    var Act_InputDocumento= $("#Act_InputDocumento").val();
    form_data.append('Act_InputDocumento', Act_InputDocumento);
    var Act_InputNombre= $("#Act_InputNombre").val().toUpperCase();
    form_data.append('Act_InputNombre', Act_InputNombre);
    var Act_InputApellidos= $("#Act_InputApellidos").val().toUpperCase();
    form_data.append('Act_InputApellidos', Act_InputApellidos);
    var Act_InputTelefono= $("#Act_InputTelefono").val();
    form_data.append('Act_InputTelefono', Act_InputTelefono);
    var Act_InputEmail= $("#Act_InputEmail").val();
    form_data.append('Act_InputEmail', Act_InputEmail);
    var Act_InputNombreMascota= $("#Act_InputNombreMascota").val().toUpperCase();
    form_data.append('Act_InputNombreMascota', Act_InputNombreMascota);
    var Act_SelectTipoMascota= $("#Act_SelectTipoMascota").val();
    form_data.append('Act_SelectTipoMascota', Act_SelectTipoMascota);
    var Act_SelectGeneroMascota= $("#Act_SelectGeneroMascota").val();
    form_data.append('Act_SelectGeneroMascota', Act_SelectGeneroMascota);
    

    if((Act_SelectTipoDocu == null) || (Act_SelectTipoDocu == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Tipo De Documento"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Act_InputDocumento == null) || (Act_InputDocumento == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Documento"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Act_InputNombre == null) || (Act_InputNombre == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Nombre Cliente"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Act_InputApellidos == null) || (Act_InputApellidos == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Apellido Cliente"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Act_InputTelefono == null) || (Act_InputTelefono == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Teléfono"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Act_InputEmail == null) || (Act_InputEmail == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Email"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Act_SelectTipoMascota == null) || (Act_SelectTipoMascota == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Tipo De Mascota"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Act_SelectGeneroMascota == null) || (Act_SelectGeneroMascota == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Genero De La Mascota"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Act_InputNombreMascota == null) || (Act_InputNombreMascota == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Nombre De La Mascota"',
            confirmButtonColor: '#2892DB'
        })
    }else {
        $.ajax({
            url: "../app/Http/Controllers/ActualizarInformacion.php",
            dataType: "json",
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: form_data,
            success: function (php_response){
                Respuesta = php_response.msg;
                console.log("Respuesta: ", Respuesta);
                if(Respuesta == "Ok"){
                    Swal.fire({
                        title: '¡Actualizado!  😏',
                        text: '¡Información Actualizada Exitosamente!',
                        icon: 'success',
                        showConfirmButton: false,
                        confirmButtonColor: '#2892DB',
                        timer: 2000
                    }).then(() => {
                        window.location= './';
                    })
                }else if(Respuesta == "Error"){
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error Al Actualizar Informacion!  🤨',
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
    }

});

//Agendar Cita
$("#BtnAgendar").click(function(){
    let form_data = new FormData();
    var IdMascota= $("#InputIdMascota").val();
    form_data.append('InputIdMascota', IdMascota);
    var FechayHora= $("#FechayHora").val();
    var FechaCita= FechayHora.replace("T", " ");
    form_data.append('FechaCita', FechaCita);
    var DescripcionCita= $("#DescripcionCita").val();
    form_data.append('DescripcionCita', DescripcionCita);


    if((FechaCita == null) || (FechaCita == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Fecha y Hora"',
            confirmButtonColor: '#2892DB'
        })
    }else if((DescripcionCita == null) || (DescripcionCita == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Descripción Cita"',
            confirmButtonColor: '#2892DB'
        })
    }else{
        $.ajax({
            url: "../app/Http/Controllers/GuardarCita.php",
            dataType: "json",
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: form_data,
            success: function (php_response){
                Respuesta = php_response.msg;
                console.log("Respuesta: ", Respuesta)
                if(Respuesta == "Ok"){
                    Swal.fire({
                        title: '¡Guardado!  😉',
                        text: 'Cita Agendada Exitosamente!',
                        icon: 'success',
                        showConfirmButton: false,
                        confirmButtonColor: '#2892DB',
                        timer: 2000
                    }).then(() => {
                        window.location= './';
                    })
                }else if(Respuesta == "Ya Existe"){
                    Swal.fire({
                        icon: 'info',
                        title: '¡Ya Tienes Una Cita!  🤔',
                        text: 'Ya Existe Una Cita Agendada Para Esta Misma Hora...',
                        confirmButtonColor: '#2892DB'
                    })
                    console.log(php_response.msg);
                }else if(Respuesta == "Error"){
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error Al Registrar Informacion!  🤨',
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
    }
});
