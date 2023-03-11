

<?php 
    require("../app/Http/Controllers/Consultas.php");
?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ::: Litado De Mascotas ::: </title>
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
        <button type="button" id="BtnPDF" class="btn bg-black float-end text-white">PDF 🖨 </button>
        <div class="text-center bg-dark pricing py-2">
            <h2 style="margin-top: 2%; color: #2892DB;"><i class="fa-solid fa-paw fa-beat" style="--fa-animation-duration: 5s;"></i> ¡Listado De Mascotas! <i class="fa-solid fa-paw fa-beat" style="--fa-animation-duration: 5s;"></i></h2>
        </div>
            <div class="row">
                <table id="TblMascotas" class="table table-bordered table-striped text-center mt-4">
                    <thead class="bg-info text-black">
                        <tr> 
                            <th>Tipo Mascota</th>
                            <th>Nombre Mascota</th>
                            <th>Genero</th>
                            <th>Nombre Propietario</th>
                            <th>Ver Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            for($i = 0; $i < count($DatosMascotas); $i++) {
                                echo '<tr>';
                                for ($d = 0; $d < count($DatosMascotas[$i]); $d++) {
                                    if ($d == 4) {
                                        echo '<td style="position: relative;">
                                            <a class="btn btn-outline-info" onclick="VerInfoCliente(' . $DatosMascotas[$i][$d] .');"><i class="fa-solid fa-paw fa-beat" style="--fa-animation-duration: 2s;"></i></a>
                                        </td>';
                                    } else {
                                        echo '<td class="text-white" style="text-align: center;">' . $DatosMascotas[$i][$d] . '</td>';
                                    }
                                    
                                }
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
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
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!--tab Datos Mascota-->
                            <div class="tab-pane fade show active" id="DatosMascota" role="tabpanel" aria-labelledby="DatosMascota-tab">
                                <div class="row" style="margin-top: 2%;">
                                    <div class="col-md-4 text-center" style="margin-top: 2%;">
                                        <h2 width="168" height="120" id="ViewFoto">🐶🐴🐱🐰</h2>
                                    </div>

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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="./Mascotas" class="btn btn-secondary" data-dismiss="ModalDetalles">👈🏽 Atras</a>
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

</body>
</html>
