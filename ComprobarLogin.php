<?php
include("cabecera.php");

$conn = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
echo "Conexión exitosa";

$nombre = $_POST['nombre'];
$clave = $_POST['clave'];

$sql = sprintf("SELECT * FROM usuarios WHERE nombre='%s' AND clave='%s'", 
               mysqli_real_escape_string($conn, $nombre), 
               mysqli_real_escape_string($conn, $clave));

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<br>Bienvenido, $nombre";
} else {
    echo "Usuario o contraseña incorrectos";
}

mysqli_close($conn);
?>