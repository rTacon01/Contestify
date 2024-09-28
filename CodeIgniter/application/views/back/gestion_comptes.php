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
              <h2>Comptes présents</h2>
              <p>Sur cette page vous y trouverez tous les comptes présents sur notre plateforme.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?php echo base_url();?>index.php/accueil/afficher">Accueil</a></li>
            <li>Détails des comptes</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!--Section Comptes -->
    <section id = concours>
      <div class="container mt-3">
            <h2>  Tableau des comptes</h2>
            <?php
            if($message != NULL)
            {
                echo $message;
            }?>         
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Login</th>
                  <th>Nom du compte</th>
                  <th>Prénom du compte</th>
                  <th>Mail du compte</th>
                  <th>Statut du compte</th>
                  <th>Etat du compte</th>
                </tr>
              </thead>
              <tbody>
              <?php
            if($comptes != NULL) {
              // Boucle de parcours de toutes les lignes du résultat obtenu
                foreach($comptes as $unCompte){
                    ?>
                    <tr>
                        <td><?php echo $unCompte["CPT_pseudo"]?></td>
                        <td><?php echo $unCompte["CPT_nom"]?></td>
                        <td><?php echo $unCompte["CPT_prenom"]?></td>
                        <td><?php echo $unCompte["CPT_mail"]?></td> 
                        <td><?php echo $unCompte["CPT_Statut"]?></td>
                        <td><?php echo $unCompte["CPT_activation"]?></td>
                        <?php
                    }
                }
                else{
                  echo "Aucun comptes présents !";
                }?>
    
              </tbody>
            </table>
            <div class="col"></div>
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <h5>Vous voulez ajouter un compte ? C'est par ici !</h5>
                    <div class="d-flex justify-content-center mb-1">
                        <a href="<?php echo base_url();?>index.php/compte/ajouter"><button type="button" class="btn btn-danger">Ajouter un compte</button></a>
                    </div>
                </nav>
            </div>
      </div>



    </section>
    <!--End Section Comptes -->