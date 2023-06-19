<?php
session_start();

if (isset($_GET['nombre_usuario'])) {
    // Guardar el nombre de usuario en la sesión
    $_SESSION['nombre_usuario'] = $_GET['nombre_usuario'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
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
    .post-container {
            display: flex;
            flex-wrap: wrap;
            background:#E89786;
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
<center><div id="logo-container">
 
<h1>Recetas panes de pan</h1><img src="cafe.gif" width="50" height="50" />
    <h1 id="slogan">&nbsp;&nbsp;&nbsp;El combo perfecto: panes y café para despertar tus sentidos</h1>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
</div></center>
  </header>
    <?php if (isset($_SESSION['nombre_usuario'])) { ?>
        <?php $nombre_usuario = $_SESSION['nombre_usuario']; ?>
        
    <?php } else { ?>
        <div id="user-greeting">
            <p class="login-message">Inicia sesión para agregar publicaciones.</p>
        </div>
    <?php } ?>

</div>

<div id="container">
    <div class="menu">
        <div class="menu-item"><a href="principal2.php">Inicio</a></div>
        
        <?php if (isset($_SESSION['nombre_usuario'])) { ?>
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
        <div class="menu-item"><a href="buspan.php">Buscar por categoria</a></div>
        <div class="menu-item"><a href="galleta2.php">Sus galletas</a></div>
        <div class="menu-item"><a href="nueva.php">Agregar mi galleta</a></div>
    </div>
    <center><h2>Búsqueda de Productos por Categoría</h2></center>
    <center><h3>Las categorías son: Panes y Café</h3>
    <form method="post" action="buscarpan2.php" style="display: inline-block;">
    <div class="input-container">
       
        <label for="categoria"></label>
        <input type="text" name="categoria" id="categoria" required>
        <button type="submit" style="vertical-align: middle;">
            <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg></center>
        </button>
    </div>
</form>
    <div class="post-container">
        <?php
        require_once 'conexion.php';

        
        $sql = "SELECT * FROM productos ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="post">';
                echo "<h2>" . $row['titulo'] . "</h2>";
                echo "<p>" . $row['categoria'] . "</p>";
                echo "<td><img src=" . $row["imagen"] . " height=" . "120px" . "width=" . "120px" . "/></td>";
                echo "<p>" . $row['contenido'] . "</p>";
                echo "<hr>";
                echo '</div>';
            }
        } else {
            echo "<p>No hay publicaciones para mostrar.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>


<footer>
    <p>© 2023 Receteria Panes de pan. Todos los derechos reservados.</p>
  </footer>
</html>
