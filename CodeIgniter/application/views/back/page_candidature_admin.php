<?php
    if($this->session->userdata('role')!='O'){
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
              <h2>Candidatures présentes</h2>
              <p>Sur cette page vous y trouverez toutes les concandidatures présentes de ce concours.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?php echo base_url();?>index.php/concours/afficher_admin">Accueil</a></li>
            <li>Détails des concours</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!--Section Actualites -->
    <section id = concours>
      <div class="container mt-3">
            <h2>  Tableau des candidatures </h2>           
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nom du candidat</th>
                  <th>Prénom du candidat</th>
                  <th>Mail du candidat</th>
                  <th>Statut du candidat</th>
                  <th>Date d'inscription</th>
                  <th>Catégorie</th>
                  <th>Supprimer</th>
                </tr>
              </thead>
              <tbody>
              <?php
            if($candidature != NULL ) {
              // Boucle de parcours de toutes les lignes du résultat obtenu
                foreach($candidature as $uneCandidature){
                        ?>
                        <tr>
                            <td><?php echo $uneCandidature["PTT_nom"]?></td>
                            <td><?php echo $uneCandidature["PTT_prenom"]?></td>
                            <td><?php echo $uneCandidature["PTT_mail"]?></td>
                            <td><?php echo $uneCandidature["PTT_statutParticipant"]?></td> 
                            <td><?php echo $uneCandidature["PTT_dateInscription"]?></td>
                            <td><?php echo $uneCandidature["CAT_nom"]?></td>
                            <td><a href ="<?php echo base_url();?>index.php/candidature/supprimer_candidature/<?php echo $uneCandidature['PTT_idParticipant'];?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                            <?php
                    }
                }
                else{
                  echo "Pas de candidatures pour l'instant !";
                }?>
    
              </tbody>
            </table>
      </div>



    </section>
    <!--End Section Actualites -->