<!--Section Candidat -->
<section id = actualite>
      <div class="container mt-3">
      <?php
                if(isset($candidature)) {
                ?>
            <h2>  Tableau des informations du candidat</h2>           
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Mail du candidat</th>
                  <th>Nom du candidat</th>
                  <th>Prénom du candidat</th>
                  <th>Statut du candidat</th>
                  <th>Date d'inscription du candidat</th>
                  <th>Catégorie inscrite</th>
                  <th>Nom du concours inscrit</th>
                  <th>Supprimer ma candidature</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                        <td><?php echo $candidature->PTT_mail?></td>
                        <td><?php echo $candidature->PTT_nom?></td>
                        <td><?php echo $candidature->PTT_prenom?></td>
                        <td><?php echo $candidature->PTT_statutParticipant?></td>
                        <td><?php echo $candidature->PTT_dateInscription?></td>
                        <td><?php echo $candidature->CAT_nom?></td>
                        <td><?php echo $candidature->CCS_nomConcours?></td>
                        <td><a href ="<?php echo base_url();?>index.php/candidature/supprimer_candidature/<?php echo $candidature->PTT_idParticipant;?>"><button type="button" class="btn btn-danger btn-sm">Supprimer ma candidature</a></td>
                    </tr>
              </tbody>
            </table>
            <?php
                  }
                else {echo "<br />";
                        echo "Aucune candidature sous cet identifiant, merci de mettre un identifiant valide !";
                        }
                    ?>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Documents</th>
                </tr>
              </thead>
              <tbody>
              <?php
            if($documents != NULL) {
              foreach($documents as $ledocument){?>
              <tr>
                <td><a href="<?php echo base_url();?>documents/candidats/<?php echo $ledocument["DCT_chemin"]?>"><?php echo $ledocument["DCT_chemin"]?></a></td>
              </tr>
              <?php
              }}
              else {echo "<br />";
                  echo "Pas de documents !";
                  }
            ?>
              </tbody>
            </table>
      </div>
    </section>
    <!--End Section Candidat -->