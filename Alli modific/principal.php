<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Recetas</title>
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
    <h1>Recetas panes de pan</h1><img src="cafe.gif" width="50" height="50" />
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

  <div class="container">
  <br>
  <center><img src="cafee.png" width="300" height="300" /></center>
    <br><br><br><br>
    <section class="section">
      <center><h2 class="section-title">¡Bienvenidos a nuestro sitio de recetas!</h2></center>
      <p class="section-content">
¡Bienvenido al mundo del pan y el café! Nos complace presentarte nuestro sitio web, un paraíso virtual lleno de deliciosas recetas de panes y café. Aquí, encontrarás una amplia variedad de recetas, desde panes artesanales hasta panes sin gluten, acompañados de la perfecta taza de café para realzar los sabores.

Pero eso no es todo. ¡También invitamos a nuestros usuarios a compartir sus creaciones de galletas! Queremos que este espacio sea un punto de encuentro para todos los amantes de la repostería, donde puedas encontrar inspiración y compartir tus mejores recetas con una comunidad apasionada.

Explora nuestras secciones y sumérgete en el maravilloso mundo de la panadería. Desde los panes clásicos hasta las creaciones más innovadoras, estamos aquí para ayudarte a descubrir el placer de hornear. Además, aprende a maridar cada pan con el café perfecto, convirtiendo cada mordisco en una experiencia inolvidable.

¡No esperes más! Sumérgete en nuestras recetas, inspírate con las creaciones de otros usuarios y comparte tus propias delicias. En este espacio, todos somos panaderos aficionados y aficionadas, dispuestos a aprender y compartir nuestra pasión por el pan y las galletas.</p>
    </section>
    
    <section class="section">
     <center> <h2 class="section-title">Agregar tus creaciones</h2></center>
      <p class="section-content">¡Bienvenido(a) a nuestro encantador rincón de recetas de panes y café! Aquí, te invitamos a explorar un mundo lleno de sabores y aromas irresistibles. Pero antes de sumergirte por completo, te pedimos que inicies sesión para poder disfrutar al máximo de todas las maravillas que tenemos para ofrecerte.

Al iniciar sesión, tendrás la oportunidad de compartir tus hermosas creaciones de galletas con nuestra comunidad de amantes de la panadería. Queremos que este espacio sea un lugar donde puedas mostrar tus habilidades culinarias y recibir el reconocimiento que mereces por tus exquisitas galletas caseras.

Así que, ¿qué esperas? Crea una cuenta, inicia sesión y descubre un mundo de posibilidades culinarias en nuestro sitio web. Estamos emocionados de ver tus creaciones únicas y deliciosas, y de compartir contigo la pasión por el pan, el café y las galletas caseras.</p>
    </section>
    
    

    
    <?php if (isset($_SESSION['nombre_usuario'])) { ?>
        <p>¡Hola, <?php echo $_SESSION['nombre_usuario']; ?>!</p>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    <?php } else { ?>
       
    <?php } ?>

    <center><h3>Publicaciones Recientes</h3></center>

    <div class="post-container">
        <?php
        require_once 'conexion.php';

      
        $sql = "SELECT * FROM productos ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="post">';
               
                echo "<center><h4>" . $row['titulo'] . "</h4></center>";
                
                echo "<center><p>Categoria: " . $row['categoria'] . "</p></center>";
                echo "<center><td><img src=" . $row["imagen"] . " height=" . "120px" . "width=" . "120px" . "/></td></center>";
                echo "<cetner><p>" . $row['contenido'] . "</p></center>";
                echo "<hr>";
                echo '</div>';
            }
        } else {
            echo "<p>No hay publicaciones para mostrar.</p>";
        }

        $conn->close();
        ?>
      </form>
    </section>
  </div>

  <footer>
    <p>© 2023 Receteria Panes de pan. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
