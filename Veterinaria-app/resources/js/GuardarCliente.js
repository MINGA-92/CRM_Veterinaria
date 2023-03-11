
$("#BtnGuardar").click(function(){
    let form_data = new FormData();
    var SelectTipoDocu= $("#SelectTipoDocu").val();
    form_data.append('SelectTipoDocu', SelectTipoDocu);
    var InputDocumento= $("#InputDocumento").val();
    form_data.append('InputDocumento', InputDocumento);
    var InputNombre= $("#InputNombre").val().toUpperCase();
    form_data.append('InputNombre', InputNombre);
    var InputApellidos= $("#InputApellidos").val().toUpperCase();
    form_data.append('InputApellidos', InputApellidos);
    var InputTelefono= $("#InputTelefono").val();
    form_data.append('InputTelefono', InputTelefono);
    var InputEmail= $("#InputEmail").val();
    form_data.append('InputEmail', InputEmail);
    var SelectTipoMascota= $("#SelectTipoMascota").val();
    form_data.append('SelectTipoMascota', SelectTipoMascota);
    var SelectGeneroMascota= $("#SelectGeneroMascota").val();
    form_data.append('SelectGeneroMascota', SelectGeneroMascota);
    var InputNombreMascota= $("#InputNombreMascota").val().toUpperCase();
    form_data.append('InputNombreMascota', InputNombreMascota);

    if((SelectTipoDocu == null) || (SelectTipoDocu == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Tipo De Documento"',
            confirmButtonColor: '#2892DB'
        })
    }else if((InputDocumento == null) || (InputDocumento == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Documento"',
            confirmButtonColor: '#2892DB'
        })
    }else if((InputNombre == null) || (InputNombre == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Nombre Cliente"',
            confirmButtonColor: '#2892DB'
        })
    }else if((InputApellidos == null) || (InputApellidos == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Apellido Cliente"',
            confirmButtonColor: '#2892DB'
        })
    }else if((InputTelefono == null) || (InputTelefono == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Teléfono"',
            confirmButtonColor: '#2892DB'
        })
    }else if((InputEmail == null) || (InputEmail == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Email"',
            confirmButtonColor: '#2892DB'
        })
    }else if((SelectTipoMascota == null) || (SelectTipoMascota == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Tipo De Mascota"',
            confirmButtonColor: '#2892DB'
        })
    }else if((SelectGeneroMascota == null) || (SelectGeneroMascota == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Genero De La Mascota"',
            confirmButtonColor: '#2892DB'
        })
    }else if((InputNombreMascota == null) || (InputNombreMascota == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Nombre De La Mascota"',
            confirmButtonColor: '#2892DB'
        })
    }else {
        $.ajax({
            url: "../app/Http/Controllers/GuardarCliente.php",
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
                        text: 'Cliente Registrado Exitosamente!',
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
                        title: '¿Repetido?  🤔',
                        text: 'Este Cliente Ya Se Encuentra Registrado En El Sistema...',
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