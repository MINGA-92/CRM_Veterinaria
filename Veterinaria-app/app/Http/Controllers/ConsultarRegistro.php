
<?php
require("Conexion.php");

if (isset($_POST['Clave'])) {
    //Consulta Info Cliente
    $DatosCliente= array();
    $CodigoCliente= $_POST['Clave'];
    $ConsultaInfo= "SELECT CLI_TIPO_DOC, CLI_DOCUMENTO, CLI_NOMBRES, CLI_APELLIDOS, CLI_TELEFONO, CLI_EMAIL, CLI_FECHA_REGISTRO FROM dbp_veterinaria.tbl_clientes WHERE CLI_ID='". $CodigoCliente ."' AND CLI_ESTADO= 'Activo';";
    if ($ResultadoInfo= $ConexionSQL->query($ConsultaInfo)) {
        $CantidadResultados= $ResultadoInfo->num_rows;
        if ($CantidadResultados > 0) {
            while ($FilaResultado= $ResultadoInfo->fetch_assoc()) {
                $CLI_TIPO_DOC= $FilaResultado['CLI_TIPO_DOC'];
                $CLI_DOCUMENTO= $FilaResultado['CLI_DOCUMENTO'];
                $CLI_NOMBRES= $FilaResultado['CLI_NOMBRES'];
                $CLI_APELLIDOS= $FilaResultado['CLI_APELLIDOS'];
                $CLI_TELEFONO= $FilaResultado['CLI_TELEFONO'];
                $CLI_EMAIL= $FilaResultado['CLI_EMAIL'];
                $CLI_FECHA_REGISTRO= $FilaResultado['CLI_FECHA_REGISTRO'];
                
                $ConsultaMascota= "SELECT MAS_ID, MAS_TIPO, MAS_NOMBRE, MAS_GENERO FROM dbp_veterinaria.tbl_mascotas WHERE MAS_FKCLI_ID= '". $CodigoCliente ."' AND MAS_ESTADO= 'Activo';";
                if ($ResultadoMascota= $ConexionSQL->query($ConsultaMascota)) {
                    $CantidadResultados= $ResultadoMascota->num_rows;
                    if ($CantidadResultados > 0) {
                        while($FilaResultado2= $ResultadoMascota->fetch_assoc()) {
                            $MAS_ID= $FilaResultado2['MAS_ID'];
                            $MAS_TIPO= $FilaResultado2['MAS_TIPO'];
                            $MAS_NOMBRE= $FilaResultado2['MAS_NOMBRE'];
                            $MAS_GENERO= $FilaResultado2['MAS_GENERO'];
                            array_push($DatosCliente, array("0"=> $CLI_TIPO_DOC, "1"=> $CLI_DOCUMENTO, "2"=> $CLI_NOMBRES, "3"=> $CLI_APELLIDOS, "4"=> $CLI_TELEFONO, "5"=> $CLI_EMAIL, "6"=> $CLI_FECHA_REGISTRO, "7"=> $MAS_TIPO, "8"=> $MAS_NOMBRE, "9"=> $MAS_GENERO, "10"=> $MAS_ID));
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
            }
            $php_response = array("msg" => "Ok", "Resultado" => $DatosCliente);
            mysqli_close($ConexionSQL);
            echo json_encode($php_response);
            exit;
        } else {
            //Sin Resultados
            $php_response = array("msg" => "SinResultados");
            mysqli_close($ConexionSQL);
            echo json_encode($php_response);
            exit;
        }
    } else {
        //Errro en la consulta sql
        mysqli_close($ConexionSQL);
        $Falla = mysqli_error($ConexionSQL);
        $php_response = array("msg" => "Error", "Falla" => $Falla);
        echo json_encode($php_response);
        exit;
    }
} else {
    $CLI_TIPO_DOC= "";
    $CLI_DOCUMENTO= "";
    $CLI_NOMBRES= "";
    $CLI_APELLIDOS= "";
    $CLI_TELEFONO= "";
    $CLI_EMAIL= "";
    $CLI_FECHA_REGISTRO= "";
}

?>
