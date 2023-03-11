
<?php

require("Conexion.php");
session_start();

$InputIdCliente= $_POST['InputIdCliente'];
$Act_SelectTipoDocu = $_POST['Act_SelectTipoDocu'];
$Act_InputDocumento = $_POST['Act_InputDocumento'];
$Act_InputNombre = $_POST['Act_InputNombre'];
$Act_InputApellidos = $_POST['Act_InputApellidos'];
$Act_InputTelefono = $_POST['Act_InputTelefono'];
$Act_InputEmail = $_POST['Act_InputEmail'];
$Act_InputNombreMascota = $_POST['Act_InputNombreMascota'];
$Act_SelectTipoMascota = $_POST['Act_SelectTipoMascota'];
$Act_SelectGeneroMascota = $_POST['Act_SelectGeneroMascota'];


$ActualizarSQL = "UPDATE dbp_veterinaria.tbl_clientes SET CLI_TIPO_DOC= '". $Act_SelectTipoDocu ."', CLI_DOCUMENTO= '". $Act_InputDocumento ."', CLI_NOMBRES= '". $Act_InputNombre ."', CLI_APELLIDOS= '". $Act_InputApellidos ."', CLI_TELEFONO= '". $Act_InputTelefono ."', CLI_EMAIL= '". $Act_InputEmail ."' WHERE CLI_ID= '". $InputIdCliente ."' AND CLI_ESTADO= 'Activo';";
if ($ResultadoSQL = $ConexionSQL->query($ActualizarSQL)) {
    $ActualizarSQL2 = "UPDATE dbp_veterinaria.tbl_mascotas SET MAS_TIPO= '". $Act_SelectTipoMascota ."', MAS_NOMBRE= '". $Act_InputNombreMascota ."', MAS_GENERO= '". $Act_SelectGeneroMascota ."' WHERE MAS_FKCLI_ID= '". $InputIdCliente ."' AND MAS_ESTADO= 'Activo';";
    if ($ResultadoSQL2 = $ConexionSQL->query($ActualizarSQL2)) {
        //Actualización correcta
        $php_response = array("msg" => "Ok");
        mysqli_close($ConexionSQL);
        echo json_encode($php_response);
        exit;  
    }else {
        //Error en la Actualización
        mysqli_close($ConexionSQL);
        $Falla = mysqli_error($ConexionSQL);
        $php_response = array("msg" => "Error", "Falla" => $Falla);
        echo json_encode($php_response);
        exit;
    }
}else {
    //Error en la Actualización
    mysqli_close($ConexionSQL);
    $Falla = mysqli_error($ConexionSQL);
    $php_response = array("msg" => "Error", "Falla" => $Falla);
    echo json_encode($php_response);
    exit;
}

?>