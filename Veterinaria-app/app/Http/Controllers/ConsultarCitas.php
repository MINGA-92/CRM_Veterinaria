
<?php 
    require("Conexion.php");

    if(isset($_POST['FechaFinal2'])) {
        $Hora= '00:00:00';
        $Hora2= '23:59:59';
        $FechaI = $_POST['FechaInicial2']; 
        $FechaF = $_POST['FechaFinal2'];
        $FechaInicial= $FechaI. ' ' .$Hora;
        $FechaFinal= $FechaF. ' ' .$Hora2;

        $DatosCita = array();
        $ConsultaCita = "SELECT CIT_ID, CIT_HORAyFECHA, CIT_DESCRIPCION, CIT_FKMAS_ID FROM dbp_veterinaria.tbl_citas WHERE CIT_HORAyFECHA BETWEEN '". $FechaInicial ."' AND '". $FechaFinal ."' AND CIT_ESTADO= 'Activo' ORDER BY CIT_ID ASC;";
        if ($ResultadoCita = $ConexionSQL->query($ConsultaCita)) {
            $CantidadResultados = $ResultadoCita->num_rows;
            if ($CantidadResultados > 0) {
                while ($FilaResultado = $ResultadoCita->fetch_assoc()) {
                    $IdMascota= $FilaResultado['CIT_FKMAS_ID'];
                    $ConsultaMascota = 'SELECT MAS_TIPO, MAS_NOMBRE, MAS_FKCLI_ID FROM dbp_veterinaria.tbl_mascotas WHERE MAS_ID= "'. $IdMascota .'";';
                    if ($ResultadoMascota = $ConexionSQL->query($ConsultaMascota)) {
                        $CantidadResultados = $ResultadoMascota->num_rows;
                        while ($FilaResultado2 = $ResultadoMascota->fetch_assoc()) {
                            $IdPropietario= $FilaResultado2['MAS_FKCLI_ID'];
                            $ConsultaPropietario = 'SELECT concat(CLI_NOMBRES, " ", CLI_APELLIDOS) AS NombreCompleto FROM dbp_veterinaria.tbl_clientes WHERE CLI_ID= "'. $IdPropietario .'";';
                            if ($ResultadoPropietario = $ConexionSQL->query($ConsultaPropietario)) {
                                $CantidadResultados = $ResultadoPropietario->num_rows;
                                while ($FilaResultado3 = $ResultadoPropietario->fetch_assoc()) {
                                    array_push($DatosCita, array('0' => $FilaResultado['CIT_DESCRIPCION'], '1' => $FilaResultado['CIT_HORAyFECHA'], '2' => $FilaResultado2['MAS_TIPO'], '3' => $FilaResultado2['MAS_NOMBRE'], '4' => $FilaResultado3['NombreCompleto'], '5' => $FilaResultado['CIT_ID']));
                                }
                            }else{
                                // Error en la Consulta
                                $ErrorConsulta = mysqli_error($ConexionSQL);
                                echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
                                mysqli_close($ConexionSQL);
                                exit;
                            }
                        }
                    }else{
                        // Error en la Consulta
                        $ErrorConsulta = mysqli_error($ConexionSQL);
                        echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
                        mysqli_close($ConexionSQL);
                        exit;
                    }
                }
            }else{
                // Sin Resultados
                mysqli_close($ConexionSQL);
                echo "<script>
                Swal.fire({
                    icon: 'info',
                    title: 'Sin Resultados?  🤔',
                    text: 'No Se Encontro Información En El Sistema...',
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

    }else{
        $DatosCita = array();
        $ConsultaCita = "SELECT CIT_ID, CIT_HORAyFECHA, CIT_DESCRIPCION, CIT_FKMAS_ID FROM dbp_veterinaria.tbl_citas WHERE CIT_ESTADO= 'Activo';";
        if ($ResultadoCita = $ConexionSQL->query($ConsultaCita)) {
            $CantidadResultados = $ResultadoCita->num_rows;
            if ($CantidadResultados > 0) {
                while ($FilaResultado = $ResultadoCita->fetch_assoc()) {
                    $IdMascota= $FilaResultado['CIT_FKMAS_ID'];
                    $ConsultaMascota = 'SELECT MAS_TIPO, MAS_NOMBRE, MAS_FKCLI_ID FROM dbp_veterinaria.tbl_mascotas WHERE MAS_ID= "'. $IdMascota .'";';
                    if ($ResultadoMascota = $ConexionSQL->query($ConsultaMascota)) {
                        $CantidadResultados = $ResultadoMascota->num_rows;
                        while ($FilaResultado2 = $ResultadoMascota->fetch_assoc()) {
                            $IdPropietario= $FilaResultado2['MAS_FKCLI_ID'];
                            $ConsultaPropietario = 'SELECT concat(CLI_NOMBRES, " ", CLI_APELLIDOS) AS NombreCompleto FROM dbp_veterinaria.tbl_clientes WHERE CLI_ID= "'. $IdPropietario .'";';
                            if ($ResultadoPropietario = $ConexionSQL->query($ConsultaPropietario)) {
                                $CantidadResultados = $ResultadoPropietario->num_rows;
                                while ($FilaResultado3 = $ResultadoPropietario->fetch_assoc()) {
                                    array_push($DatosCita, array('0' => $FilaResultado['CIT_DESCRIPCION'], '1' => $FilaResultado['CIT_HORAyFECHA'], '2' => $FilaResultado2['MAS_TIPO'], '3' => $FilaResultado2['MAS_NOMBRE'], '4' => $FilaResultado3['NombreCompleto'], '5' => $FilaResultado['CIT_ID']));
                                }
                            }else{
                                // Error en la Consulta
                                $ErrorConsulta = mysqli_error($ConexionSQL);
                                echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
                                mysqli_close($ConexionSQL);
                                exit;
                            }
                        }
                    }else{
                        // Error en la Consulta
                        $ErrorConsulta = mysqli_error($ConexionSQL);
                        echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
                        mysqli_close($ConexionSQL);
                        exit;
                    }
                }
            }else{
                // Sin Resultados
                mysqli_close($ConexionSQL);
                echo "<script>
                Swal.fire({
                    icon: 'info',
                    title: 'Sin Resultados?  🤔',
                    text: 'No Se Encontro Información En El Sistema...',
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
    }

?>
