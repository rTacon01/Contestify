<?php
    if($this->session->userdata('role')!='J'){
    redirect(base_url()."index.php/compte/connecter");
    }
?>