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
  <title>Clasificatoria | CodeLoHubper</title>

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/navbar_footer_preload.css">

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" type="text/css" href="./css/styleclasificatoria.css" />

  <!-- FAVICON -->
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" sizes="64x64" />

  <!-- REMIXICONS -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- ICONSCOUT -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body class="hidden" >
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
  <main class="main container">

    <!-- ——————————————— HOME ——————————————— -->
    <section class="home section container grid">
      <div class="title_section">
        <h2>TOP 3 MEJORES USUARIOS</h2>
      </div>
      <ul class="rank-list">
        <?php
        require_once './php/controlador_ranking.php';

        foreach (array_slice($listaClasificacion, 0, 3) as $perfil) { ?>

          <li class="rank-item">
            <h3>
              <?php echo ucfirst($perfil['Username']); ?>

            </h3>
            <p>Puntos:
              <?php echo $perfil['Score']; ?>
            </p>
            <p>Rango:
              <?php echo $perfil['Rango']; ?>
            </p>
          </li>
        <?php } ?>
      </ul>

      <div class="title_section">
        <h2>TOP 10 USUARIOS CON MEJOR PUNTAJE</h2>
      </div>

      <table>
        <thead>
          <tr>
            <th>Top</th>
            <th>Usuario</th>
            <th>Puntos</th>
            <th>Rango</th>
        </thead>
        <tbody>
          <?php
          $contador = 0; // Inicializa un contador
          $imagenesPrimerosPuestos = [
            "./img/logo_diamond.png",
            // Imagen para el primer puesto
            "./img/logo_gold.png",
            // Imagen para el segundo puesto
            "./img/logo_plata.png" // Imagen para el tercer puesto
          ];

          foreach ($listaClasificacion as $index => $perfil):
            $contador++; // Incrementa el contador en cada iteración
            ?>
            <tr>
              <td>
                <?php
                if ($contador <= 3) { // Si es uno de los tres primeros
                  echo '<img src="' . $imagenesPrimerosPuestos[$contador - 1] . '" alt="' . $contador . '" class="user-icon fst-puesto">';
                } else {
                  echo $index + 1; // De lo contrario, muestra el número
                }
                ?>
              </td>
              <td>
                <?php echo ucfirst($perfil['Username']); ?>
              </td>
              <td><span class="points-highlight">
                  <?php echo $perfil['Score']; ?>
                </span></td>
              <td>
                <?php echo $perfil['Rango']; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </section>

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