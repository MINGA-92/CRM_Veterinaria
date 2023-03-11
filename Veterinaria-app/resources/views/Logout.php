
<?php
    echo "<body class='bg-dark'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js'></script>
    <script>
        Swal.fire({
            title: '¿Ya tienes Cuenta?   🤨',
            text: '¡Aun No has Iniciado Sesion!',
            icon: 'question',
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            timer: false
        }).then(() => {
            window.location= './';
        })
    </script>
    </body>";
?>
