<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Concours extends CI_Controller {
  public function __construct()
 {
  parent::__construct();
  $this->load->helper('url');
  $this->load->model('db_model');
  $this->load->helper('url_helper');
 }

 public function afficher()
 {
  $data['concours'] = $this->db_model->get_all_concours();
  // Chargement des 3 vues pour créer la page Web des concours
  $this->load->view('templates/haut');
  $this->load->view('menu_visiteur');
  $this->load->view('page_concours',$data);
  $this->load->view('templates/bas');
  }

  public function afficher_jury()
  {
    $username = $_SESSION['username'];
   $data['concours'] = $this->db_model->get_all_concours_jury($username);
   // Chargement des 3 vues pour créer la page Web des concours
   $this->load->view('templates/haut');
   $this->load->view('back/menu_jury');
   $this->load->view('back/page_concours_jury',$data);
   $this->load->view('templates/bas');
   }

   public function afficher_admin()
   {
    $data['concours'] = $this->db_model->get_all_concours_admin();
    // Chargement des 3 vues pour créer la page Web des concours
    $this->load->view('templates/haut');
    $this->load->view('back/menu_administrateur');
    $this->load->view('back/page_concours_admin',$data);
    $this->load->view('templates/bas');
    }
}
?>