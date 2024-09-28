<?php
    if($this->session->userdata('role')!='O'){
    redirect(base_url()."index.php/compte/connecter");
    }


    if($message != NULL)
    {
        echo $message;
    }
?>




