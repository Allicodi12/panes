<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<title>panes </title>
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

    
    .menu {
      display: flex;
      justify-content: center;
      background-color: #333;
      color: #fff;
      padding: 10px;
    }

    .menu-item:not(:last-child) {
      margin-right: 10px;
    }

    .menu-item a {
      color: #fff;
      text-decoration: none;
      padding: 5px;
    }

    .menu-item a:hover {
      background-color: #555;
    }

    .post-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      background: #E89786;
      padding: 10px;
      margin: 20px;
    }

    .post {
      width: 48%;
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .post h4 {
      margin-top: 0;
      font-size: 18px;
    }

    .post p {
      margin-bottom: 5px;
    }

    .post hr {
      margin-top: 10px;
      margin-bottom: 10px;
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
    <div class="menu-item"><a href="principal2.php">Inicio</a></div>

    <?php
    session_start();
    if (isset($_SESSION['nombre_usuario'])) {
      $nombre_usuario = $_SESSION['nombre_usuario'];
      ?>
      <div class="menu-item">
        <details>
          <p class="welcome-message">¡Bienvenido, <?php echo $nombre_usuario; ?>!</p>
          <summary>Cuenta</summary>
          <table class="account-options">
            <tr>
              <td><a href="pagina1.php">Usuario</a></td>
            </tr>
            <tr>
              <td><a href="yogalleta.php">Ver publicaciones de galletas</a></td>
            </tr>
            <tr>
              <td><a href="cerrar.php">Cerrar sesión</a></td>
            </tr>
          </table>
        </details>
      </div>
    <?php } ?>

    <div class="menu-item"><a href="buspan.php">Buscar por categoría</a></div>
    <div class="menu-item"><a href="galleta2.php">Sus galletas</a></div>
    <div class="menu-item"><a href="nueva.php">Agregar mi galleta</a></div>
  </div>

  <div class="post-container">
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
        echo "<h4>" . $row['titulo'] . "</h4>";
        echo "<p>" . $row['categoria'] . "</p>";
        echo "<img src='" . $row['imagen'] . "' height='120px' width='120px' />";
        echo "<p>" . $row['contenido'] . "</p>";
        echo "</li>";
      }
      echo "</ul>";
    } else {
      echo "<h3>No se encontraron publicaciones para la categoría: $categoria</h3>";
      echo "<p>Las categorías disponibles son: Panes, Café</p>";
    }

  
    $conn->close();
    ?>
  </div>

  <footer>
    <p>© 2023 Cafetería delicioso aroma. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
