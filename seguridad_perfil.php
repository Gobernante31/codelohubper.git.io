<?php
session_start();
include './lib/navbar-lib.php';

if (empty($_SESSION['UserID'])) {
  header("Location: login.php");
}

require './php/controlador_perfil.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Perfil | CodeLoHubper</title>

  <!--——————————————— CSS PRINCIPAL ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" href="./css/styleseguridadperfil.css" />
  <link rel="stylesheet" href="./css/navbar_footer_preload.css">

  <!-- FAVICON -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="64x64" />

  <!-- REMIXICONS -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- ICONSCOUT -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>

<main class="main container perfil-usuario">
  <section class="form_container">
    <div class="login_form">
      <form action="" method="post" enctype="multipart/form-data">
        <div>
          <h2>Editar Perfil</h2>
        </div>

        <?php
          // Incluye el archivo de controlador_editar_perfil.php aquí
          include_once './php/controlador_editar_perfil.php';
          ?>

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

              <!-- CHANGE PROFILE PICTURE BUTTON -->
              <label for="fotoperfil" class="cambiar-foto">
                <p>Cambiar foto de perfil</p>
                <i class="ri-camera-line"></i>
              </label>
              <!-- INPUT FOR PROFILE PICTURE -->
              <input type="file" id="fotoperfil" name="fotoperfil" accept="image/*" style="display: none;">
            </div>
          </div>
        </div>


        <!-- USERNAME INPUT -->
        <div class="input_box">
          <label for="username">Nuevo nombre de usuario</label>
          <input type="text" name="username" placeholder="Nuevo usuario" id="username" />
          <i class="uil uil-user email"></i>
        </div>

        <!-- EMAIL INPUT -->
        <div class="input_box">
          <label for="email">Correo electrónico actual</label>
          <input type="email" name="email" placeholder="Correo electrónico" />
          <i class="uil uil-envelope-alt email"></i>
        </div>

        <!-- NEW EMAIL INPUT -->
        <div class="input_box">
          <label for="newEmail">Nuevo correo electrónico</label>
          <input type="email" name="newEmail" placeholder="Nuevo correo electrónico" />
          <i class="uil uil-envelope-alt email"></i>
        </div>

        <!-- PASSWORD INPUT -->
        <div class="input_box">
          <label for="password">Contraseña actual</label>
          <input type="password" name="password" placeholder="Contraseña actual" />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>

        <!-- NEW PASSWORD INPUT -->
        <div class="input_box">
          <label for="newPassword">Nueva contraseña</label>
          <input type="password" name="newPassword" placeholder="Nueva contraseña" />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>

        <!-- BIOGRAPHY TEXTAREA -->
        <div class="input_box presentacion">
          <label for="presentacion">Información del perfil</label>
          <textarea class="textarea" placeholder="Presentacion del perfil" id="input" name="presentacion"
            rows="4"></textarea>
          <i class="ri-information-line informacion"></i>
          <div class="counter">0 / 150</div>
        </div>

        <!-- SAVE CHANGES BUTTON -->
        <div class="button-gc">
          <button type="submit">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </section>
</main>

<footer>
  <p>&copy; 2023 CodeLoHubper. Todos los derechos reservados.</p>
</footer>


<script src="./js/script_perfil.js"></script>
<script src="./js/script_password.js"></script>
<script src="./js/script_message.js"></script>
</body>

</html>