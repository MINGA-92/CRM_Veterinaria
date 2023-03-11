
<?php
require("Conexion.php");

$IdMascota= $_POST['InputIdMascota'];
$FechaCita= $_POST['FechaCita'];
$DescripcionCita= $_POST['DescripcionCita'];

//Verificacion De Existencia De La Cita
$ConsultaSQL= "SELECT * FROM dbp_veterinaria.tbl_citas WHERE CIT_HORAyFECHA= '". $FechaCita ."' AND CIT_ESTADO= 'Activo';";
if ($ResultadoSQL= $ConexionSQL->query($ConsultaSQL)) { 
    $CantidadResultados= $ResultadoSQL->num_rows;
    if($CantidadResultados > 0) {
        $php_response= array("msg" => "Ya Existe");
        echo json_encode($php_response);
        mysqli_close($ConexionSQL);
        exit;
    }else {
        //Insercion De La Cita
        $InsercionSQL= "INSERT INTO dbp_veterinaria.tbl_citas(CIT_HORAyFECHA, CIT_DESCRIPCION, CIT_FKMAS_ID, CIT_ESTADO) VALUES ('". $FechaCita ."', '". $DescripcionCita ."',  '". $IdMascota ."', 'Activo');";
        if ($ResultadoSQL= $ConexionSQL->query($InsercionSQL)) { 
            //Insercion correcta
            $php_response= array("msg" => "Ok");
            echo json_encode($php_response);
            mysqli_close($ConexionSQL);
            exit;

        }else{
            //Error en la Insercion
            $php_response= array("msg" => "Error");
            $ErrorConsulta= mysqli_error($ConexionSQL);
            mysqli_close($ConexionSQL);
            echo $ErrorConsulta;
            exit;
        }
    }
}else {
    //Error en la Consulta
    $ErrorConsulta= mysqli_error($ConexionSQL);
    mysqli_close($ConexionSQL);
    echo $ErrorConsulta;
    exit;
}

?>