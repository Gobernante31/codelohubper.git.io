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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios | CodeLoHubper</title>

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styleservicios.css">

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/navbar_footer_preload.css" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="./css/owl.css">

  <!-- FAVICON -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="64x64" />

  <!-- REMIXICONS -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- ICONSCOUT -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
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
  <?php echo navbar(); ?>

  <main>
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center banner_content">
            <div class="header-text">
              <h6>CodeLoHubper</h6>
              <h2>Ofrece o busca soluciones tecnológicas.</h2>
              <p>¡Tenemos una solucion para ti!, que estas buscando un problema a tu codigo, o con tu apartato
                tecnológico. <br>Ayuda a los demás o ayudate a ti mismo. <br>Seamos una sociedad, un equipo, seamos
                CodeLoHubper.</p>
            </div>

            <div class="main-button banner_bt">
              <a href="#">¡Ofrece tu servicio!</a>
            </div>

          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->



    <div>
  <div>
    <?php
    // Llamada a la función para obtener publicaciones
    $publicaciones = obtenerPublicaciones($conn);

    // Función para ordenar las publicaciones por puntaje (Score)
    usort($publicaciones, function ($a, $b) {
        return $b['Score'] - $a['Score'];
    });

    // Mostrar solo las 10 mejores publicaciones
    $top10Publicaciones = array_slice($publicaciones, 0, 10);
    ?>
  </div>

  <div class="categories-collections">
    <div class="row">
      <div class="collections">
        <div class="row">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Explora los mejores <em>servicios</em> en el mercado.</h2>
          </div>
        </div>
        <div class="owl-collection owl-carousel">
          <?php foreach ($top10Publicaciones as $publicacion) { ?>
            <div class="item">
              <img class="imagen_publicacion" src="<?php echo $publicacion['Imagen_publicacion']; ?>" alt="">
              <div class="down-content">
                <p>Servicio:</p>
                <h4><?php echo $publicacion['Titulo_publicacion']; ?></h4>

                <p>Categoría:</p>
                <h4><?php echo $publicacion['NombreCategoria']; ?></h4>

                <span class="collection">Valoración:<br>
                  <strong><?php echo $publicacion['Score']; ?></strong>
                </span>

                <span class="category">Fecha Publicacion:<br>
                  <strong><?php echo $publicacion['Fecha_Publicacion']; ?></strong>
                </span>

                <div class="main-button">
                  <!-- Agrega aquí el enlace hacia la página específica de la publicación -->
                  <a href="#">Explorar más</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>






    <div>
      <div>
        <?php
        // Llamada a la función para obtener publicaciones
        $publicaciones = obtenerPublicaciones($conn);
        ?>
      </div>


      <div class="categories-collections">
        <div class="row">
          <div class="collections">
            <div class="row">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h2>Explora los mejores <em>servicios</em> en el mercado.</h2>
              </div>
            </div>
            <div class="owl-collection owl-carousel">
              <?php foreach ($publicaciones as $publicacion) { ?>
                <div class="item">
                  <img class="imagen_publicacion" src="<?php echo $publicacion['Imagen_publicacion']; ?>" alt="">
                  <div class="down-content">
                    <p>Servicio:</p>
                    <h4><?php echo $publicacion['Titulo_publicacion']; ?></h4>

                    <p>Categoría:</p>
                    <h4><?php echo $publicacion['NombreCategoria']; ?></h4>

                    <span class="collection">Valoración:<br>
                      <strong><?php echo $publicacion['Score']; ?></strong>
                    </span>

                    <span class="category">Fecha Publicacion:<br>
                      <strong><?php echo $publicacion['Fecha_Publicacion']; ?></strong>
                    </span>

                    <div class="main-button">
                      <!-- Agrega aquí el enlace hacia la página específica de la publicación -->
                      <a href="#">Explorar más</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>


  <!-- FOOTER -->
  <?php echo footer(); ?>


  <!-- Java Script -->
  <script src="./js/script_perfil.js"></script>

  <script src="./js/isotope.min.js"></script>
  <script src="./js/owl-carousel.js"></script>
  <script src="./js/pre_loader.js"></script>

  <script src="./js/custom.js"></script>

</body>

</html>