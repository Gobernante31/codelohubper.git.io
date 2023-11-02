<?php
session_start();
if (empty($_SESSION['UserID'])) {
  header("Location: login.php");
}

require_once './php/controlador_editar_perfil.php';
require_once './php/controlador_perfil.php';
require_once './lib/funciones.php';
require_once './lib/footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perfil | CodeLoHubper</title>

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styleperfil.css" />

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/navbar_footer_preload.css">

  <!-- FAVICON -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="64x64" />

  <!-- REMIXICONS -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- ICONSCOUT -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

  <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="hidde">
  <!-- —————————— PRELOADER —————————— -->
  <div class="pre_loader" id="pre_loader">
    <div class="loader">
      <div class="head"></div>

      <div class="flames">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
      </div>

      <div class="eye"></div>
    </div>
  </div>
  <!-- —————————— FIN_PRELOADER —————————— -->



  <!-- ——————————————— HEADER ——————————————— -->
  <header class="header">
    <nav class="_nav container">
      <div class="nav_menu">

        <!-- ——————————————— NAV LIST ——————————————— -->
        <div class="nav_list">

          <!-- ——————————————— NAV ITEMS ——————————————— -->
          <div class="header-left">
            <nav>
              <ul>
                <li>
                  <a href="./home.php" class="nav_link">Inicio</a>
                </li>
                <li>
                  <a href="./nosotros.php" class="nav_link">Nosotros</a>
                </li>
                <li>
                  <a href="./servicios.php" class="nav_link">Servicios</a>
                </li>
                <li>
                  <a href="./clasificatoria.php" class="nav_link">Clasificatoria</a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="header-right">
            <div class="hamburger">
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>

          <!-- ——————————————— NAV lOGIN ——————————————— -->
          <div class="nav_login_menu">
            </a>
            <a href="./php/controlador_logout.php" class="nav_singup">Cerrar sesión</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- PRINCIPAL MAIN -->
  <section class="perfil-usuario">
    <div class="contenedor-perfil">
      <div class="portada-perfil">
        <div class="sombra"></div>
        <div class="avatar-perfil">
          <?php
          // Llama a la función obtenerImagenPerfil para obtener la URL de la imagen de perfil
          $fotoPerfil = fotoUsuario($userID, $conn);

          // Mostrar la imagen de perfil obtenida
          echo '<img src="' . $fotoPerfil . '" alt="Foto de perfil actual">';
          ?>

        </div>
        <div class="datos-perfil">
          <h4 class="titulo-usuario">
            <?php echo ucfirst($_SESSION['Username']) ?>
          </h4>
          <p class="presentacion">
            <?php echo substr($presentacion, 0, 150); ?>
          </p>
          <ul class="lista-perfil">
            <li>
              <?php echo $score_user; ?> Puntos
            </li>
            <li>0 Publicaciones</li>
            <li>Rango
              <?php echo $nombreRango;
              ?>
            </li>
          </ul>
        </div>
      </div>
      <div class="menu-perfil">
        <ul>
          <li><a href="./editarperfil.php" title=""><i class="icono-perfil fas fa-wrench"></i> Editar Perfil</a></li>
          <li><a href="#" title=""><i class="icono-perfil ri-notification-fill"></i> Notificaciones</a></li>
        </ul>
      </div>
    </div>
  </section>

  <section>
    <div class="publicacion_container">
      <form action="" method="post" enctype="multipart/form-data" class="publicacion_form">
        <!-- Sección para el título y descripción del servicio -->
        <div class="section_publicacion">

          <div class="titulo_publicacion">
            <label for="titulo">Titulo del Servicio:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título del Servicio:" required>
          </div>

          <div class="descripcion_publicacion">
            <label for="descripcion">Descripción del servicio:</label>
            <textarea id="descripcion" name="descripcion" rows="4" placeholder="Descripción del Servicio:"
              required></textarea>
          </div>

          <!-- Sección para seleccionar categoría -->
          <div class="categoria_publicacion">
            <label for="categoria">Selecciona una categoría:</label>
            <select id="categoria" name="categoria" class="categoria">
              <?php
                $categorias = obtenerCategorias($conn);
                foreach ($categorias as $categoria) {
                  echo '<option value="' . $categoria['CategoriaID'] . '">' . $categoria['NombreCategoria'] . '</option>';
                }
              ?>
            </select>
          </div>

          <!-- Sección para subir imagen y botón de publicación -->
          <div class="imagen_publicacion">
            <!-- Sección para subir imagen con un botón mejorado -->
            <div class="section_public_img">
              <label for="imagen" class="publicacion_subir_img">
                <span class="ri-image-line"></span> 
                <!-- Icono de imagen si es necesario -->
                Subir Imagen
                <input type="file" id="imagen" name="imagen" accept="image/*" class="input_img publicacion_subir_img"
                  hidden required>
              </label>
            </div>
          </div>


          <!-- Sección para el botón de publicación -->
          <div class="boton_publicacion">
            <button type="submit" class="publicacion_button icono-perfil fas fa-bullhorn"> Publicar</button>
          </div>
        </div>

        <!-- Sección para mostrar resultados -->
        <div class="section_resultados">
          <h4>
            <?php
            require_once './php/controlador_publicaciones.php';
            ?>
          </h4>
        </div>
      </form>
    </div>
  </section>



  <footer style="position: relative; bottom: 0; width: 100%; margin-top: 20rem;">
    <?php echo footer(); ?>
  </footer>
  <!-- FOOTER -->



  <script src="./js/script_message.js"></script>
  <script src="./js/script_biografia.js"></script>
  <script src="./js/script_perfil.js"></script>

  <script src="./js/isotope.min.js"></script>
  <script src="./js/pre_loader.js"></script>
</body>

</html>