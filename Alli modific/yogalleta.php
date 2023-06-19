<html>
<?php
session_start();

if (isset($_GET['nombre_usuario'])) {
   
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
</html>

<?php


if (isset($_GET['nombre_usuario'])) {

    $nombre_usuario = $_GET['nombre_usuario'];
  
  
    $_SESSION['nombre_usuario'] = $nombre_usuario;
}

if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];


    if (isset($_POST['id'])) {
        $id = $_POST['id'];

       
        $conn = mysqli_connect("localhost:3307", "root", "", "respaldo");

        
        $query = "SELECT nombre_usuario FROM usua WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            
            if ($nombre_usuario == $row['nombre_usuario']) {
                
                $query = "SELECT * FROM galletas WHERE id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<h2>" . $row['nombre_usuario'] . "</h2>";
                    echo "<h2>" . $row['titulo'] . "</h2>";
                    
                    echo "<p>" . $row['categoria'] . "</p>";
                    echo "<td><img src=" . $row["imagen"]." height="."120px"."width="."120px"."/></td>"; 
                    echo "<p>" . $row['contenido'] . "</p>";
                     echo "<p>Fecha: " . $row['fecha'] . "</p>";
                    echo "<hr>";
                    echo "<br>";

                    
                    
                }
            } else {
                echo "El nombre de usuario no coincide.";
            }
        } else {
            echo "El ID no existe en la tabla.";
        }

        mysqli_close($conn);
    }
} else {
    echo "<div id='user-greeting'>";
    echo "<p class='login-message'>Inicia sesión para agregar publicaciones.</p>";
    echo "</div>";
    
    $nombre_usuario = '';
}
?>

<html>
<p class="welcome-message">Tu usuario es: <?php echo $nombre_usuario; ?></p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="id">ID:</label>
    <input type="text" name="id" required><br><br>
    <input type="submit" value="agregar">
 
</form>
<footer>
    <p>© 2023 Receteria Panes de pan. Todos los derechos reservados.</p>
  </footer>
</html>

