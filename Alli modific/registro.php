<!DOCTYPE html>
<html>
<head>
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
    <h1>Recetas panes de pan</h1><img src="cafe.gif" width="50" height="50" />
    <h1 id="slogan">&nbsp;&nbsp;&nbsp;El combo perfecto: panes y café para despertar tus sentidos</h1>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
  </header>
    <div id="container">
    <div class="menu">
    <div class="menu-item"><a href="principal.php">Inicio</a></div>
    <div class="menu-item"><a href="registro.php">Registrarse</a></div>
    <div class="menu-item"><a href="prue1.html">Iniciar sesión</a></div>
    
    <div class="menu-item"><a href="buscarcategoria.html">Buscar por categoria</a></div>
    <div class="menu-item"><a href="galleta.php">Sus galletas</a></div>
  </div>

        <?php
        session_start();
        require_once 'conexion.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $nombre_usuario = $_POST['nombre_usuario'];
            $contrasena = md5($_POST['contrasena']); 

            
            $sql = "SELECT id, nombre_usuario FROM usua WHERE nombre_usuario = '$nombre_usuario' OR id = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['nombre_usuario'] == $nombre_usuario) {
                    echo "El nombre de usuario ya está registrado. Por favor, elige otro.";
                } elseif ($row['id'] == $id) {
                    echo "El ID ya está registrado. Por favor, elige otro.";
                }
            } else {
                
                $sql = "INSERT INTO usua (id, nombre_usuario, contrasena) VALUES ('$id', '$nombre_usuario', '$contrasena')";
                if ($conn->query($sql) === TRUE) {
                    ?>
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Registro de Usuario</title>
                        
                       
                    </head>
                    <body>
                        <div class="container">
                            <div class="card">
                                <h2>Registro de Usuario</h2>
                                <p>Registro exitoso. ¡Ahora puedes iniciar sesión!</p>
                                <a class="singup" href="prue1.html">Iniciar sesión</a>
                            </div>
                        </div>
                    </body>
                    </html>
                    <?php
                } else {
                    echo "Error en el registro: " . $conn->error;
                }
            }
        }
        ?>

        <center><div class="form-box">
            <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <span class="title">Registro de Usuario</span>
                <span class="subtitle">Crea una cuenta gratuita con tu correo electrónico.</span>
                <div class="form-container">
                    <input type="text" class="input" name="id" placeholder="ID" required>
                    <input type="text" class="input" name="nombre_usuario" placeholder="Nombre de Usuario" required>
                    <input type="password" class="input" name="contrasena" placeholder="Contraseña" required>
                </div>
                <button>Registrarse</button>
            </form>
        </div>

        <div class="form-section">
            <p>¿Ya tienes una cuenta? <a href="prue1.html">Iniciar sesión</a></p>
        </div>
    </div></center>
</body>
</html>
<html>
<footer>
    <p>© 2023 Receteria Panes de pan. Todos los derechos reservados.</p>
  </footer>
</html>
