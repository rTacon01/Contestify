<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Concours présents</h2>
              <p>Sur cette page vous y trouverez tous les concours présents sur notre plateforme.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?php echo base_url();?>index.php/accueil/afficher">Accueil</a></li>
            <li>Détails des concours</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!--Section Actualites -->
    <section id = concours>
      <div class="container mt-3">
            <h2>  Tableau des concours</h2>           
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nom du concours</th>
                  <th>Pseudo de l'organisateur</th>
                  <th>Date du début du concours</th>
                  <th>Date de fin du concours</th>
                  <th>Nom des catégories du concours</th>
                  <th>Nom et prénom des jury associés</th>
                  <th>Informations détaillés du concours</th>
                  <th>Galerie</th>
                  <th>Etat du concours</th>
                  <th>Palmarès du concours</th>
                  <th>Candidater</th>
                </tr>
              </thead>
              <tbody>
              <?php
            if($concours != NULL) {
              // Boucle de parcours de toutes les lignes du résultat obtenu
                foreach($concours as $unConcours){
                    ?>
                    <tr>
                        <td><?php echo $unConcours["CCS_nomConcours"]?></td>
                        <td><?php echo $unConcours["PseudoDeLorganisateur"]?></td>
                        <td><?php echo $unConcours["CCS_dateDebut"]?></td>
                        <td><?php echo $unConcours["CCS_dateFin"]?></td> 
                        <?php
                        if ($unConcours["NomCategorie"]==NULL)
                        {
                          echo "<td> Pas de catégories</td>";
                        }
                        else{
                          ?>
                          <td><?php echo $unConcours["NomCategorie"]?></td><?php
                        }
                        if ($unConcours["jury"]==NULL)
                        {
                          echo "<td> Aucun membre du jury</td>";
                        }
                        else{
                          ?>
                          <td><?php echo $unConcours["jury"]?></td><?php
                        }?>
                        <td><button type="button" class="btn btn-secondary btn-sm">Voir Informations supplémentaires</td>
                        <?php
                        if($unConcours["PhaseConcours"] == "A Venir"){
                          ?>
                        <td></td>
                        <td><button type="button" class="btn btn-success btn-sm"><?php echo $unConcours["PhaseConcours"]?></td>
                        <td></td><?php
                        }
                        if($unConcours["PhaseConcours"] == "Phase de candidatures !"){
                          ?>
                        <td></td>
                        <td><button type="button" class="btn btn-primary btn-sm"><?php echo $unConcours["PhaseConcours"]?></td>
                        <td></td><?php
                        }
                        if($unConcours["PhaseConcours"] == "Phase de sélections !"){
                          ?>
                        <td></td>
                        <td><button type="button" class="btn btn-info btn-sm"><?php echo $unConcours["PhaseConcours"]?></td>
                        <td></td><?php
                        }
                        if($unConcours["PhaseConcours"] == "Phase finale du concours !"){
                          ?>
                        <td><button type="button" class="btn btn-light btn-sm">Voir la galerie</td>
                        <td><button type="button" class="btn btn-warning btn-sm"><?php echo $unConcours["PhaseConcours"]?></td>
                        <td></td><?php
                        }
                        if($unConcours["PhaseConcours"] == "Concours terminé !"){
                          ?>
                        <td><button type="button" class="btn btn-light btn-sm">Voir la galerie</td>
                        <td><button type="button" class="btn btn-danger btn-sm"><?php echo $unConcours["PhaseConcours"]?></td>
                        <td><button type="button" class="btn btn-warning btn-sm">Voir le palmarès</td><?php
                        }
                        if($unConcours["PhaseConcours"] == "Phase de candidatures !"){
                          ?>
                        <td><button type="button" class="btn btn-success btn-sm">Candidater</td>
                        <?php
                        }

                    }
                }
                else{
                  echo "Aucun concours pour l'instant !";
                }?>
    
              </tbody>
            </table>
      </div>



    </section>
    <!--End Section Actualites -->

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

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="assets/img/portfolio/app-1.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/portfolio/product-1.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/portfolio/branding-1.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/portfolio/books-1.jpg" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              <h2>This is an example of portfolio detail</h2>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
              <p>
                Amet consequatur qui dolore veniam voluptatem voluptatem sit. Non aspernatur atque natus ut cum nam et. Praesentium error dolores rerum minus sequi quia veritatis eum. Eos et doloribus doloremque nesciunt molestiae laboriosam.
              </p>

              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <div>
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>

              <p>
                Impedit ipsum quae et aliquid doloribus et voluptatem quasi. Perspiciatis occaecati earum et magnam animi. Quibusdam non qui ea vitae suscipit vitae sunt. Repudiandae incidunt cumque minus deserunt assumenda tempore. Delectus voluptas necessitatibus est.

              <p>
                Sunt voluptatum sapiente facilis quo odio aut ipsum repellat debitis. Molestiae et autem libero. Explicabo et quod necessitatibus similique quis dolor eum. Numquam eaque praesentium rem et qui nesciunt.
              </p>

            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Informations sur le concours</h3>
              <ul>
                <li><strong>Category</strong> <span>Web design</span></li>
                <li><strong>Client</strong> <span>ASU Company</span></li>
                <li><strong>Project date</strong> <span>01 March, 2020</span></li>
                <li><strong>Project URL</strong> <a href="#">www.example.com</a></li>
                <li><a href="#" class="btn-visit align-self-start">Visit Website</a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->