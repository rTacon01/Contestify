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
          <li><a href="<?php echo base_url();?>index.php/accueil/afficher_admin">Accueil</a></li>
          <li><a href="<?php echo base_url();?>index.php/concours/afficher_admin">Concours</a></li>
          <li><a href="<?php echo base_url();?>index.php/compte/afficher">Mon Profil</a></li>
          <li><a href="<?php echo base_url();?>index.php/compte/lister_comptes">Comptes</a></li>
          <li><a href="<?php echo base_url();?>index.php/compte/deconnexion">Se Déconnecter</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Affichage Session Admin Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <h2>Espace d'administration</h2>
            <p>Session ouverte ! Bienvenue <?php echo $_SESSION['username'];?> !</p>
            </div>
        </div>
        </section><!-- End Affichage Session Admin Section -->