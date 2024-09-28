<?php
    if($this->session->userdata('role')!='J'){
    redirect(base_url()."index.php/compte/connecter");
    }
?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Candidature </h2>
              <p>Sur cette page vous y trouverez la concandidature de  <?php echo $candidature->PTT_nom." ".$candidature->PTT_prenom;?>.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?php echo base_url();?>index.php/concours/afficher_jury">Accueil</a></li>
            <li>Détails des concours</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!--Section Actualites -->
    <section id = concours>
      <div class="container mt-3">
            <h2>  Tableau de la candidature </h2>           
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nom du candidat</th>
                  <th>Prénom du candidat</th>
                  <th>Mail du candidat</th>
                  <th>Statut du candidat</th>
                  <th>Date d'inscription</th>
                </tr>
              </thead>
              <tbody>
              <?php
            if($candidature != NULL ) {
              // Boucle de parcours de toutes les lignes du résultat obtenu
                        ?>
                        <tr>
                            <td><?php echo $candidature->PTT_nom?></td>
                            <td><?php echo $candidature->PTT_prenom?></td>
                            <td><?php echo $candidature->PTT_mail?></td>
                            <td><?php echo $candidature->PTT_statutParticipant?></td> 
                            <td><?php echo $candidature->PTT_dateInscription?></td>
                            <?php
                    }
                else{
                  echo "Pas de candidatures pour l'instant !";
                }?>
    
              </tbody>
            </table>
      </div>



    </section>
    <!--End Section Actualites -->
    
    
    
    
    
    
    
    
    <!--End Section Documents -->

        <!-- ======= Concours Section ======= -->
        <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Galerie</h2>
          <p>Voici les différents Documents que le participant <?php echo $candidature->PTT_nom." ".$candidature->PTT_prenom;?> possède.</p>
        </div>
        <!-- A voir mais à retirer car compliqué à mettre en place si pas de type de concours dans la BDD-->
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4 portfolio-container">
          <?php
          if($documents != NULL) {
            foreach($documents as $leDocument){
                if(substr($leDocument["DCT_chemin"], -4) == ".pdf")
                {
                    ?>
                    <!-- Voir pour ajouter une div à chaque concours  --> 
                    <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                      <div class="portfolio-wrap">
                        <a href="<?php echo base_url();?>documents/candidats/<?php echo $leDocument["DCT_chemin"]?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="<?php echo base_url();?>documents/candidats/pdf.jpg" class="img-fluid" alt=""></a>
                      </div>
                    </div><!-- End Portfolio Item -->
                    <?php
                }
                else{
                    ?>
                    <!-- Voir pour ajouter une div à chaque concours  --> 
                    <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                      <div class="portfolio-wrap">
                        <a href="<?php echo base_url();?>documents/candidats/<?php echo $leDocument["DCT_chemin"]?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="<?php echo base_url();?>documents/candidats/<?php echo $leDocument["DCT_chemin"]?>" class="img-fluid" alt=""></a>
                      </div>
                    </div><!-- End Portfolio Item -->
                    <?php

                }
            }}
            else {echo "<br />";
                echo "Aucuns documents !";
                }
            ?>
          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Documents Section -->