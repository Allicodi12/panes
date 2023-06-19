<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styl.css">
    <style>
       body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
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

       
        .form-box {
            max-width: 300px;
            background: #f1f7fe;
            overflow: hidden;
            border-radius: 16px;
            color: #010101;
        }

        .form {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 32px 24px 24px;
            gap: 16px;
            text-align: center;
        }

        .form-container {
            overflow: hidden;
            border-radius: 8px;
            background-color: #fff;
            margin: 1rem 0 .5rem;
            width: 100%;
        }

        .input {
            background: none;
            border: 0;
            outline: 0;
            height: 40px;
            width: 100%;
            border-bottom: 1px solid #eee;
            font-size: .9rem;
            padding: 8px 15px;
        }

        .form-section {
            padding: 16px;
            font-size: .85rem;
            background-color: #e0ecfb;
            box-shadow: rgb(0 0 0 / 8%) 0 -1px;
        }

        .form-section a {
            font-weight: bold;
            color: #0066ff;
            transition: color .3s ease;
        }

        .form-section a:hover {
            color: #005ce6;
            text-decoration: underline;
        }

        .form button {
            background-color: #0066ff;
            color: #fff;
            border: 0;
            border-radius: 24px;
            padding: 10px 16px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color .3s ease;
        }

        .form button:hover {
            background-color: #005ce6;
        }
    </style>
</head>
<body>
    <div id="logo-container">
    <img src="cafe.gif" width="50" height="50" />
    <h1 id="slogan">Panes de panes &nbsp;&nbsp;&nbsp;El combo perfecto: panes y café para despertar tus sentidos</h1>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
    </div>

    <div id="container">
    <div class="menu">
    <div class="menu-item"><a href="principal.php">Inicio</a></div>
    <div class="menu-item"><a href="registro.php">Registrarse</a></div>
    <div class="menu-item"><a href="prue1.html">Iniciar sesión</a></div>
    
    <div class="menu-item"><a href="buscarcategoria.html">Panes</a></div>
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
                        <style>
                            .container {
                                max-width: 400px;
                                margin: 0 auto;
                                padding: 20px;
                                text-align: center;
                            }

                            .card {
                                background-color: #f1f7fe;
                                padding: 20px;
                                border-radius: 8px;
                            }

                            .card h2 {
                                margin-bottom: 10px;
                                color: #010101;
                            }

                            .card p {
                                margin-bottom: 20px;
                                color: #666;
                            }

                            .singup {
                                display: inline-block;
                                background-color: #0066ff;
                                color: #fff;
                                border: 0;
                                border-radius: 24px;
                                padding: 10px 16px;
                                font-size: 1rem;
                                font-weight: 600;
                                text-decoration: none;
                                transition: background-color .3s ease;
                            }

                            .singup:hover {
                                background-color: #005ce6;
                            }
                        </style>
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

        <div class="form-box">
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
    </div>
</body>
</html>
