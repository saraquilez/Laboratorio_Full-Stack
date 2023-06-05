<!-- SARA QUÍLEZ -->

<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Consulta</title>
        <link rel="stylesheet" type="text/css" href="registros.css">
    </head>

    <body>

        <?php

            if($_POST){;
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cursosql";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Conexión fallida. " . $conn->connect_error);
                }

                // Get data from form
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];
                $email = $_POST['email'];
                $login = $_POST['login'];
                $password = $_POST['password'];

                // Check data
                $sql = "SELECT * FROM registro WHERE EMAIL ='$email'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="existe_container">';
                    echo '<div class="existe_title">ERROR</div>';
                    echo '<div class="existe_campo">El email ya está registrado</div>';
                    header("refresh:4;url=index.html");
                    echo '</div>';
                } else {
                    // Check if user already exists
                    $sql = "SELECT * FROM registro WHERE LOGIN ='$login'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<div class="existe_container">';
                        echo '<div class="existe_title">ERROR</div>';
                        echo '<div class="existe_campo">El Login ya está registrado</div>';
                        header("refresh:4;url=index.html");
                        echo '</div>';
                    } else {
                        // Insert data into DB
                        $sql_insert = "INSERT INTO `registro` (`NOMBRE`, `PRIMER_APELLIDO`, `SEGUNDO_APELLIDO`, `EMAIL`,`LOGIN`,`PASSWORD`) VALUES
                        ('$nombre', '$apellido1', '$apellido2','$email', '$login','$password')";

                    if ($conn->query($sql_insert) === TRUE) {
                        // Redireccionar a consulta.html
                        header("Location: consulta.html");
                        
                    } else {
                        echo '<div class="registration-error">';
                        echo "No se han podido registrar la suscripción de " . $nombre . " " . $apellido1 . " " . $apellido2 . ". ";
                        header("refresh:5;url=index.html" );
                    }}

            }}

        ?>
    </body>

</html>



