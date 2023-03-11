
<?php 
    /*require("../Control/Conexion.php");
    session_start();

    if (isset($_POST['FechaFinal2'])) {
        $Hora= '00:00:00';
        $Hora2= '23:59:59';
        $FechaI = $_POST['FechaInicial2']; 
        $FechaF = $_POST['FechaFinal2'];
        $FechaInicial= $FechaI. ' ' .$Hora;
        $FechaFinal= $FechaF. ' ' .$Hora2;

        $DatosAlquiler = array();
        $ConsultaAlquiler = "SELECT ALQ_ID, CLI_DOCUMENTO, CLI_NOMBRE, ALQ_FECHAINICIAL, ALQ_TOTAL_DIAS, ALQ_SALDO, VEH_PLACA, VEH_MARCA FROM dbp_alquiler_vehiculos.tbl_clientes, dbp_alquiler_vehiculos.tbl_alquiler, dbp_alquiler_vehiculos.tbl_vehiculos WHERE VEH_ID=ALQFK_VEH_ID AND CLI_ID=ALQFK_CLI_ID AND ALQ_FECHAINICIAL BETWEEN '". $FechaInicial ."' AND '". $FechaFinal ."' AND ALQ_ESTADO= 'Activo' ORDER BY ALQ_ID ASC;";
        if ($ResultadoAlquiler = $ConexionSQL->query($ConsultaAlquiler)) {
            $CantidadResultados = $ResultadoAlquiler->num_rows;
            if ($CantidadResultados > 0) {
                while ($FilaResultado = $ResultadoAlquiler->fetch_assoc()) {
                    array_push($DatosAlquiler, array('0' => $FilaResultado['CLI_DOCUMENTO'], '1' => $FilaResultado['CLI_NOMBRE'], '2' => $FilaResultado['ALQ_FECHAINICIAL'], '3' => $FilaResultado['ALQ_TOTAL_DIAS'], '4' => $FilaResultado['ALQ_SALDO'], '5' => $FilaResultado['VEH_PLACA'], '6' => $FilaResultado['VEH_MARCA']));
                }
            }else{
                // Sin Resultados
                mysqli_close($ConexionSQL);
                echo "<script>
                Swal.fire({
                    icon: 'info',
                    title: 'Sin Resultados?  🤔',
                    text: 'No Se Encuentro Información En El Sistema...',
                    confirmButtonColor: '#2892DB'
                })</script>";
                exit;
            }
        }else{ 
            // Error en la Consulta
            $ErrorConsulta = mysqli_error($ConexionSQL);
            echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
            mysqli_close($ConexionSQL);
            exit; 
        }

    } else {
        $DatosAlquiler = array();
        $ConsultaAlquiler = "SELECT ALQ_ID, CLI_DOCUMENTO, CLI_NOMBRE, ALQ_FECHAINICIAL, ALQ_TOTAL_DIAS, ALQ_SALDO, VEH_PLACA, VEH_MARCA FROM dbp_alquiler_vehiculos.tbl_clientes, dbp_alquiler_vehiculos.tbl_alquiler, dbp_alquiler_vehiculos.tbl_vehiculos WHERE VEH_ID=ALQFK_VEH_ID AND CLI_ID=ALQFK_CLI_ID AND ALQ_ESTADO= 'Activo' ORDER BY ALQ_ID ASC;";
        if ($ResultadoAlquiler = $ConexionSQL->query($ConsultaAlquiler)) {
            $CantidadResultados = $ResultadoAlquiler->num_rows;
            if ($CantidadResultados > 0) {
                while ($FilaResultado = $ResultadoAlquiler->fetch_assoc()) {
                    array_push($DatosAlquiler, array('0' => $FilaResultado['CLI_DOCUMENTO'], '1' => $FilaResultado['CLI_NOMBRE'], '2' => $FilaResultado['ALQ_FECHAINICIAL'], '3' => $FilaResultado['ALQ_TOTAL_DIAS'], '4' => $FilaResultado['ALQ_SALDO'], '5' => $FilaResultado['VEH_PLACA'], '6' => $FilaResultado['VEH_MARCA']));
                }
            }else{
                // Sin Resultados
                mysqli_close($ConexionSQL);
                echo "<script>
                Swal.fire({
                    icon: 'info',
                    title: 'Sin Resultados?  🤔',
                    text: 'No Se Encuentro Información En El Sistema...',
                    confirmButtonColor: '#2892DB'
                })</script>";
                exit;
            }
        }else{ 
            // Error en la Consulta
            $ErrorConsulta = mysqli_error($ConexionSQL);
            echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
            mysqli_close($ConexionSQL);
            exit; 
        }
    }*/

?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ::: Litado De Alquiler ::: </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body class="bg-dark">
     <!-- Navigation -->
     <nav class="navbar navbar-expand-lg navbar-light bg-dark static-top shadow">
        <div class="container bg-dark">
            <a class="navbar-brand text-white" href="#"><h2 class="text-info">🚘 AlquilerVehiculos® </h2></a>
            <button class="navbar-toggler bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-white" id="navbarResponsive">
                <?php /* require("Nav.php") */?>
            </div>
        </div>
    </nav>

    <section class="pricing py-2">
        <div class="container">
            <div class="text-center bg-dark pricing py-2">
                <h2 style="margin-top: 2%; color: #2892DB;"> 👩🏽‍⚕️ ¡Listado De Citas! 👨🏽‍⚕️ </h2>
            </div>
            <div style="margin-top: 2%;"></div>
            <div class="row">
                <table id="TblAlquiler" class="table table-bordered table-striped text-center mt-4">

                    <div class="row">           
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <div class="form-group has-feedback">
                                <label id="lblFechaInicial" class="text-white">Fecha Inicial</label>
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                <input type="date" id="FechaInicial" class="form-control transparencia" required="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                            <div class="form-group has-feedback">
                                <label id="lblFechaFinal" class="text-white">Fecha Final</label>
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                <input type="date" id="FechaFinal" class="form-control transparencia" required="" disabled>
                            </div>
                        </div>
                    </div>

                    <thead class="bg-info text-black">
                        <tr>     
                            <th>Documento </th>
                            <th>Nombre Cliente</th>
                            <th>Fecha Alquiler</th>
                            <th>Dias</th>
                            <th>Saldo</th>
                            <th>Placa</th>
                            <th>Marca</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php /*
                            for($i = 0; $i < count($DatosAlquiler); $i++) {
                                echo '<tr>';
                                for ($d = 0; $d < count($DatosAlquiler[$i]); $d++) {
                                    print_r($d);
                                    echo '<td class="text-white" style="text-align: center;">' . $DatosAlquiler[$i][$d] . '</td>';
                                }
                                echo '</tr>';
                            }
                        */?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <form method="POST" action="ListadoAlquiler.php" enctype="multipart/form-data">
                <input id="FechaInicial2" name="FechaInicial2" hidden="true">
                <input id="FechaFinal2" name="FechaFinal2" hidden="true">
                <button id="Consultar" type="submit" class="btn" hidden="true">Guardar Fecha</button>
            </form>
        </div>
    </section>

    <span>
        <div id='calendar'></div>
    </span>
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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
    <script>
        //Control Fechas
        $('body').on('change', '#FechaInicial', function() {
            document.getElementById("FechaFinal").disabled = false;
        })

        $('body').on('change', '#FechaFinal', function() {      
            let form_data = new FormData();
            var FechaInicial = $("#FechaInicial").val();
            form_data.append('FechaInicial', FechaInicial);
            var FechaFinal = $("#FechaFinal").val();
            form_data.append('FechaFinal', FechaFinal);

            document.getElementById('FechaInicial2').value = FechaInicial;
            document.getElementById('FechaFinal2').value = FechaFinal;
                
            $("#Consultar").click();
        })
    </script>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>

</body>
</html>
