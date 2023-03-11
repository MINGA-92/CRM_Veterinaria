
<?php
require("Conexion.php");

$TipoDocu= $_POST['SelectTipoDocu'];
$Identificacion= $_POST['InputDocumento'];
$Nombre= $_POST['InputNombre'];
$Apellidos= $_POST['InputApellidos'];
$Telefono= $_POST['InputTelefono'];
$Correo= $_POST['InputEmail'];
$TipoMascota= $_POST['SelectTipoMascota'];
$GeneroMascota= $_POST['SelectGeneroMascota'];
$NombreMascota= $_POST['InputNombreMascota'];

//Verificacion De Existencia Del Cliente
$ConsultaSQL= "SELECT * FROM dbp_veterinaria.tbl_clientes WHERE CLI_DOCUMENTO= '". $Identificacion ."' AND CLI_ESTADO= 'Activo';";
if ($ResultadoSQL= $ConexionSQL->query($ConsultaSQL)) { 
    $CantidadResultados= $ResultadoSQL->num_rows;
    if($CantidadResultados > 0) {
        $php_response= array("msg" => "Ya Existe");
        echo json_encode($php_response);
        mysqli_close($ConexionSQL);
        exit;
    }else {
        //Insercion Del Cliente
        $InsercionSQL= "INSERT INTO dbp_veterinaria.tbl_clientes(CLI_TIPO_DOC, CLI_DOCUMENTO, CLI_NOMBRES, CLI_APELLIDOS, CLI_TELEFONO, CLI_EMAIL, CLI_ESTADO) VALUES ('". $TipoDocu ."', '". $Identificacion ."', '". $Nombre ."', '". $Apellidos ."', '". $Telefono ."',  '". $Correo ."', 'Activo');";
        if ($ResultadoSQL= $ConexionSQL->query($InsercionSQL)) { 
            $ConsultaSQL2= "SELECT CLI_ID FROM dbp_veterinaria.tbl_clientes WHERE CLI_DOCUMENTO= '". $Identificacion ."' AND CLI_ESTADO= 'Activo';";
            if ($ResultadoSQL= $ConexionSQL->query($ConsultaSQL2)) { 
                $CantidadResultados= $ResultadoSQL->num_rows;
                if($CantidadResultados > 0) {
                    while ($FilaResultado = $ResultadoSQL->fetch_assoc()){
                        $IdCliente= $FilaResultado['CLI_ID'];
                        //Insercion De Mascota
                        $InsercionSQL2= "INSERT INTO dbp_veterinaria.tbl_mascotas(MAS_TIPO, MAS_NOMBRE, MAS_GENERO, MAS_FKCLI_ID, MAS_ESTADO) VALUES ('". $TipoMascota ."', '". $NombreMascota ."', '". $GeneroMascota ."', '". $IdCliente ."', 'Activo');";
                        if ($ResultadoSQL= $ConexionSQL->query($InsercionSQL2)) { 
                            //inserción correcta
                            $php_response= array("msg" => "Ok");
                            echo json_encode($php_response);
                            mysqli_close($ConexionSQL);
                            exit;
                        } else {
                            //Error en la Insercion
                            $php_response= array("msg" => "Error");
                            $ErrorConsulta= mysqli_error($ConexionSQL);
                            mysqli_close($ConexionSQL);
                            echo $ErrorConsulta;
                            exit;
                        }
                    }
                }
            }else{
                //Error en la Consulta
                $ErrorConsulta= mysqli_error($ConexionSQL);
                mysqli_close($ConexionSQL);
                echo $ErrorConsulta;
                exit;
            }
            
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