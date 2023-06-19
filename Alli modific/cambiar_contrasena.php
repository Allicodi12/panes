<?php
session_start();


if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: principal.php"); 
    exit;
}


$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "respaldo";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}


$nombreUsuario = $_SESSION['nombre_usuario'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nuevaContrasena = $_POST['nueva_contrasena'];

    $nuevaContrasenaHash = md5($nuevaContrasena);

    
    $query = "UPDATE usua SET contrasena = '$nuevaContrasenaHash' WHERE nombre_usuario = '$nombreUsuario'";

    ob_start(); 

    if ($conn->query($query) === TRUE) {
        echo "Contraseña actualizada correctamente.";
    } else {
        echo "Error al actualizar la contraseña: " . $conn->error;
    }
    
    ob_end_flush(); 
    
    header("Refresh: 2; URL=pagina1.php"); 
    exit(); 
}

$conn->close();
?>

