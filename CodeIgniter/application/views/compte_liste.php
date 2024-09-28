<!-- ======= Frequently Asked Questions Section ======= -->
     <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3>Liste des <strong><?php echo $titre;?></strong></h3>
              <p>
                Voici la liste des comptes inscrits dans la BDD. Il y a <?php echo $comptes->NbCompte;?> comptes inscrits dans la BDD.
              </p>
            </div>
          </div>

          <div class="col-lg-8">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
              <!-- Utiliser un accordion-item pour chaque candidat inscrit au concours ainsi que leurs infos-->
              <?php
                    $num = 1;
                    if($pseudos != NULL) {
                    foreach($pseudos as $login){?>
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $num;?>">
                    <span class="num"><?php echo $num;?>.</span>
                    Compte n°<?php echo $num;?> : <?php echo $login["CPT_pseudo"]?>
                  </button>
                </h3>
                <div id="faq-content-<?php echo $num;?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    <?php echo $login["CPT_pseudo"]?>
                  </div>
                </div>
              </div><!-- # Faq item-->
            <?php $num++;
            }}
            else {echo "<br />";
                echo "Aucun compte !";
                }
            ?>
            </div>

          </div>
        </div>

      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->