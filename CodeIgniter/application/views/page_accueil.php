  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>Contestify</span></h2>
          <p>LA plateforme de concours préféré de ton influenceur préféré !</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="https://www.youtube.com/watch?v=VmIGKkLySCw" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Regarder la vidéo</span></a> <!-- Voir pour mettre une vidéo sur les déco de noël-->
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="<?php echo base_url();?>assets/img/couv-concours-illuminations-1.jpg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!--Section Actualites -->
    <section id = actualite>
      <div class="container mt-3">
            <h2>  Tableau des actualités</h2>           
            <table class="table table-hover">
              <thead>
                <tr>
                  <th> Pseudo de l'organisateur</th>
                  <th>Titre de l'actualité</th>
                  <th>Message de l'actualité</th>
                  <th>Date de l'actualité</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if($actus != NULL) {
                    foreach($actus as $actualite){?>
                <tr>
                  <td><?php echo $actualite["CPT_pseudo"]?></td>
                  <td><?php echo $actualite["ACT_titreActualite"]?></td>
                  <td><?php echo $actualite["ACT_message"]?></td>
                  <td><?php echo $actualite["ACT_dateActualite"]?></td>
                </tr>
                <?php
              }}
              else {echo "<br />";
                  echo "Aucune actualtié !";
                  }
              ?>
    
              </tbody>
            </table>
      </div>
    </section>
    <!--End Section Actualites -->

        <!-- ======= Concours Section ======= -->
        <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Concours</h2>
          <p>Voici les différents concours que nous proposons à notre communauté</p>
        </div>
        <!-- A voir mais à retirer car compliqué à mettre en place si pas de type de concours dans la BDD-->
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4 portfolio-container">
          <?php
          if($concours != NULL) {
            foreach($concours as $leconcours){?>
            <!-- Voir pour ajouter une div à chaque concours  --> 
            <div class="col-xl-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <a href="<?php echo base_url();?>documents/concours/<?php echo $leconcours["CCS_imageConcours"]?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="<?php echo base_url();?>documents/concours/<?php echo $leconcours["CCS_imageConcours"]?>" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="<?php echo base_url();?>index.php/concours/afficher" title="More Details"><?php echo $leconcours["CCS_nomConcours"]?></a></h4><!--Nom en fonction du nom du conours-->
                  <p><?php echo $leconcours["CCS_intro"]?></p> <!-- Date de début du concours-->
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            <?php
            }}
            else {echo "<br />";
                echo "Aucune actualtié !";
                }
            ?>



          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Concours Section -->

    <!-- ======= Stats Counter Section ======= -->
    <!-- Bonus : les stats du concours-->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-6">
            <img src="<?php echo base_url();?>assets/img/stats-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6">

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong> consequuntur quae diredo para mesta</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Projects</strong> adipisci atque cum quia aut</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
            </div><!-- End Stats Item -->

          </div>

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3>Liste des <strong>candidats</strong></h3>
              <p>
                Voici la liste des candidats inscrits pour ce concours.
              </p>
            </div>
          </div>

          <div class="col-lg-8">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
              <!-- Utiliser un accordion-item pour chaque candidat inscrit au concours ainsi que leurs infos-->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <span class="num">1.</span>
                    Candidat n°1 : Nom Prénom
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <span class="num">2.</span>
                    Candidat n°2 : Nom Prénom
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <span class="num">3.</span>
                    Candidat n°3 : Nom Prénom
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <span class="num">4.</span>
                    Candidat n°4 : Nom Prénom
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <span class="num">5.</span>
                    Candidat n°5 : Nom Prénom
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Formulaire d'inscription</h2>
          <p>Formulaire d'inscription pour le concours suivant : "Nom du concours"</p>
        </div>

          <div class="col-lg-12">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nom" class="form-control" id="nom" placeholder="Ton nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Ton prénom" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Ton adresse Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Envoi en cours</div>
                <div class="error-message"></div>
                <div class="sent-message">Ta candidature a été transmise !</div>
              </div>
              <div class="text-center"><button type="submit">Soumettre</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
