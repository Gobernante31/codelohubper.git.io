<?php 
require_once './lib/footer.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacto | CodeLoHubper</title>

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styledudas.css" />

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/navbar_footer_preload.css" />

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


  <!-- ——————————————— MAIN ——————————————— -->
  <main class="main contact_section">

    <!-- ——————————————— HOME ——————————————— -->
    <div class="container">
      <div class="box-info">
          <h1>CONTÁCTATE CON NOSOTROS</h1>
          <div class="data">
              <p><i class="ri-phone-fill"></i> +57 319 585 5650</p>
              <p><i class="ri-mail-fill"></i> CodeLoHubper@gmail.com</p>
              <p><i class="ri-mail-fill"></i> CodeLoHubper@hotmail.com</p>
          </div>
          <div class="links">
              <a href="#"><i class="ri-facebook-fill"></i></a>
              <a href="#"><i class="ri-instagram-line"></i></a>
              <a href="#"><i class="ri-twitter-fill"></i></a>
              <a href="#"><i class="ri-youtube-fill"></i></a>
          </div>
      </div>
      <form>
          <div class="input-box">
              <input type="text" placeholder="Nombre y apellido" required>
              <i class="ri-user-fill"></i>
          </div>
          <div class="input-box">
              <input type="email" required placeholder="Correo electrónico">
              <i class="ri-mail-fill"></i>
          </div>
          <div class="input-box">
              <input type="text" placeholder="Asunto">
              <i class="ri-edit-fill"></i>
          </div>
          <div class="input-box">
              <textarea placeholder="Escribe tu mensaje..."></textarea>
          </div>
          <button type="submit">Enviar mensaje</button>
      </form>
  </div>
  </main>

  <!-- FOOTER -->
  <?php echo footer(); ?>

  <script src="./js/script_perfil.js"></script>
  <script src="./js/script_password.js"></script>
  <script src="./js/script_message.js"></script>

  <script src="./js/isotope.min.js"></script>
  <script src="./js/pre_loader.js"></script>
</body>

</html>