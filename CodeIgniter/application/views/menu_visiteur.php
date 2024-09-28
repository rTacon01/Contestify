<body>

  <!-- ======= Header ======= -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url();?>index.php/accueil/afficher" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Contestify<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo base_url();?>index.php/accueil/afficher">Accueil</a></li>
          <li><a href="<?php echo base_url();?>index.php/concours/afficher">Concours</a></li>
          <li><a href="<?php echo base_url();?>index.php/candidature/load_candidature">Suivi de candidature</a></li>
          <li><a href="<?php echo base_url();?>index.php/compte/connecter">Se connecter</a></li>
          <!--<li><a href="#actualite">Actualités</a></li> 
          <li><a href="#contact">Contact</a></li> -->
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->