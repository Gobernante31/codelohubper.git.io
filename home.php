<?php
session_start();

if (empty($_SESSION['UserID'])) {
  header("Location: login.php");
}

require_once './lib/navbar-lib.php';
require_once './lib/footer.php';
require_once './lib/funciones.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio | CodeLoHubper</title>

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/stylehome.css" />
  <link rel="stylesheet" href="./css/navbar_footer_preload.css">

  <!-- FAVICON -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="64x64" />

  <!-- REMIXICONS -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- ICONSCOUT -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body class="hidden">
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
  <?php echo navbar(); ?>


  <!-- ——————————————— HOME ——————————————— -->
  <div class="home">
    <div class="home_container">
      <div class="home_content">

        <!-- ——————————————— HOME DESCRIPTION ——————————————— -->
        <div class="home_text">
          <h3>¡Bienvenido,
            <?php echo ucfirst($_SESSION['Username']); ?>!
          </h3>
          <br>
          <p>Recuerda que toda la página es intuitiva. Si tienes alguna <a target="_blank" href="./dudas.php"
              class="a_home">duda</a>
            no dudes
            en preguntar!</p>
        </div>

        <!-- ——————————————— HOME IMG ——————————————— -->
        <div class="home_img">
          <img src="./img/3d-business-guy-with-backpack-and-laptop.png" alt="home image">
        </div>
      </div>
    </div>
  </div>

  <!-- ——————————————— MAIN ——————————————— -->
  <main class="">

    <!-- Nueva sección para mostrar los últimos usuarios registrados -->
    <section class="latest container section">
      <div class="shape__small"></div>

      <div class="obj_title">
        <h1>Ultimos usuarios registrados</h1>
        <p>¿Quieres ver quienes fueron los ultimos usuarios registrados?</p>
      </div>
      <div class="latest-users-container">
        <?php
        // Llama a la función para obtener los datos de los últimos usuarios ordenados por fecha de registro
        $ultimosUsuarios = perfilUsuario(6);

        foreach ($ultimosUsuarios as $usuario) {
          // Accede a los datos de cada usuario
          $nombre = $usuario['Username'];
          $imagenPerfil = $usuario['Foto_perfil'];
          $fecharegistro = $usuario['RegistrationDate'];

          echo '<div class="user-card">';
          echo '<div class="nombre">';
          echo '<h4>' . ucfirst($nombre) . '</h4>';
          echo '</div>';
          echo '<div class="foto_perfi">';
          if (!empty($imagenPerfil)) {
            echo '<img src="' . $imagenPerfil . '" alt="Foto actual">';
          } else {
            echo '<img src="img/fotos_perfil/user_default.png" alt="Foto por defecto">';
          }
          echo '<div class="fecha-registro">';
          echo '<p>' . ($fecharegistro) . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </section>


    <!-- Sección de Información
    <section class="info section container">
      <div class="shape__small"></div>

      <div class="info_title">
        <h1>Lenguajes que utilizamos</h1>
        <p>Utilizamos una variedad de lenguajes, incluyendo PHP y Javascript, cada uno con su propósito específico.</p>
      </div>
      <div class="informacion">
        <div class="nosotros_section">
          <div class="text_section">
          </div>
          <p>Imagina una página web sin CSS; sería plana y carecería de estilo. También, imagina una página sin PHP y
            sus derivados; no podríamos conectarnos a bases de datos ni aprovechar las funcionalidades que ofrece.
            Gracias a los lenguajes que mencionamos a continuación, hemos logrado desarrollar este proyecto. Si nosotros
            pudimos, ¿por qué tú no?</p>
        </div>
      </div>

      <div class="redes_section">
        <div class="redes_container">

          <div class="redes_sociales css">
            <a href="#" class="enlace-redes">
              <img src="./img/css_icon.png" alt="ins">CSS
              <i class="ri-external-link-line"></i>
            </a>
            <div class="redes_text">
              <p>CSS es en cierta parte la mas importante de todo esto ya que gracias a esto logramos ver todo esto dde
                forma estetica.</p>
            </div>
          </div>

          <div class="redes_sociales javascript">
            <a href="#" class="enlace-redes">
              <img src="./img/javascript_icon.png" alt="yt">Javascript
              <i class="ri-external-link-line"></i>
            </a>
            <div class="redes_text">
              <p>Javascript lo usamos para las animaciones y para Scripts necesarios para el funcionamiento.</p>
            </div>
          </div>

          <div class="redes_sociales html5">
            <a href="#" class="enlace-redes">
              <img src="./img/html5_icon.png" alt="fc">HTML:5
              <i class="ri-external-link-line"></i>
            </a>
            <div class="redes_text">
              <p>El HTML usado para darle el formato a la pagina y que tenga todo el contenido necesario.</p>
            </div>
          </div>

          <div class="redes_sociales php">
            <a href="#" class="enlace-redes">
              <img src="./img/php_icon.png" alt="yt">PHP
              <i class="ri-external-link-line"></i>
            </a>
            <div class="redes_text">
              <p>Usando PHP logramos conectar base de datos y realizar sus respectivas configuraciones.</p>
            </div>
          </div>
        </div>
    </section>


    <section class="obj container section">
      <div class="shape__small"></div>

      <div class="obj_title">
        <h1>Objetivo</h1>
        <p>En CodeLoHubper, tenemos un objetivo muy claro.</p>
      </div>
      <div class="info_section informacion ">
        <div class="objetivos_section">
          <div class="text_section">
            <p>En CodeLoHubper, nuestro objetivo es proporcionar una plataforma líder que conecta a programadores y
              desarrolladores de software de todo el mundo. Nos esforzamos por simplificar el proceso de desarrollo de
              software y promover la colaboración en la comunidad de programadores. ¡Únete a nosotros y sé parte de esta
              experiencia única!</p>

          </div>
        </div>
      </div>
    </section>



    <section class="contac container section">
      <div class="shape__small"></div>


      <div class="contac_title">
        <h1>Contacto</h1>
        <p>¡Tenemos una gran variedad de redes sociales con contenido!</p>
      </div>
      <div class="contacto_section contacto">
        <div class="text_section">
        </div>
        <div class="contacto_content">
          <p>¿Tienes alguna pregunta o comentario?</p>
          <p>Contáctanos en <a href="mailto:codelohubper@hotmail.com" class="correo">codelohubper@hotmail.com</a>.</p>
          <p>Síguenos en las redes sociales para mantenerte actualizado:</p>
        </div>
      </div>
    </section>


    <section class="redes container section">
      <div class="shape__small"></div>


      <div class="redes_title">
        <h1>Comunidad</h1>
        <p>¡Tenemos una gran variedad de redes sociales con contenido!</p>
      </div>

      <div class="redes_section">
        <div class="redes_container">
          <div class="redes_sociales instagram">
            <a href="#" class="enlace-redes">
              <img src="./img/instagram.png" alt="ins">Instagram
              <i class="ri-external-link-line"></i>
            </a>
            <div class="redes_text">
              <p>¡Siguenos esn instagram!<br>Y mira algunos de nustros posts </p>
            </div>
          </div>

          <div class="redes_sociales youtube">
            <a href="#" class="enlace-redes">
              <img src="./img/youtube.png" alt="yt">YouTube
              <i class="ri-external-link-line"></i>
            </a>
            <div class="redes_text">
              <p>¡Siguenos en instagram!<br>Asi podras ver novedades y guias</p>
            </div>
          </div>

          <div class="redes_sociales facebook">
            <a href="#" class="enlace-redes">
              <img src="./img/facebook.png" alt="fc">Facebook
              <i class="ri-external-link-line"></i>
            </a>
            <div class="redes_text">
              <p>¡Siguenos en Facebook!<br>Tendras los primeros chismes </p>
            </div>
          </div>
        </div>
      </div>
    </section> -->
  </main>

  <!-- FOOTER -->
  <?php echo footer(); ?>


  <!-- Java Script -->
  <script src="./js/script_perfil.js"></script>
  <script src="./js/script_password.js"></script>
  <script src="./js/script_message.js"></script>


  <script src="./js/isotope.min.js"></script>
  <script src="./js/owl-carousel.js"></script>
  <script src="./js/pre_loader.js"></script>
  <script src="./js/custom.js"></script>

</body>

</html>