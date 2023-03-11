
<?php
require("Conexion.php");

//Consulta TipoDocumento 
$ListadoTipoDocumento = "";
$ConsultaTipoDocumento = "SELECT EST_DETALLE, EST_DETALLE_2 FROM dbp_veterinaria.tbl_estandar WHERE EST_CONSULTA='TipoDocumento' AND EST_ESTADO='Activo';";
if ($ResultadoTipoDocumento = $ConexionSQL->query($ConsultaTipoDocumento)) {
    $CantidadResultados= $ResultadoTipoDocumento->num_rows;
    if ($CantidadResultados > 0) {
        while ($FilaResultado = $ResultadoTipoDocumento->fetch_assoc()) {
            $ListadoTipoDocumento = $ListadoTipoDocumento . '<option value="' . $FilaResultado['EST_DETALLE'] . '">' . $FilaResultado['EST_DETALLE_2'] . '</option>';
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
                //Consulta TipoMascota 
                $ListadoTipoMascota = "";
                $ConsultaTipoMascota = "SELECT EST_DETALLE, EST_DETALLE_2 FROM dbp_veterinaria.tbl_estandar WHERE EST_CONSULTA='TipoMascota' AND EST_ESTADO='Activo';";
                if ($ResultadoTipoMascota = $ConexionSQL->query($ConsultaTipoMascota)) {
                    $CantidadResultados = $ResultadoTipoMascota->num_rows;
                    if ($CantidadResultados > 0) {
                        while ($FilaResultado = $ResultadoTipoMascota->fetch_assoc()) {
                            $ListadoTipoMascota = $ListadoTipoMascota . '<option value="' . $FilaResultado['EST_DETALLE'] . '">' . $FilaResultado['EST_DETALLE'] . '</option>';
                        }
                        //                        $ListaDeListas= array("ListaTipoDocumento" => $ListadoTipoDocumento, , "ListadoGenero" => $ListadoGenero, "ListadoTipoMascota" => $ListadoTipoMascota)
                        $php_response = array("msg" => "Ok", "ListaTipoDocumento" => $ListadoTipoDocumento, "ListadoGenero" => $ListadoGenero, "ListadoTipoMascota" => $ListadoTipoMascota);
                        mysqli_close($ConexionSQL);
                        echo json_encode($php_response);
                        exit;
                    } else {
                        //Sin Resultados
                        $ListadoTipoMascota = $ListadoTipoMascota . '<option value="Sin Resultados">Sin Resultados </option>';
                    }
                } else {
                    $ErrorConsulta = mysqli_error($ConexionSQL);
                    echo $ErrorConsulta;
                }
            } else {
                //Sin Resultados
                $ListadoGenero = $ListadoGenero . '<option value="Sin Resultados">Sin Resultados </option>';
            }
        } else {
            $ErrorConsulta = mysqli_error($ConexionSQL);
            echo $ErrorConsulta;
        }

    }else{
        //Sin Resultados
        $php_response = array("msg" => "SinResultados");
        mysqli_close($ConexionSQL);
        echo json_encode($php_response);
        exit;
    }
}else{
    //Errro en la consulta sql
    mysqli_close($ConexionSQL);
    $Falla = mysqli_error($ConexionSQL);
    $php_response = array("msg" => "Error", "Falla" => $Falla);
    echo json_encode($php_response);
    exit;
}


?>