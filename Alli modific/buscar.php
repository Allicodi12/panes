<html>
<meta charset="UTF-8">
  <title>Cafetería delicioso aroma</title>
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
</head>
<body>
  <header>
    <h1>Cafetería panes de pan</h1>
    <img src="cafe.gif" width="50" height="50" />
    <h1 id="slogan">&nbsp;&nbsp;&nbsp;El combo perfecto: panes y café para despertar tus sentidos</h1>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
  </header>

  <div class="menu">
    <div class="menu-item"><a href="principal.php">Inicio</a></div>
    <div class="menu-item"><a href="registro.php">Registrarse</a></div>
    <div class="menu-item"><a href="prue1.html">Iniciar sesión</a></div>
    
    <div class="menu-item"><a href="buscarcategoria.html">Buscar por categoria</a></div>
    <div class="menu-item"><a href="galleta.php">Sus galletas</a></div>
  </div>
  
</html>

<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "respaldo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}


$categoria = $_POST['categoria'];


$sql = "SELECT * FROM productos WHERE categoria = '$categoria'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<h3>Publicaciones encontradas:</h3>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
      
       
        echo "" . $row['titulo'] . "<br>";
        echo "<br>";
        echo "" . $row['categoria'] . "<br>";
        echo "<td><img src=" . $row["imagen"] . " height=" . "120px" . "width=" . "120px" . "/></td>";
        echo "<br>";
        echo "" . $row['contenido'] . "<br>";
        echo "<br>";
        echo "<br>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<h3>No se encontraron publicaciones para la categoría: $categoria</h3>";
    echo "<p>Las categorías disponibles son: Panes, Cafe y Galleta</p>";
}


$conn->close();
?>
<html> 
<footer>
<p>© 2023 Receteria Panes de pan. Todos los derechos reservados.</p>
  </footer>
    </html>
