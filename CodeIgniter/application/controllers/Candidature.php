<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Candidature extends CI_Controller {
  public function __construct()
 {
  parent::__construct();
  $this->load->helper('url');
  $this->load->model('db_model');
  $this->load->helper('url_helper');
 }

  public function afficher($numero =FALSE)
 {
    if ($numero==FALSE)
    {   
        $url=base_url(); header("Location:$url");
    }
    else{
        $data['candidature'] = $this->db_model->get_candidature($numero);
        $data['documents'] = $this->db_model->get_all_documents($numero);

        $this->load->view('templates/haut');
        $this->load->view('menu_visiteur');
        $this->load->view('page_candidature',$data);
        $this->load->view('templates/bas');
    }
 }

 //Affiche toutes les candidatures selon l'id du concours
 public function load_candidature()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('codeInscription', 'codeInscription', 'required');
        $this->form_validation->set_rules('codeIdentification', 'codeIdentification', 'required');
        $this -> form_validation -> set_message ( 'required' ,  'Le champ {field} est réquis pour voir votre candidature.' );
        $data['message'] = NULL;

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/haut');
            $this->load->view('menu_visiteur');
            $this->load->view('form_candidature',$data);
            $this->load->view('templates/bas');
        }
        else
        {

            $inscription = $this->input->post('codeInscription');
            $identification = $this->input->post('codeIdentification');

            if ($this->db_model->get_candidature2($inscription,$identification))
            {
                $data['candidature'] = $this->db_model->get_candidature2($inscription,$identification);
                $data['documents'] = $this->db_model->get_all_documents($inscription);

                $this->load->view('templates/haut');
                $this->load->view('menu_visiteur');
                $this->load->view('page_candidature',$data);
                $this->load->view('templates/bas');
            }
            else
            {
                $data['message'] = 'Code(s) erroné(s), aucune candidature (/inscription) trouvée ! ';
                $this->load->view('templates/haut');
                $this->load->view('menu_visiteur');
                $this->load->view('form_candidature',$data);
                $this->load->view('templates/bas');
            }
        }
    }

//Cette fonciton supprime un participant ainsi que ses documents 
 public function supprimer_candidature($numero)
 {
    $data['candidature'] = $this->db_model->get_candidature3($numero);
    $inscription = $data['candidature']->PTT_codeInscription;
    $identification = $data['candidature']->PTT_codeIdentification;

    if($this->session->userdata('role')=='O')
    {
        if($this->db_model->delete_documents($numero) && $this->db_model->delete_candidature($inscription, $identification))
        {
            $data['message'] = "Votre candidature a été supprimé";
            $this->load->view('templates/haut');
            $this->load->view('back/menu_administrateur');
            $this->load->view('suppresion_candidature',$data);
            $this->load->view('templates/bas');
        }
    }
    else{
        if($this->db_model->delete_documents($numero) && $this->db_model->delete_candidature($inscription, $identification))
        {
            $data['message'] = "Votre candidature a été supprimé";
            $this->load->view('templates/haut');
            $this->load->view('menu_visiteur');
            $this->load->view('suppresion_candidature',$data);
            $this->load->view('templates/bas');
        }

    }

 }

 //Cette fonciton affiche tous les  
 public function afficher_all($numero)
 {
    $data['candidature'] = $this->db_model->get_all_candidatures($numero);
    //$data['documents'] = $this->db_model->get_all_documents($numero);

    $this->load->view('templates/haut');
    $this->load->view('back/menu_jury');
    $this->load->view('back/page_candidature_jury',$data);
    $this->load->view('templates/bas');
 }

 //Cette fonciton supprime un participant ainsi que ses documents 
 public function afficher_all_admin($numero)
 {
    $data['candidature'] = $this->db_model->get_all_candidatures_admin($numero);
    $data['documents'] = $this->db_model->get_all_documents($numero);

    $this->load->view('templates/haut');
    $this->load->view('back/menu_administrateur');
    $this->load->view('back/page_candidature_admin',$data);
    $this->load->view('templates/bas');
 }

}
?>