
<?php 
require("Conexion.php");
session_start();

//Consulta Clientes
$DatosClientes = array();
$ConsultaClientes = "SELECT CLI_ID, CLI_TIPO_DOC, CLI_DOCUMENTO, CLI_NOMBRES, CLI_APELLIDOS, CLI_TELEFONO, CLI_EMAIL FROM dbp_veterinaria.tbl_clientes WHERE CLI_ESTADO= 'Activo' ORDER BY CLI_ID ASC;";
if ($ResultadoClientes = $ConexionSQL->query($ConsultaClientes)) {
    $CantidadResultados = $ResultadoClientes->num_rows;
    if ($CantidadResultados > 0) {
        while ($FilaResultado = $ResultadoClientes->fetch_assoc()) {
            array_push($DatosClientes, array('0' => $FilaResultado['CLI_TIPO_DOC'], '1' => $FilaResultado['CLI_DOCUMENTO'], '2' => $FilaResultado['CLI_NOMBRES'], '3' => $FilaResultado['CLI_APELLIDOS'], '4' => $FilaResultado['CLI_TELEFONO'], '5' => $FilaResultado['CLI_EMAIL'], '6' => $FilaResultado['CLI_ID']));
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

//Consulta Mascotas
$DatosMascotas = array();
$ConsultaMascotas = "SELECT MAS_ID, MAS_TIPO, MAS_NOMBRE, MAS_GENERO, MAS_FKCLI_ID FROM dbp_veterinaria.tbl_mascotas WHERE MAS_ESTADO= 'Activo' ORDER BY MAS_ID ASC;";
if ($ResultadoMascotas = $ConexionSQL->query($ConsultaMascotas)) {
    $CantidadResultados = $ResultadoMascotas->num_rows;
    if ($CantidadResultados > 0) {
        while ($FilaResultado = $ResultadoMascotas->fetch_assoc()) {
            $IdPropietario= $FilaResultado['MAS_FKCLI_ID'];
            $ConsultaPropietario = 'SELECT concat(CLI_NOMBRES, " ", CLI_APELLIDOS) AS NombreCompleto FROM dbp_veterinaria.tbl_clientes WHERE CLI_ID= "'. $IdPropietario .'";';
            if ($ResultadoPropietario = $ConexionSQL->query($ConsultaPropietario)) {
                $CantidadResultados = $ResultadoPropietario->num_rows;
                while ($Resultado = $ResultadoPropietario->fetch_assoc()) {
                    array_push($DatosMascotas, array('0' => $FilaResultado['MAS_TIPO'], '1' => $FilaResultado['MAS_NOMBRE'], '2' => $FilaResultado['MAS_GENERO'], '3' => $Resultado['NombreCompleto'], '4' => $FilaResultado['MAS_ID']));
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


//-- Listas Desplegables --//
//Consulta TipoDocumento 
$ListadoTipoDocumento = "";
$ConsultaTipoDocumento = "SELECT EST_DETALLE, EST_DETALLE_2 FROM dbp_veterinaria.tbl_estandar WHERE EST_CONSULTA='TipoDocumento' AND EST_ESTADO='Activo';";
if ($ResultadoTipoDocumento = $ConexionSQL->query($ConsultaTipoDocumento)) {
    $CantidadResultados = $ResultadoTipoDocumento->num_rows;
    if ($CantidadResultados > 0) {
        while ($FilaResultado = $ResultadoTipoDocumento->fetch_assoc()) {
            $ListadoTipoDocumento = $ListadoTipoDocumento . '<option value="' . $FilaResultado['EST_DETALLE'] . '">' . $FilaResultado['EST_DETALLE_2'] . '</option>';
        }
    } else {
        //Sin Resultados
        $ListadoTipoDocumento = $ListadoTipoDocumento . '<option value="Sin Resultados">Sin Resultados </option>';
    }
} else {
    $ErrorConsulta = mysqli_error($ConexionSQL);
    echo $ErrorConsulta;
}

//Consulta Genero 
$ListadoGenero = "";
$ConsultaGenero = "SELECT EST_DETALLE, EST_DETALLE_2 FROM dbp_veterinaria.tbl_estandar WHERE EST_CONSULTA='Genero' AND EST_ESTADO='Activo';";
if ($ResultadoGenero = $ConexionSQL->query($ConsultaGenero)) {
    $CantidadResultados = $ResultadoGenero->num_rows;
    if ($CantidadResultados > 0) {
        while ($FilaResultado = $ResultadoGenero->fetch_assoc()) {
            $ListadoGenero = $ListadoGenero . '<option value="' . $FilaResultado['EST_DETALLE'] . '">' . $FilaResultado['EST_DETALLE'] . '</option>';
        }
    } else {
        //Sin Resultados
        $ListadoGenero = $ListadoGenero . '<option value="Sin Resultados">Sin Resultados </option>';
    }
} else {
    $ErrorConsulta = mysqli_error($ConexionSQL);
    echo $ErrorConsulta;
}

//Consulta TipoMascota 
$ListadoTipoMascota = "";
$ConsultaTipoMascota = "SELECT EST_DETALLE, EST_DETALLE_2 FROM dbp_veterinaria.tbl_estandar WHERE EST_CONSULTA='TipoMascota' AND EST_ESTADO='Activo';";
if ($ResultadoTipoMascota = $ConexionSQL->query($ConsultaTipoMascota)) {
    $CantidadResultados = $ResultadoTipoMascota->num_rows;
    if ($CantidadResultados > 0) {
        while ($FilaResultado = $ResultadoTipoMascota->fetch_assoc()) {
            $ListadoTipoMascota = $ListadoTipoMascota . '<option value="' . $FilaResultado['EST_DETALLE'] . '">' . $FilaResultado['EST_DETALLE'] . '</option>';
        }
    } else {
        //Sin Resultados
        $ListadoTipoMascota = $ListadoTipoMascota . '<option value="Sin Resultados">Sin Resultados </option>';
    }
} else {
    $ErrorConsulta = mysqli_error($ConexionSQL);
    echo $ErrorConsulta;
}

?>