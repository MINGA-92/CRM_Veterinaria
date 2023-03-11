
<?php 
    require("../app/Http/Controllers/Consultas.php");
    require("../app/Http/Controllers/ConsultarRegistro.php");
?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ::: Litado De Clientes ::: </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body class="bg-dark">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark static-top shadow">
        <div class="container bg-dark">
            <a class="navbar-brand text-white" href="#"><h2 class="text-info">🐾 VeterinariaPets® </h2></a>
            <button class="navbar-toggler bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-white" id="navbarResponsive">
                <?php require("Nav.php") ?>
            </div>
        </div>
    </nav>

    <section class="pricing py-2">
        <div class="container">
            <div style="margin-top: 2%;"></div>     
                <a class="btn btn-primary float-left" href="NuevoCliente"> Nuevo Cliente <i class="fa-solid fa-user-plus"></i></a>
                <button type="button" id="BtnPDF" class="btn bg-black float-end text-white">PDF 🖨 </button>
                <div class="row">
                    <table id="TblClientes" class="table table-bordered table-striped text-center mt-4">
                        <thead class="bg-info text-black">
                            <tr> 
                                <th>Tipo Documento</th>    
                                <th>Numero Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Correo Electrónico</th>
                                <th>Ver Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                for($i = 0; $i < count($DatosClientes); $i++) {
                                    echo '<tr>';
                                    for ($d = 0; $d < count($DatosClientes[$i]); $d++) {
                                        //print_r($d);
                                        if ($d == 6) {
                                            echo '<td style="position: relative;">
                                                <a class="btn btn-outline-info" onclick="VerInfoCliente(' . $DatosClientes[$i][$d] .');"><i class="fa-solid fa-paw fa-beat" style="--fa-animation-duration: 2s;"></i></a>
                                            </td>';
                                        } else {
                                            echo '<td class="text-white" style="text-align: center;">' . $DatosClientes[$i][$d] . '</td>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!--Modal Ver Detalles-->
    <button type="button" id="btnVerDetalles" class="btn bg-black float-end text-white" data-bs-toggle="modal" data-bs-target="#ModalDetalles">Ver</button>
    <div class="modal fade" id="ModalDetalles" tabindex="-1" aria-labelledby="ModalDetallesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!--Tbl Detalles-->
                <div class="col-md-12 mb-12 align-items-center bg-dark">
                    <div class="card-body bg-light">
                        <div class="card-header bg-light text-center text-uppercase"><b> Información Detallada </b></div>
                        <br>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="DatosMascota-tab" data-bs-toggle="tab" data-bs-target="#DatosMascota" type="button" role="tab" aria-controls="DatosMascota" aria-selected="true">Datos Mascota</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="DatosCliente-tab" data-bs-toggle="tab" data-bs-target="#DatosCliente" type="button" role="tab" aria-controls="profile" aria-selected="false">Datos Cliente</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="DatosCitas-tab" data-bs-toggle="tab" data-bs-target="#DatosCitas" type="button" role="tab" aria-controls="profile" aria-selected="false">Agendar Cita</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!--tab Caracteristicas Mascota-->
                            <div class="tab-pane fade show active" id="DatosMascota" role="tabpanel" aria-labelledby="DatosMascota-tab">
                                <div class="row" style="margin-top: 2%;">
                                    <div class="col-md-4 text-center" style="margin-top: 2%;">
                                        <h2 width="168" height="120" id="ViewFoto">🐶🐴🐱🐰</h2>
                                        <!--<img src="" alt="Red dot" id="ViewFoto"/>
                                        <img src="./dist/img/Rick.jpeg" width="168" height="120" alt="Tabler" class="brand-image"/> -->
                                    </div>
                                    
                                    <!--Datos Mascota-->
                                    <div class="col-md-8" style="margin-top: 2%;">
                                        <div class="row">
                                            <div class="col-7">
                                                <label class="float-left" id="lblTipoMascota:"><b>Tipo De Mascota: </b></label>
                                            </div>
                                            <div class="col-5">
                                                <p class="float-left" id="DetalleTipoMascota"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label class="float-left"><b>Nombre: </b></label>
                                            </div>
                                            <div class="col-7">
                                                <p class="float-left" id="DetalleNombreMascota"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label class="float-left" id="lblGenero"><b>Genero: </b></label>
                                            </div>
                                            <div class="col-7">
                                                <p class="float-left" id="DetalleGenero"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--tab Datos Cliente-->
                            <div class="tab-pane fade" id="DatosCliente" role="tabpanel" aria-labelledby="DatosCliente-tab">
                                <div class="row" style="margin-top: 2%;">
                                    <!--Datos Ubicacion -->
                                    <div class="col-md-6" style="margin-top: 2%;">
                                        <div class="row">
                                            <div class="col-5">
                                                <label class="float-left"><b>Tipo: </b></label>
                                            </div>
                                            <div class="col-7">
                                                <p class="float-left" id="DetalleTipoDocu"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="float-left" id="lblIdentificacion"><b>Docucumento: </b></label>
                                            </div>
                                            <div class="col-6">
                                                <p class="float-left" id="DetalleIdentificacion"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label class="float-left" id="lblNombre"><b>Nombre: </b></label>
                                            </div>
                                            <div class="col-7">
                                                <p class="float-left" id="DetalleNombre"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label class="float-left"><b>Apellidos: </b></label>
                                            </div>
                                            <div class="col-7">
                                                <p class="float-left" id="DetalleApellidos"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="float-left"><b>Correo: </b></label>
                                            </div>
                                            <div class="col-8">
                                                <p class="float-left" id="DetalleCorreo"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Datos Secundarios -->
                                    <div class="col-md-6"  style="margin-top: 2%;">
                                        
                                        <div class="row">
                                            <div class="col-5">
                                                <label class="float-left" style="text-align: left"><b>Telefono: </b></label>
                                            </div>
                                            <div class="col-7">
                                                <p class="float-left" id="DetalleTelefono"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label class="float-left"><b>Fecha de Registro: </b></label>
                                            </div>
                                            <div class="col-7">
                                                <p class="float-left" id="DetalleFecha"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <label class="float-left"><b>Estado Actual: </b></label>
                                            </div>
                                            <div class="col-5">
                                                <p class="float-left" id="DetalleEstado">Activo</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--tab Citas-->
                            <div class="tab-pane fade" id="DatosCitas" role="tabpanel" aria-labelledby="DatosCitas-tab">
                                <div class="row" style="margin-top: 2%;">
                                    <!--Datos Citas -->
                                    <div class="col-md-12 mb-12" style="margin-top: 2%;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="float-left">Fecha y Hora: </label>
                                                <input type="datetime-local" class="form-control" id="FechayHora">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="float-left">Descripción Cita: </label>
                                                <input type="text" class="form-control" id="DescripcionCita">
                                            </div>
                                            <div class="col-md-12" style="margin-top: 2%;">
                                                <button type="button" id="BtnAgendar" class="btn btn-info text-white float-end">🗓 Agendar Cita</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="./" class="btn btn-secondary" data-dismiss="ModalDetalles">👈🏽 Atras</a>
                    <!-- Button Modal Actualizar -->
                    <button type="button" class="btn bg-primary float-end text-white" data-bs-toggle="modal" data-bs-target="#ModalActualizar" id="btnModalActualizar">✏ Editar Información</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Actualizar -->
    <div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="ModalActualizarTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Información:</h5>
                    <a href="./" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                </div>
                <div class="modal-body">
                    <div class="card-body bg-light">
                        <form id="frmActualizar" class="col-md-12 mb-12" style="margin-top: 2%;">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Tipo De Documento</label>
                                    <div class="form-group">
                                        <select class="form-select" id="Act_SelectTipoDocu" name="Act_SelectTipoDocu">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="InputDocumento">Documento</label>
                                    <input type="text" class="form-control" id="Act_InputDocumento" placeholder="Numero Documento"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="InputNombre">Nombre Cliente</label>
                                    <input type="text" class="form-control" id="Act_InputNombre" placeholder="Nombres"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="InputApellidos">Apellido Cliente</label>
                                    <input type="text" class="form-control" id="Act_InputApellidos" placeholder="Apellidos"/>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 2%;">
                                <div class="col-md-6">
                                    <label class="form-label" for="Act_InputTelefono">Teléfono</label>
                                    <input type="text" class="form-control" id="Act_InputTelefono" placeholder="Teléfono" maxlength="10"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="InputEmail">Email</label>
                                    <input type="email" class="form-control" id="Act_InputEmail" placeholder="Email"/>
                                </div>

                                <div class="col-md-12" style="margin-top: 2%;">
                                    <label class="form-label" for="InputNombreMascota">Nombre De La Mascota</label>
                                    <input type="text" class="form-control" id="Act_InputNombreMascota" placeholder="Nombre Mascota"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tipo De Mascota</label>
                                    <div class="form-group">
                                        <select class="form-select" id="Act_SelectTipoMascota" name="SelectTipoMascota">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Genero De La Mascota</label>
                                    <div class="form-group">
                                        <select class="form-select" id="Act_SelectGeneroMascota" name="SelectGeneroMascota">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="modal-footer">
                        <a href="./" class="btn btn-secondary">❌ Cancelar </a>
                        <button type="button" id="BtnActualizar" class="btn btn-info text-white">💾 Actualizar </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary" style="margin-top: 11%;">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            👨🏽‍💻 MingaSoft™  Copyright © 2023. by Diego Camilo Rendón All rights reserved.
        </div>
        <div>
            <a href="https://www.linkedin.com/in/diego-camilo-rend%C3%B3n-l%C3%B3pez-6596661a2/" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../resources/js/FuncionesGenerales.js"></script>
    <script src="../resources/js/Actualizar.js"></script>

</body>
</html>
