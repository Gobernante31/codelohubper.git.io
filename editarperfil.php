<?php
session_start();

if (empty($_SESSION['UserID'])) {
  header("Location: login.php");
}

require_once './lib/navbar-lib.php';
require_once './lib/footer.php';
require_once './php/controlador_perfil.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Perfil | CodeLoHubper</title>

  <!--——————————————— CSS PRINCIPAL ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" href="./css/styleditarperfil.css" />
  <link rel="stylesheet" href="./css/navbar_footer_preload.css">
  <link href="./css/boostrap.css" rel="stylesheet">

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

  <!-- MAIN CONTENT -->






  <div class="container-fluid">


    <!-- Sidebar Start -->
    <div class="sidebar">
      <nav class="navbar navbar-dark">

        <div class="navbar-nav">


          <div class="perfil_avatar">
            <div class="estado_perfil">

            <?php


              // Llama a la función obtenerImagenPerfil para obtener la URL de la imagen de perfil
              $fotoPerfil = fotoUsuario($userID, $conn);

              // Mostrar la imagen de perfil obtenida
              
              echo '<img class="rounded-circle" style="width: 40px; height: 40px;" src="' . $fotoPerfil . '" alt="Foto de perfil actual">';
              ?>



              <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
              </div>
            </div>
            <div class="text_namebar">
              <h4>
                <?php echo ucfirst($_SESSION['Username']) ?>
              </h4>
              <p>Admin</p>
            </div>
          </div>
          <hr><br>


          <!-- perfil -->
          <a href="./perfil.php" class="nav-item nav-link">
            <i class="ri-user-fill"></i>Perfil</a>

          <!-- Editar perfil -->
          <a href="./editarperfil.php" class="nav-item nav-link">
            <i class="ri-settings-4-line"></i>Editar Perfil</a>


          <!-- seguridad perfil -->
          <a href="./seguridad_perfil.php" class="nav-item nav-link">
            <i class="ri-settings-4-line"></i>Seguridad</a>
        </div>
      </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">

      <?php
      require './php/controlador_editar_perfil.php';
      ?>
      <!-- Form Start -->
      <form action="" method="post" class="container_fluid">
        <div class="row">




          <div class="container_box">

            <div class="section_box_edit">
              <h6 class="">Foto de Perfil</h6>

              <div class="img_perfil_content">



                <label for="fotoperfil" class="cambiar-foto">

                  <!-- CHANGE PROFILE PICTURE BUTTON -->
                  <?php
                  // Llama a la función obtenerImagenPerfil para obtener la URL de la imagen de perfil
                  $fotoPerfil = fotoUsuario($userID, $conn);

                  // Mostrar la imagen de perfil obtenida
                  echo '<img class="img_perfil" src="' . $fotoPerfil . '" alt="Foto de perfil actual">';
                  ?>
              </div>

              <div class="text_fotoperfil">JPG o PNG no más de 5 MB</div>




              <div class="selecionar_img">
                </label>

                <!-- INPUT FOR PROFILE PICTURE -->
                <input class="form-control form-control-sm" type="file" id="fotoperfil" name="fotoperfil"
                  accept="image/*">
              </div>


            </div>
          </div>




          <div class="container_box">
            <div class="section_box_edit">
              <h6>Editar Perfil</h6>




              <!-- USERNAME INPUT -->
              <div class="input_box">
                <i class="ri-user-fill"></i>
                <label for="username">Nuevo usuario</label>
                <input type="text" name="username" placeholder="Nuevo usuario" id="username" />
              </div>



              <div class="input_box">
                <i class="ri-user-heart-fill"></i>
                <label for="gender">Genero</label>
                <select class="form-select" id="gender">
                  <option selected>No especificado</option>
                  <option value="1">Hombre</option>
                  <option value="2">Mujer</option>
                </select>
              </div>


              <!-- BIOGRAPHY TEXTAREA -->
              <div class="input_box presentacion">
                <i class="ri-information-line informacion"></i>
                <label for="presentacion">Información del perfil</label>
                <textarea class="textarea" placeholder="Presentacion del perfil" id="input" name="presentacion"
                  rows="4"></textarea>
                <div class="counter">0 / 150</div>
              </div>


              <!-- SAVE CHANGES BUTTON -->
              <div class="button-gc">
                <button type="submit">Guardar Cambios</button>
              </div>

            </div>
          </div>







        </div>
      </form>
      <!-- Form End -->


      <!-- Footer Start -->
      <div class="footer container-fluid">
        <div class="row">
          <!-- FOOTER -->
          <?php echo footer(); ?>

        </div>
      </div>
      <!-- Footer End -->

    </div>
    <!-- Content End -->
  </div>









  <script src="./js/script_perfil.js"></script>
  <script src="./js/script_password.js"></script>
  <script src="./js/script_message.js"></script>

  <script src="./js/isotope.min.js"></script>
  <script src="./js/pre_loader.js"></script>

</body>

</html>