

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
                                    print_r($d);
                                    if ($d == 4) {
                                        echo '<td style="position: relative;">
                                            <a class="btn btn-outline-info" onclick="VerInfoMascota(' . $DatosMascotas[$i][$d] .');"><i class="fa-solid fa-paw fa-beat" style="--fa-animation-duration: 2s;"></i></a>
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

</body>
</html>
