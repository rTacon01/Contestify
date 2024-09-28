<section style="background-color: #eee;">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $info->CPT_nom ." ".$info->CPT_prenom; ?></h5>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $info->CPT_nom;?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Prénom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $info->CPT_prenom;?> </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Pseudo</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $info->CPT_pseudo;?> </p>
              </div>
            </div>
            <?php 
            if($this->session->userdata('role')=='J')
            {
                ?>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Discipline</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $info->JRY_discipline;?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Bio</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $info->JRY_bio;?></p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">URL</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $info->JRY_url;?></p>
                </div>
                </div>
                <?php
            }
            ?>
          </div>
        </div>

          </div>
        </div>
      </div>
    </div>
    <div class="container py-5">
    <div class="row">
      <div class="col"></div>
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <h5>Vous voulez modifier votre profil ? C'est par ici !</h5>
            <div class="d-flex justify-content-center mb-1">
                <a href="<?php echo base_url();?>index.php/compte/modifier"><button type="button" class="btn btn-danger">Modifier</button></a>
            </div>
        </nav>
      </div>
    </div>
  </div>
</section>