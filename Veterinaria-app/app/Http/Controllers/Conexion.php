
<?php

$ConexionSQL = new mysqli("localhost", "root", "", "dbp_veterinaria");
if ($ConexionSQL->connect_errno) {
    echo '<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <title>Document</title>
        <style>
            body {
                font-family: "Roboto", sans-serif;
                text-align: center;
                height: 90vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: relative;
            }
            .ImgContainer {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                width: 100%;
                background-color: white;
            }
            .ImgContainer img {
                max-width: 800px;
                width: 100%;
                animation: gris 2s backwards infinite;
            }
            @keyframes gris {
                0%{
                    filter: grayscale(0%);
                }
                50%{
                    filter: grayscale(100%);
                }
                100%{
                    filter: grayscale(0%);
                }
            }
            .msg {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="ImgContainer">
            <h2> ¡ Servidor Caido ! </h2>
            <img src="./img/page_not_found.svg" alt="Logo">
            <div class="msg"><h4> ☠ ¡Fallo La Conexion! ☠ </h4>:(     Por Favor, Pongase En Contacto Con El Desarrollador Del Sistema     :(</div>
        </div>
    </body>
    </html>';
    exit();
}else{
    if (!$ConexionSQL->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $ConexionSQL->error);
        exit();
    }
    //echo "Conectado... ";
}

?>
