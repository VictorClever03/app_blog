<?php

use App\Helpers\Sessao;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=asset("img/favicon-32x32.png")?>" rel="icon">
 

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= asset("assets/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
  <link href="<?= asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") ?>" rel="stylesheet">
  <link href="<?= asset("assets/vendor/aos/aos.css") ?>" rel="stylesheet">
  <link href="<?= asset("assets/vendor/glightbox/css/glightbox.min.css") ?>" rel="stylesheet">
  <link href="<?= asset("assets/vendor/swiper/swiper-bundle.min.css") ?>" rel="stylesheet">
  <link href="<?= asset("assets/vendor/remixicon/remixicon.css") ?>" rel="stylesheet">



  <!-- Template Main CSS File -->
  <link href="<?= asset("assets/css/main.css") ?>" rel="stylesheet">

  <script src="<?= asset(JQUERY) ?>"></script>
  <script src="<?= asset(NOTIFY) ?>"></script>

</head>

<body class="page-index">
<?=Sessao::notify("message")?>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?=URL?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">Blog IPPA</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= URL ?>/home" class="<?= $title == 'home' ? 'active' : '' ?>">Home</a></li>
          <li><a href="<?= URL ?>/about" class="<?= $title == 'about' ? 'active' : '' ?>">Sobre</a></li>
          <li><a href="<?= URL ?>/cursos" class="<?= $title == 'cursos' ? 'active' : '' ?>">Cursos</a></li>
          <li><a href="<?= URL ?>/team" class="<?= $title == 'team' ? 'active' : '' ?>">Team</a></li>
          <!--  -->
          <?php if (isset($_SESSION['BlogUser_id'])) : ?>
            <li><a href="<?= URL ?>/blog" class="<?= $title == 'blog' ? 'active' : '' ?>">Blog</a></li>
          <?php else : echo '';
          endif; ?>

          <li><a href="<?= URL ?>/contact" class="<?= $title == 'contact' ? 'active' : '' ?>">Contact</a></li>

          <?php if (!isset($_SESSION['BlogUser_id'])) : ?>
            <li style=" margin-left: 10px; background-color: #56B8E6;" class="p-2 rounded-2 btn "><a href="<?= URL ?>/login" class="p-0 <?= $title == 'login' ? 'active' : '' ?>">Login</a></li>
          <?php else : ?>
            <li style=" margin-left: 10px; background-color: #56B8E6;" class="p-2 rounded-2 btn "><a href="<?= URL ?>/sair" class="p-0 <?= $title == 'login' ? 'active' : '' ?>">sair</a></li>
          <?php endif; ?>

        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- ================================================================= -->
  <?php
  $file = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . str_replace('.php', '', $file) . '.php';
  require_once $file;

  ?>
  <!-- =============================================================== -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="<?=URL?>" class="logo d-flex align-items-center">
              <span>Blog IPPA</span>
            </a>
            <p>Um Blog informativo e interativo no IPPA permitirá a fácil comunicação verbal e visual por meio de
              postagens, atualização dos conteúdos entre alunos, professores e a coordenação em geral. </p>
            <div class="social-links d-flex  mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><a href="<?= URL ?>/home" class="<?= $title == 'home' ? 'active' : '' ?>">Home</a></li>
              <li><a href="<?= URL ?>/about">Sobre</a></li>
              <li><a href="<?= URL ?>/cursos">Cursos</a></li>
              <li><a href="<?= URL ?>/team">Team</a></li>
              <li><a href="<?= URL ?>/blog">Blog</a></li>
              <li><a href="<?= URL ?>/contact">Contact</a></li>
            </ul>
          </div>



          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contacte-nos</h4>
            <p>
              Luanda, cacuaco <br>
              Angola <br><br>
              <strong>Phone:</strong> +244 938 295 867<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Blog IPPA</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
       
      
          Made by <a href="#">Victor Clever</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer --><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <script src="<?= asset("assets/vendor/aos/aos.js") ?>"></script>
  <script src="<?= asset("assets/vendor/glightbox/js/glightbox.min.js") ?>"></script>
  <script src="<?= asset("assets/vendor/swiper/swiper-bundle.min.js") ?>"></script>
  <script src="<?= asset("assets/vendor/isotope-layout/isotope.pkgd.min.js") ?>"></script>
  <script src="<?= asset("assets/vendor/php-email-form/validate.js") ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= asset("assets/js/main.js") ?>"></script>

</body>

</html>