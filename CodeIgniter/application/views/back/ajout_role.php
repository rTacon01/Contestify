<?php
if($message != NULL)
    {
        echo $message;
    }
?>

<div class="container py-5">
    <div class="row">
      <div class="col"></div>
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <h5>Ajoutez un rôle à ce compte :</h5>
            <div class="d-flex justify-content-center mb-1">
            <a href ="<?php echo base_url();?>index.php/compte/ajouter_role_admin/<?php echo $infos->CPT_idCompte;?>"><button type="button" class="btn btn-light btn-sm">Rôle Administrateur</td></a>
            <a href ="<?php echo base_url();?>index.php/compte/ajouter_role_jury"><button type="button" class="btn btn-light btn-sm">Rôle Membre de jury</td></a>
            </div>
        </nav>
      </div>
    </div>
  </div>
