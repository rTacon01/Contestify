<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends CI_Controller {
  public function __construct()
 {
  parent::__construct();
  $this->load->helper('url');
  $this->load->model('db_model');
  $this->load->helper('url_helper');
 }

 public function afficher()
 {
  //Génération des données liées aux actualités 
  $data['actus'] = $this->db_model->get_all_actualite();
  $data['concours'] = $this->db_model->get_all_concours2();
  $data['message'] = NULL;

  // Chargement des 3 vues pour créer la page Web d’accueil
  $this->load->view('templates/haut');
  $this->load->view('menu_visiteur');
  $this->load->view('page_accueil',$data);
  $this->load->view('templates/bas');
  }

  public function afficher_jury()
 {

  // Chargement des 3 vues pour créer la page Web d'un membre du jury
  $this->load->view('templates/haut');
  $this->load->view('back/menu_jury');
  $this->load->view('back/accueil_jury');
  $this->load->view('templates/bas');
  }

  public function afficher_admin()
 {
  // Chargement des 3 vues pour créer la page Web d’accueil d'un admin
  $data['message']= NULL;
  $this->load->view('templates/haut');
  $this->load->view('back/menu_administrateur');
  $this->load->view('back/accueil_admin',$data);
  $this->load->view('templates/bas');
  }
}
?>