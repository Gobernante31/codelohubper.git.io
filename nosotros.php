<?php
session_start();

if (empty($_SESSION['UserID'])) {
  header("Location: login.php");
}

require_once './lib/navbar-lib.php';
require_once './lib/footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nosotros | CodeLoHubper</title>

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/stylenosotros.css" />

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />
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

  <!-- ——————————————— MAIN ——————————————— -->
  <main>
    <section class="team">
      <div class="center">
        <!-- contenido del menu -->
        <div class="nosotros_title">
          <h2>
            Nuestro grupo
          </h2>
          <p>
            Somos un equipo de 3 personas encargadas de desarrollar este magnifico proyecto.
            <br>
            Cada uno con habilidades en distintos lenguajes de programación.
          </p>
        </div>
      </div>

      <div class="team-content">
        <div class="box">
          <img src="./img/Emmanuel_Calle.jpg">
          <h3>Emmanuel Calle</h3>
          <h5>CEO</h5>
          <div class="icons">
            <a href="#"><i class="ri-twitter-fill"></i></a>
            <a href="#"><i class="ri-facebook-box-fill"></i></a>
            <a href="https://www.instagram.com/emmanuelc_31/"><i class="ri-instagram-fill"></i></a>
          </div>
        </div>

        <div class="box">
          <img src="./img/Cristia_Gaviria.jpg">
          <h3>Cristian David</h3>
          <h5>CEO</h5>
          <div class="icons">
            <a href="#"><i class="ri-twitter-fill"></i></a>
            <a href="#"><i class="ri-facebook-box-fill"></i></a>
            <a href="https://www.instagram.com/cristian_d_g_o/"><i class="ri-instagram-fill"></i></a>
          </div>
        </div>

        <div class="box">
          <img src="./img/Jacobo_Herrera.jpg">
          <h3>Jacobo Herrera</h3>
          <h5>CEO</h5>
          <div class="icons">
            <a href="#"><i class="ri-twitter-fill"></i></a>
            <a href="#"><i class="ri-facebook-box-fill"></i></a>
            <a href="https://www.instagram.com/jeycko_h_g/"><i class="ri-instagram-fill"></i></a>
          </div>
        </div>

      </div>
    </section>


  <!-- FOOTER -->
  <?php echo footer(); ?>

    <script src="./js/script_perfil.js"></script>
    <script src="./js/script_password.js"></script>

    <script src="./js/isotope.min.js"></script>
    <script src="./js/pre_loader.js"></script>

</body>

</html>