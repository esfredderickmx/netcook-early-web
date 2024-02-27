<!doctype html>
<html lang="es">
  <head>
    <!-- Etiquetas meta requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Etiquetas meta requeridas -->

    <!-- CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- CSS -->

    <title>Netcook | Página principal</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpg" href="img/service/miniatura.png">
    <!-- Favicon -->
  </head>
  <body style="position: relative;" data-bs-spy="scroll" data-bs-target="#barra-nav-principal" data-bs-offset="2" class="scrollspy-example" tabindex="0">

    <!-- Barra de navegación -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark verde-600" id="barra-nav-principal">
      <div class="container">
        <a href="index.php" class="navbar-brand">
          <img src="img/service/logo.png" class="d-inline-block align-text-top" width="104.45" height="58.15" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#barra-nav" aria-controls="barra-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="barra-nav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
            <li class="nav-item">
              <a href="#inicio" class="nav-link" aria-current="page">Inicio</a>
            </li>

            <!-- Menu desplegable -->
            <li class="nav-item dropdown">
              <a href="#info" class="nav-link dropdown-toggle" id="barra-nav-desplegable" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nosotros</a>
              <ul class="dropdown-menu" aria-labelledby="barra-nav-desplegable">
                <li><a href="#info-identidad" class="dropdown-item">Identidad</a></li>
                <li><a href="#info-misión-visión" class="dropdown-item">Misión y visión</a></li>
              </ul>
            </li>
            <!-- Menu desplegable -->

            <li class="nav-item">
              <a href="#opiniones" class="nav-link" aria-current="page">Opiniones</a>
            </li>
            <li class="nav-item">
              <a href="#invitación" class="nav-link" aria-current="page">¿Te animas?</a>
            </li>
          </ul>
          <div class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
            <li class="nav-item">
              <a type="button" class="btn nav-link fs-5" href="libraries/session_index.php">Ingresar</a>
            </li>
            <li class="nav-item">
              <a type="button" class="btn nav-link fs-5" href="views/sign-in.php">Registrarse</a>
            </li>
          </div>
        </div>
      </div>
    </nav>
    <!-- Barra de navegación -->


    <!-- Sección de inicio -->
    

    <!-- Sección de cualidades -->
    <section class="text-light py-5 naranja-600" id="inicio">
      <div class="container">
        <div class="text-center py-5">
          <i class="bi bi-house-fill h1"></i>
        </div>

        <h1 class="text-center display-5 mb-3">¡Siempre unidos a la hora de comer!</h1>
        <p class="text-center mb-5 lead">Netcook es un proyecto universitario de la materia de "Integradora I" desarrollado por un talentoso diseñador y un fanático de la programación. Y aunque surgió como lo que ya se mencionó, un proyecto universitario, se piensa mantener tanto como se pueda en caso de que tenga la suficiente aceptación del público en general.</p>

        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <div class="row">
              <div class="col-2">
                <i class="bi bi-aspect-ratio-fill h2"></i>
              </div>
              <div class="col-10">
                <h3>Minimalista</h3>
                <p>El proyeco ambicioso, robusto y algo pesado de desarrollar, sin embargo, nada de eso es impedimento para poder plantear un diseño agradable a la vista de la mayoría.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="row">
              <div class="col-2">
                <i class="bi bi-shield-lock-fill h2"></i>
              </div>
              <div class="col-10">
                <h3>Seguro</h3>
                <p>Aunque no es una aplicación con todas las formalidades deseadas, cuenta con la suficiente seguridad y transparencia como para mantener tus datos seguros de los curiosos.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="row">
              <div class="col-2">
                <i class="bi bi-gear-fill h2"></i>
              </div>
              <div class="col-10">
                <h3>Funcional</h3>
                <p>El proyecto cumple con la mayoría de las especificaciones planteadas al principio del mismo, todas (o la gran mayoría) son intuitivas y reconocibles a primera vista.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="row">
              <div class="col-2">
                <i class="bi bi-clock-fill h2"></i>
              </div>
              <div class="col-10">
                <h3>Eficaz</h3>
                <p>Este pequeño proyecto fue desarrollado de tal manera que, como se deseó, ocupara el menor espacio posible y corriera todas sus funciones en un tiempo para nada exagerado en cuanto a eficacia respecta.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="row">
              <div class="col-2">
                <i class="bi bi-display-fill h2"></i>
              </div>
              <div class="col-10">
                <h3>Responsivo</h3>
                <p>¿Desde dónde ves esto? ¿Una laptop? ¿Tu PC gamer? ¿El nuevo Google Pixel? Sea cual sea tu dispositivo, te aseguro que no tienes problema alguno para visualizar nuestro contenido, y en caso de que así sea, ¡háznoslos saber!</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="row">
              <div class="col-2">
                <i class="bi bi-file-code-fill h2"></i>
              </div>
              <div class="col-10">
                <h3>A la vanguardia</h3>
                <p>Netcook está desarrollado con lenguajes de marcado de hipertexto, de hojas de estilos y superhojas de estilos, algunos otros de programación y de consultas estructuradas, siempre utilizando las últimas funciones y versiones de los mismos para hacer tu experiencia lo más fluida posible.</p>
              </div>
            </div>
          </div>

      </div>
    </section>
    <!-- Sección de cualidades -->
    <!-- Sección de inicio -->


    <!-- Sección de información -->
    <main class="text-light py-5 gris-800" id="info">
      <div class="container">
        <div class="row">
          <h2 class="text-center display-6 mb-5" id="info-identidad"><i class="bi bi-person-badge-fill"></i> Identidad</h2>
          <div class="col-12 col-md-6 col-lg-4">
            <h3>¿Quiénes somos?</h3>
            <p>Somos un par de jóvenes universitarios pertenecientes a la casa de estudios de la Universidad Tecnológica de Gutiérrez Zamora, y contamos con la suficiente ambición como para desarrollar algo lo suficiente bueno como para impresionar a más de uno. Quien diseña responde al nombre de Isaías García y la persona responsable del correcto funcionamiento del sitio es Sebastián Montero.</p>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <h3>¿Qué buscamos?</h3>
            <p>Está de más decir que una buena calificación, sin embargo, eso no es lo único que  nos mueve, vimos en esta idea la necesidad de las personas por compartir sus conocimientos gastronómicos con gente de todos los lugares del planeta, y aunque el proyecto se encuentre aún en una fase muy temprana, no nos detendremos hasta lograrlo.</p>
          </div>
          <div class="col-12 col-lg-4">
            <h3>¿Cómo pensamos lograrlo?</h3>
            <p>Bueno, lo que ves ahora se hizo realidad gracias al esfuerzo puesto de ambas partes (diseño y desarrollo), noches sin dormir, retrasos con tareas de algunas actividades, problemas interpersonales ocasionados por el desarrollo continuo del proyecto, entre más situaciones que orillaban a que este proyecto no culminara de buena forma, pero ni siquiera las situaciones más adversas pudieron frenar el desarrollo de Netcook. Y es de esa forma, como lo hemos hecho hasta ahora y como lo seguiremos haciendo mientras nos lo permitas.</p>
          </div>
          <hr class="my-5">
          <h2 class="text-center display-6 mb-5" id="info-misión-visión"><i class="bi bi-eye-fill"></i> Misión y visión</h2>
          <div class="col-12 col-md-6">
            <h3>Misión</h3>
            <p>Nuestra misión principal es ofrecer una red de conocimiento gastronómico enfocada a los amantes de dicho tópico, para que estos mismos puedan encontrar y compartir con mayor facilidad recetas de todo al rededor del país, y cuenten con las opiniones de otros usuarios y asi unir a las personas a través de sus gustos y región de origen.</p>
          </div>
          <div class="col-12 col-md-6">
            <h3>Visión</h3>
            <p>Conectar a las personas con el sazon de todo tipo de región en cualquier momento y lugar, bastando únicamente coningresar al sitio.</p>
          </div>
        </div>
      </div>
    </main>
    <!-- Sección de información -->


    <!-- Sección de opiniones -->
    <section class="text-light py-5 amarillo-600" id="opiniones">
      <div class="container">
        <div class="text-center py-5">
          <i class="bi bi-chat-square-quote-fill h1"></i>
        </div>

        <h2 class="text-center display-5 mb-3">Opiniones de los usuarios</h2>
        <p class="text-center mb-5 lead">¡Aquí encontraras algunas opiniones hechas por los usuarios en general! Mientras más crezca el sitio, podrás previsualizar mejores y más reseñas.</p>

      </div>
    </section>
    <!-- Sección de opiniones -->


    <!-- Sección de invitación -->
    <section class="text-dark py-5 gris-800" id="invitación">
      <div class="container">
        <div class="text-light">
          <div class="text-center py-5">
            <i class="bi bi-question-circle-fill h1"></i>
          </div>

          <h2 class="text-center display-5 mb-3">¡Anímate a ser parte de la familia Netcook!</h2>
          <p class="text-center lead mb-5">Ya te hemos contado lo que pensamos, cómo lo pensamos y porqué lo pensamos, pero ¿qué hay de ti? ¿te animas a poyarnos en este aún inconcluso viaje? No te lo pienses más, no tienes nada que perder si has llegado hasta aquí. Mira a continuación algunas de las recetas compartidas en el sitio.</p>
        </div>

        <div class="row">
          <?php
          
            include_once("libraries/index_recipes.php");

            $recetas_ínidce = new RecetasÍndice;

            $recetas_ínidce -> mostrarRecetas();

          ?>
        </div>
      </div>
    </section>
    <!-- Sección de invitación -->


    <?php

      include("views/footer.php");

    ?>


    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- JS -->
  </body>
</html>