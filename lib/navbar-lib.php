<?php
function navbar()
{

  ?>
  <!-- ——————————————— HEADER ——————————————— -->
  <header class="header">
    <nav class="_nav container">
      <div class="nav_menu">

        <!-- ——————————————— NAV LIST ——————————————— -->
        <div class="nav_list">

          <!-- ——————————————— NAV LOGO ——————————————— -->
          <a href="" class="nav_logo">
            <img src="./img/logo.png" alt="nav logo">
          </a>
          <div class="nombre_usuario">
            <?php echo ucfirst($_SESSION['Username']) ?>
          </div>

          <!-- Agrega el botón de radio oculto y el label correspondiente para controlar el menú desplegable -->
          <input type="radio" id="menu-toggle" hidden>
          <label for="menu-toggle" class="perfil-menu-label"></label>

          <div class="perfil-menu" id="menu-content">
            <i class="uil uil-angle-down"></i>
            <div class="menu-content">
              <a href="./perfil.php" class="nav_login">
                <i class="uil uil-user user"></i>
                Perfil
              </a>
              <a href="./php/controlador_logout.php" class="nav_singup">Cerrar sesión</a>
            </div>
          </div>

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

        </div>
      </div>
    </nav>
  </header>

  <?php

}
?>