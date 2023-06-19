

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

        #logo-container {
            display: flex;
            align-items: center;
        }

        #logo-image {
            margin-right: 10px;
        }

        #slogan {
            margin-right: 10px;
        }

        #user-greeting {
            text-align: right;
        }
        #user-greeting {
    background-color: #f5f5f5;
    padding: 10px;
}

.welcome-message {
    font-size: 18px;
    margin-bottom: 10px;
}

.account-summary {
    font-weight: bold;
    cursor: pointer;
}

.account-options {
    border-collapse: collapse;
    margin-top: 10px;
}

.account-options td {
    padding: 5px;
    border: 1px solid #ccc;
}

.account-options a {
    text-decoration: none;
}

.login-message {
    font-size: 14px;
    color: red;
    margin-bottom: 10px;
}

    </style>
</head>
<body>
    
   
<header>
    <h1>Recetas panes de pan</h1><img src="cafe.gif" width="50" height="50" />
    <h1 id="slogan">&nbsp;&nbsp;&nbsp;El combo perfecto: panes y café para despertar tus sentidos</h1>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
  </header>
   
        </div>
  

</div>

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

        <center><h3>Publicaciones Recientes</h3></center>

        <div class="post-container">
            <?php
            require_once 'conexion.php';

           
            $sql = "SELECT * FROM galletas ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    echo "<h2>" . $row['nombre_usuario'] . "</h2>";
                echo "<h2>" . $row['titulo'] . "</h2>";
                
                echo "<p>" . $row['categoria'] . "</p>";
                echo "<td><img src=" . $row["imagen"]." height="."120px"."width="."120px"."/></td>"; 
                echo "<p>" . $row['contenido'] . "</p>";
                 echo "<p>Fecha: " . $row['fecha'] . "</p>";
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
</body>
</html>
<html>
<footer>
    <p>© 2023 Receteria Panes de pan. Todos los derechos reservados.</p>
  </footer>
</html>
