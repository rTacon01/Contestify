
<div class="col"></div>
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <?php
                    if($message != NULL)
                    {
                        echo $message;
                    }?>
                <h5>Retour à la page d'accueil :</h5>
                    <div class="d-flex justify-content-center mb-1">
                        <?php 
                        if($this->session->userdata('role')=='O')
                        {
                            ?>
                            <a href="<?php echo base_url();?>index.php/accueil/afficher_admin"><button type="button" class="btn btn-danger">Retour</button></a>
                            <?php
                        }
                        else{
                            ?>
                            <a href="<?php echo base_url();?>index.php/accueil/afficher"><button type="button" class="btn btn-danger">Retour</button></a>
                            <?php
                        }?>
                    </div>
                </nav>
            </div>