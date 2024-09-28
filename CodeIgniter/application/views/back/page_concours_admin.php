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
              <h2>Concours présents</h2>
              <p>Sur cette page vous y trouverez tous les concours présents.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?php echo base_url();?>index.php/accueil/afficher_admin">Accueil</a></li>
            <li>Détails des concours</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!--Section Actualites -->
    <section id = concours>
      <div class="container mt-3">
            <h2>  Tableau des concours selon l'administrateur <?php echo $_SESSION['username'];?></h2>           
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nom du concours</th>
                  <th>Date du début du concours</th>
                  <th>Date de fin du concours</th>
                  <th>Nom des catégories du concours</th>
                  <th>Etat du concours</th>
                  <th>Visualiser candidatures</th>
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
                        <td><?php echo $unConcours["CCS_dateDebut"]?></td>
                        <td><?php echo $unConcours["CCS_dateFin"]?></td> 
                        <?php
                        if ($unConcours["NomCategorie"]==NULL)
                        {
                          echo "<td> Aucune catégorie</td>";
                        }
                        else{
                          ?>
                          <td><?php echo $unConcours["NomCategorie"]?></td><?php
                        }
                        if($unConcours["PhaseConcours"] == "Phase de sélections !" && $unConcours["NbCandidature"] > 0){
                          ?>
                        <td><button type="button" class="btn btn-warning btn-sm"><?php echo $unConcours["PhaseConcours"]?></td>
                        <td><a href ="<?php echo base_url();?>index.php/candidature/afficher_all_admin/<?php echo $unConcours["CCS_idConcours"];?>"><button type="button" class="btn btn-light btn-sm">Voir les candidatures</td></a></td><?php
                        }
                        else{
                            ?>
                            <td><button type="button" class="btn btn-warning btn-sm"><?php echo $unConcours["PhaseConcours"]?></td><?php
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