<!-- SARA QUÍLEZ -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursosql";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM registro";
$result = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($result) > 0) {
    // Crear una tabla para mostrar los resultados
    $output = "<table>";
    $output .= "<tr><th>Id</th><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Email</th><th>Login</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>";
        $output .= "<td>" . $row["ID"] . "</td>";
        $output .= "<td>" . $row["NOMBRE"] . "</td>";
        $output .= "<td>" . $row["PRIMER_APELLIDO"] . "</td>";
        $output .= "<td>" . $row["SEGUNDO_APELLIDO"] . "</td>";
        $output .= "<td>" . $row["EMAIL"] . "</td>";
        $output .= "<td>" . $row["LOGIN"] . "</td>";
        $output .= "</tr>";
    }
    $output .= "</table>";

    // Mostrar la tabla como respuesta a la solicitud AJAX
    echo $output;
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión
$conn->close();
?>
