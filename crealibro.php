<?php
include("cabecera.php");

$conn = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$isbn = $_POST['isbn'];

$sql_check = sprintf("SELECT * FROM libros WHERE isbn='%s'", 
                      mysqli_real_escape_string($conn, $isbn));
$result = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result) > 0) {
    echo "\n❌ Ya existe un libro con ese ISBN.";
} else {
    $sql_insert = sprintf(
        "INSERT INTO libros (nombre, autor, isbn, puntuacion, genero) 
        VALUES ('%s','%s','%s','%d','%s')",
        $_POST['nombre'], $_POST['autor'], $_POST['isbn'], $_POST['puntuacion'], $_POST['genero']
    );
    
    if (mysqli_query($conn, $sql_insert)) {
        echo "\n✅ Libro añadido correctamente.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>