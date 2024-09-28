<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Galerie extends CI_Controller {
  public function __construct()
 {
  parent::__construct();
  $this->load->helper('url');
  $this->load->model('db_model');
  $this->load->helper('url_helper');
 }

 public function afficher($numero)
 {
    if ($numero==FALSE)
    {   
        $url=base_url(); header("Location:$url");
    }
    else{
        $data['candidature'] = $this->db_model->get_candidature3($numero);
        $data['documents'] = $this->db_model->get_all_documents_by_id($numero);

        $this->load->view('templates/haut');
        $this->load->view('back/menu_jury');
        $this->load->view('back/page_galerie',$data);
        $this->load->view('templates/bas');
    }
 }
}