
<!DOCTYPE html>
<html>
   
<head>
    <meta charset="UTF-8">
</head>
<body>
    
    <style>
 
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #E89786; 
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 0 20px;
    }

    .hero-image {
      width: 100%;
      max-height: 400px;
      object-fit: cover;
    }

    .section {
      margin-bottom: 40px;
    }

    .section-title {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .section-content {
      font-size: 16px;
      line-height: 1.5;
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    /* Estilos para el menú horizontal */
    .menu {
      display: flex;
      justify-content: center;
      background-color: #333;
      color: #fff;
      padding: 10px;
    }

    .menu-item {
      margin-right: 10px;
    }

    .menu-item:last-child {
      margin-right: 0;
    }

    .menu-item a {
      color: #fff;
      text-decoration: none;
      padding: 5px;
    }

    .menu-item a:hover {
      background-color: #555;
    }
      </style>
<header>
  <h1>Recetas panes de pan</h1><img src="cafe.gif" width="50" height="50" />
  <h1 id="slogan">&nbsp;&nbsp;&nbsp;El combo perfecto: panes y café para despertar tus sentidos</h1>
  <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
</header>

<div id="container">
</div>

<div id="container">
<div class="menu">
<div class="menu-item"><a href="principal.php">Inicio</a></div>
<div class="menu-item"><a href="registro.php">Registrarse</a></div>
<div class="menu-item"><a href="prue1.html">Iniciar sesión</a></div>

<div class="menu-item"><a href="buscarcategoria.html">Buscar por categoria</a></div>
<div class="menu-item"><a href="galleta.php">Sus galletas</a></div>
</div>

	<br>
  <br>
    <form action="prueba2.php" method="post">
        id: <input type="text" name="id"><br>
        Usuario: <input type="text" name="nombre_usuario"><br>
        Contraseña: <input type="password" name="contrasena"><br>
        <input type="submit">
    </form>
    <br><br>
    <?php
session_start();

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "respaldo";

if (isset($_POST["id"]) && isset($_POST["nombre_usuario"]) && isset($_POST["contrasena"])) {
    $id = $_POST["id"];
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];
    $contrasena_md5 = md5($contrasena); 

 
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM usua WHERE id='$id' AND nombre_usuario='$nombre_usuario' AND contrasena='$contrasena_md5'"; // Comparar con el MD5 almacenado
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        $usuario = $result->fetch_assoc();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["token"] = "SI";
        echo "Se inició sesión";
        
        header("Location: principal2.php?nombre_usuario=$nombre_usuario");
        exit();
    } else {
        echo "No hay sesión activa, favor de iniciar sesión en el sistema";
        $_SESSION["token"] = "NO";
    }

    $conn->close();
}
?>
</body>

</html>
<html>
<footer>
    <p>© 2023 Receteria Panes de pan. Todos los derechos reservados.</p>
  </footer>
</html>
