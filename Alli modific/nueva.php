<?php
session_start();

if (isset($_GET['nombre_usuario'])) {
   
    $_SESSION['nombre_usuario'] = $_GET['nombre_usuario'];
}


if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
    $nombre_usuario = null;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Reetas</title>
  <style>
    /* Estilos CSS */
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
<center><div id="logo-container">
 
<h1>Recetas panes de pan</h1><img src="cafe.gif" width="50" height="50" />
    <h1 id="slogan">&nbsp;&nbsp;&nbsp;El combo perfecto: panes y café para despertar tus sentidos</h1>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
</div></center>
  </header>
<div id="container">
    <div class="menu">
        <div class="menu-item"><a href="principal2.php">Inicio</a></div>
        
        <?php if (isset($_SESSION['nombre_usuario'])) { ?>
            <div class="menu-item">
                <details>
                <p class="welcome-message">Usuario:<?php echo $nombre_usuario; ?></p>
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
        <div class="menu-item"><a href="buspan.php">Buscar por categoria</a></div>
        <div class="menu-item"><a href="galleta2.php">Sus galletas</a></div>
    <div class="menu-item"><a href="nueva.php">Agregar mi galleta</a></div>
  </div>
  
  <center><h1>Publicaciones</h1>

  <h2>Agregar nueva publicación</h2>
  <form method="POST" action="">
    <label for="idga">Idga:</label><br>
    <input type="text" id="idga" name="idga" required><br>

    <label for="id">Id:</label><br>
    <input type="text" id="id" name="id" required><br>

    <label for="nombre_usuario">Nombre usuario:</label><br>
    <input type="text" id="nombre_usuario" name="nombre_usuario" required><br>

    <label for="titulo">Titulo:</label><br>
    <input type="text" id="titulo" name="titulo" required><br>

    <label for="categoria">Categoria:</label><br>
    <input type="text" id="categoria" name="categoria" value="galleta" readonly><br>

    <label for="imagen">Imagen:</label><br>
    <textarea id="imagen" name="imagen" required></textarea><br>

    <label for="contenido">Contenido:</label><br>
    <textarea id="contenido" name="contenido" required></textarea><br>

    <label for="fecha">Fecha:</label><br>
    <input type="date" id="fecha" name="fecha" required><br>

    <input type="submit" value="Agregar">
  </form></center>

  <div id="user-greeting">
    <?php if ($nombre_usuario) { ?>

    <?php } else { ?>
      <p class="login-message">Inicia sesión para agregar publicaciones.</p>
    <?php } ?>
  </div>

  <?php
  require_once 'conexion.php';

 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if ($nombre_usuario) {
      $idga = $_POST['idga'];
      $id = $_POST['id'];
      $nombre_usuario = $_POST['nombre_usuario'];
      $titulo = $_POST['titulo'];
      $categoria = $_POST['categoria'];
      $imagen = $_POST['imagen'];
      $contenido = $_POST['contenido'];
      
$contenido = str_replace("'", "", $contenido);
      $fecha = $_POST['fecha'];

      
      $existingIdgaQuery = "SELECT COUNT(*) AS count FROM galletas WHERE idga = '$idga'";
      $existingIdgaResult = $conn->query($existingIdgaQuery);
      $existingIdgaRow = $existingIdgaResult->fetch_assoc();
      $existingIdgaCount = $existingIdgaRow['count'];

      if ($existingIdgaCount > 0) {
        echo "El idga ya se encuentra registrado.";
      } else {
        
        $existingIdQuery = "SELECT COUNT(*) AS count FROM usua WHERE id = '$id' AND nombre_usuario = '$nombre_usuario'";
        $existingIdResult = $conn->query($existingIdQuery);
        $existingIdRow = $existingIdResult->fetch_assoc();
        $existingIdCount = $existingIdRow['count'];

        if ($existingIdCount > 0) {
          
          $insertQuery = "INSERT INTO galletas (idga, id, nombre_usuario, titulo, categoria, imagen, contenido, fecha) VALUES ('$idga', '$id', '$nombre_usuario', '$titulo', '$categoria', '$imagen', '$contenido', '$fecha')";
          $result = $conn->query($insertQuery);

          if ($result === TRUE) {
            echo "La publicación se agregó correctamente.";
          } else {
            echo "Error al agregar la publicación: " . $conn->error;
          }
        } else {
          echo "El ID ingresado no existe o no coincide con el nombre de usuario.";
        }
      }
    } else {
      echo "Debes iniciar sesión para agregar publicaciones.";
    }
  }

  
  $conn->close();
  ?>

</div>
</body>
<footer>
    <p>© 2023 Receteria Panes de pan. Todos los derechos reservados.</p>
  </footer>
</html>
