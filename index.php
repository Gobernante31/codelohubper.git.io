<?php 
require_once './lib/footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CodeLoHubper</title>

  <!--——————————————— CSS ———————————————-->
  <link rel="stylesheet" href="./css/styleindex.css" />

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

<body class="hidden">

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
            <a href="./login.php" class="nav_login">Iniciar sesión</a>
            <a href="./register.php" class="nav_singup">Registrarse</a>
          </div>
        </div>
      </div>
    </nav>
  </header>


  <!-- ***** Main Banner Area Start ***** -->

  <div id="Main_page" class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>CodeLoHubper</h6>
            <h2>Ofrece o busca soluciones tecnológicas.</h2>
            <p>CodeLoHubper es un sitio único donde puedes ofrecer tus servicios de programación y soluciones
              tecnológicas para diversos problemas cotidianos relacionados con la tecnología actual. Esto te permite
              conectar con personas que necesitan ayuda o que pueden ayudarte si estás buscando una solución para tus
              problemas de código o apartos tecnológicos</p>
            <p>Para acceder al contenido, debes registrarte y verificar tu correo. ¡No esperes más para empezar!</p>

            <div>
              <a href="./register.php" class="nav_singup button_banner">¡Comenzar!</a>
            </div>

          </div>
          </button>

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->


  <main>
    <div id="About_page" class="about_page">
      <div class="_container">

        <div class="about_section">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Acerca de Servicios.</h2>
          </div>

          <div class="item">
            <div class="icon">
              <img src="./img/development_icon.png" alt="">
            </div>
            <h4>Reparación | Servicios Tenicos</h4>
            <p>Podras encontrar una variedad de servicios tenicos, asi como sea reparacion de computadoras, de
              celulares, impresoras, tablets y demás servicios relacionados con servicios tenicos. Asi podras solucionar
              problemas que tengas en tus dispositivos.</p>


            <div class="item">
              <div class="icon">
                <img src="./img/cognitive_icon.png" alt="">
              </div>
              <h4>Codigo | Lenguajes Programación</h4>
              <p>Podras encontrar varios servicios relacionados con servicios de programacion en diferentes lenguajes.
                Ya sea Backend & Frontend, Python, Java Script, PHP, SQL y demás lenguajes de programación, esto para
                ayudarte a desarrollar lo que necesites, ya sea una aplicación o una pagina, etc.</p>

            </div>


          </div>
        </div>
      </div>



      <div id="Info_page" class="info_page">
        <div class="_container">

          <div class="info_section">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h2>Información.</h2>
            </div>


            <div class="item">
              <div class="icon">
                <img src="./img/development_icon.png" alt="">
              </div>
              <h4>Publica tus Servicios</h4>
              <p>Por tan solo $5 dólares, podrás publicar tus servicios relacionados con la tecnología en nuestro sitio.
                Esto pueden ser servicios técnicos, programación en diversos lenguajes y una amplia gama de servicios
                relacionados con la tecnología. Además, te ofrecemos un sistema de calificación por estrellas, donde
                cada
                valoración positiva de los usuarios contribuirá a mejorar tu posición en el ranking, destacando así tu
                servicio entre todos los demás disponibles.</p>


              <div class="item">
                <div class="icon">
                  <img src="./img/cognitive_icon.png" alt="">
                </div>
                <h4>Fortalece tu capacidad de pensamiento lógico.</h4>
                <p>Descubre una experiencia única en nuestro sitio web. Te ofrecemos la oportunidad de desarrollar y
                  potenciar tu capacidad de pensamiento lógico a través de desafiantes actividades y proyectos. Explora
                  nuevas perspectivas y desbloquea tu potencial mientras te sumerges en el mundo de la tecnología y la
                  creatividad.</p>

              </div>

              <div class="item">
                <div class="icon">
                  <img src="./img/palette_color_icon.png" alt="">
                </div>
                <h4>Personalización total de tu perfil</h4>
                <p>¡Potencia tu perfil al máximo! En nuestro sitio, puedes llevar la personalización de tu perfil a un
                  nivel sin precedentes. Diseña y adapta tu perfil de acuerdo a tus gustos y necesidades. Expresa tu
                  individualidad y crea una experiencia única para ti y para quienes te visiten.</p>
              </div>


            </div>
          </div>
        </div>


        <div id="FAQ" class="currently-market">
          <div class="currently">



            <div class="secciones_container">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h2>Preguntas Frecuentes</h2>
              </div>

              <div class="secciones_row">
                <!-- PREGUNTA 1 -->
                <details class="secciones_box">
                  <summary class="img_secciones">
                    <img src="./img/user_84308.png" alt="user">
                    <h4>¿Qué es CodeLoHubper, para qué sirve?</h4>
                  </summary>
                  <div class="pregunta_text">
                    <p>CodeLoHubper es una plataforma web donde puedes ofrecer servicios relacionados con la tecnología
                      y brindar soluciones a problemas técnicos o de código. Sirve como un puente de conexión entre
                      personas que necesitan ayuda y aquellas que tienen la solución.</p>
                  </div>
                </details>

                <!-- PREGUNTA 2 -->
                <details class="secciones_box">
                  <summary class="img_secciones">
                    <img src="./img/user_84308.png" alt="user">
                    <h4>¿Cómo puedo recuperar mi contraseña si la olvidé?</h4>
                  </summary>
                  <div class="pregunta_text">
                    <p>En la página de inicio de sesión, hay una opción destacada en color morado. Si haces clic en
                      ella, podrás solicitar un correo para restablecer tu contraseña.</p>
                  </div>
                </details>

                <!-- PREGUNTA 3 -->
                <details class="secciones_box">
                  <summary class="img_secciones">
                    <img src="./img/user_84308.png" alt="user">
                    <h4>¿Es seguro proporcionar mi información personal?</h4>
                  </summary>
                  <div class="pregunta_text">
                    <p>Sí, contamos con un sistema de seguridad robusto que incluye protección contra inyección SQL,
                      ataques XSS y otras amenazas. Tus datos están seguros con nosotros y se mantienen completamente
                      confidenciales.</p>
                  </div>
                </details>

                <!-- PREGUNTA 4 -->
                <details class="secciones_box">
                  <summary class="img_secciones">
                    <img src="./img/user_84308.png" alt="user">
                    <h4>¿Cómo puedo registrarme o iniciar sesión?</h4>
                  </summary>
                  <div class="pregunta_text">
                    <p>Para registrarte, necesitas tener una dirección de correo electrónico activa. Esto se requiere
                      para la verificación de tu cuenta y garantizar que eres un usuario real, no un bot.</p>
                  </div>
                </details>

                <!-- PREGUNTA 5 -->
                <details class="secciones_box">
                  <summary class="img_secciones">
                    <img src="./img/user_84308.png" alt="user">
                    <h4>¿Es gratuito o cuánto cuestan los servicios?</h4>
                  </summary>
                  <div class="pregunta_text">
                    <p>Nuestra tarifa por publicación es de $5 dólares. El precio que cobre el solicitante es a su
                      elección, no establecemos un precio mínimo para cada servicio. Las personas pueden establecer su
                      propio precio deseado.</p>
                  </div>
                </details>

                <!-- PREGUNTA 6 -->
                <details class="secciones_box">
                  <summary class="img_secciones">
                    <img src="./img/user_84308.png" alt="user">
                    <h4>¿Cómo puedo ponerme en contacto con el soporte técnico o servicio al cliente?</h4>
                  </summary>
                  <div class="pregunta_text">
                    <p>Puedes comunicarte a través del correo electrónico en CodeLoHubper@gmail.com o
                      CodeLoHubper@hotmail.com. Estaremos atentos en ambos correos para responder tus consultas y
                      brindarte asistencia.</p>
                  </div>
                </details>

              </div>

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