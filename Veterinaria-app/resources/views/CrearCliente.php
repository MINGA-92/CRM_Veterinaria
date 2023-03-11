
<?php 
    require("../app/Http/Controllers/Consultas.php");
?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ::: Nuevo Cliente ::: </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body class="bg-dark">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark static-top shadow">
        <div class="container bg-dark">
            <a class="navbar-brand text-white" href="./"><h2 class="text-info">🐾 VeterinariaPets® </h2></a>
            <button class="navbar-toggler bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-white" id="navbarResponsive">
                <?php require("Nav.php") ?>
            </div>
        </div>
    </nav>

    <section class="pricing py-7">
        <div class="container col-md-8 col-lg-7 col-xl-10" style="margin-top: 2%;"> 
            <div class="card-header bg-info text-center text-uppercase"><b>Nuevo Cliente</b></div>           
            <div class="card-body bg-light">
                <form id="frmCrearCliente" class="col-md-12 mb-12" style="margin-top: 2%;">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Tipo De Documento</label>
                            <div class="form-group">
                                <select class="form-select" id="SelectTipoDocu" name="SelectTipoDocu">
                                    <option disabled selected>Elige Una Opcion</option>
                                    <?php echo $ListadoTipoDocumento; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="InputDocumento">Documento</label>
                            <input type="text" class="form-control" id="InputDocumento" placeholder="Numero Documento"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="InputNombre">Nombre Cliente</label>
                            <input type="text" class="form-control" id="InputNombre" placeholder="Nombres"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="InputApellidos">Apellido Cliente</label>
                            <input type="text" class="form-control" id="InputApellidos" placeholder="Apellidos"/>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 2%;">
                        <div class="col-md-3">
                            <label class="form-label" for="InputTelefono">Teléfono</label>
                            <input type="text" class="form-control" id="InputTelefono" placeholder="Teléfono" maxlength="10"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="InputEmail">Email</label>
                            <input type="email" class="form-control" id="InputEmail" placeholder="Email"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tipo De Mascota</label>
                            <div class="form-group">
                                <select class="form-select" id="SelectTipoMascota" name="SelectTipoMascota">
                                    <option disabled selected>Elige Una Opcion</option>
                                    <?php echo $ListadoTipoMascota; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Genero De La Mascota</label>
                            <div class="form-group">
                                <select class="form-select" id="SelectGeneroMascota" name="SelectGeneroMascota">
                                    <option disabled selected>Elige Una Opcion</option>
                                    <?php echo $ListadoGenero; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 2%;">
                        <div class="col-md-4">
                            <label class="form-label" for="InputNombreMascota">Nombre De La Mascota</label>
                            <input type="text" class="form-control" id="InputNombreMascota" placeholder="Nombre Mascota"/>
                        </div>
                        <div class="col-md-4" style="margin-top: 3%; margin-left: 11%;">
                            <button type="button" id="BtnGuardar" class="btn btn-info text-white">💾 Guardar </button>
                            <a href="./" class="btn btn-secondary">❌ Cancelar </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <section class="pricing py-7">
        <div class="container col-md-8 col-lg-7 col-xl-10" style="margin-top: 2%;">
        </div>
    </section>

    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
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
    <script src="../resources/js/GuardarCliente.js"></script>
</body>
</html>
