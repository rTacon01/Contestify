<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compte extends CI_Controller {


    public function __construct()
    {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('db_model');
    $this->load->helper('url_helper');
    }

    public function lister()
    {
        $data['titre'] = 'comptes';
        $data['pseudos'] = $this->db_model->get_all_compte();
        $data['comptes'] = $this->db_model->get_number_all_compte();

        $this->load->view('templates/haut');
        $this->load->view('menu_visiteur');
        $this->load->view('compte_liste',$data);
        $this->load->view('templates/bas');
    }

    public function creer()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('mdp', 'mdp', 'required');

        if ($this->form_validation->run() == FALSE)
            {// Le formulaire est invalide
            $this->load->view('templates/haut');
            $this->load->view('menu_visiteur');
            $this->load->view('compte_creer');
            $this->load->view('templates/bas');
        }
        else
        {// Le formulaire est valide
            $this->db_model->set_compte();
            $data['le_compte']=$this->input->post('id');
            $data['le_message']="Nouveau nombre de comptes : ";
            //appel de la fonction créée dans le précédent tutoriel :
            $data['le_nombre']=$this->db_model->get_nb_comptes();
            $this->load->view('templates/haut');
            $this->load->view('menu_visiteur');
            $this->load->view('compte_succes',$data);
            $this->load->view('templates/bas');
        }
    }

    public function connecter()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pseudo', 'pseudo', 'required');
        $this->form_validation->set_rules('mdp', 'mdp', 'required');
        $this -> form_validation -> set_message ( 'required' ,  'Le champ {field} est réquis pour se connecter.' );
        $data['message'] = NULL;
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/haut');
            $this->load->view('menu_visiteur');
            $this->load->view('back/compte_connecter',$data);
            $this->load->view('templates/bas');
        }
        else
        {
            $username = $this->input->post('pseudo');
            $password = $this->input->post('mdp');

            //Ajout du sel
            $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

            //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
            $password = hash('sha256', $salt.$password);
            if($this->db_model->connect_compte($username,$password))
            {
                // On définit le rôle de l'utilisateur grâce à notre fonction puis on on la stock dans une variable de session
                $data['role'] = $this->db_model->get_role($username);
                $_SESSION['role'] = $data['role'];
                
                $session_data = array('username' => $username , 'role' =>$data['role']->role );
                $this->session->set_userdata($session_data);
                
                if($this->session->userdata('role')=='O'){
                    $this->load->view('templates/haut');
                    $this->load->view('back/menu_administrateur');
                    $this->load->view('back/accueil_admin',$data);
                    $this->load->view('templates/bas');
                }
                if ($this->session->userdata('role')=='J'){
                    $this->load->view('templates/haut');
                    $this->load->view('back/menu_jury');
                    $this->load->view('back/accueil_jury',$data);
                    $this->load->view('templates/bas');
                }


                
            }
            else
            {
                $data['message'] = 'Identifiants erronés ou inexistants !';
                $this->load->view('templates/haut');
                $this->load->view('menu_visiteur');
                $this->load->view('back/compte_connecter',$data);
                $this->load->view('templates/bas');
            }
        }
    }
    
    
    public function afficher()
    {
        $username = $_SESSION['username'];
        $data['info'] = $this->db_model->get_infos($username);
        
        if($this->session->userdata('role')=='O'){
            $data['info'] = $this->db_model->get_infos($username);
            $this->load->view('templates/haut');
            $this->load->view('back/menu_administrateur');
            $this->load->view('back/profil',$data);
            $this->load->view('templates/bas');
        }
        if ($this->session->userdata('role')=='J'){
            $data['info'] = $this->db_model->get_infos_jury($username);
            $this->load->view('templates/haut');
            $this->load->view('back/menu_jury');
            $this->load->view('back/profil',$data);
            $this->load->view('templates/bas');
        }

    }

    public function modifier()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mdp', 'mdp', 'required');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('mail', 'mail', 'required');
        $this->form_validation->set_rules('confirmationmdp', 'confirmationmdp', 'required|matches[mdp]');
        $this -> form_validation -> set_message ( 'matches' ,  'Confirmation du mot de passe erronnée, veuillez réessayer !' );
        $this -> form_validation -> set_message ( 'required' ,  'Le champ de saisie {field} est vide !' );



        $username = $_SESSION['username'];

        if($this->session->userdata('role')=='O'){
            if ($this->form_validation->run() == FALSE)
            {
                $data['infos'] = $this->db_model->get_infos_compte($username);
                $this->load->view('templates/haut');
                $this->load->view('back/menu_administrateur');
                $this->load->view('back/modifier_profil',$data);
                $this->load->view('templates/bas');
            }
            else
            {
                $password = $this->input->post('mdp');
                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                $mail = $this->input->post('mail');
                $nom = addcslashes($nom);
                $prenom = addcslashes($prenom);

                //Ajout du sel
                $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

                //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
                $password = hash('sha256', $salt.$password);

                if ($this->db_model->set_informations($username, $password, $nom, $prenom,$mail))
                {
                    redirect(base_url()."index.php/compte/afficher");
                }
                else
                {
                    $this->load->view('templates/haut');
                    $this->load->view('back/menu_administrateur');
                    $this->load->view('back/modifier_profil');
                    $this->load->view('templates/bas');
                }
            }
        }
        if ($this->session->userdata('role')=='J'){

            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->set_rules('bio', 'bio', 'required');
                $this->form_validation->set_rules('discipline', 'discipline', 'required');
                $this->form_validation->set_rules('url', 'url', 'required');
                $data['infos'] = $this->db_model->get_jury($username);
                $this->load->view('templates/haut');
                $this->load->view('back/menu_jury');
                $this->load->view('back/modifier_profil',$data);
                $this->load->view('templates/bas');
            }
            else
            {
                $password = $this->input->post('mdp');
                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                $mail = $this->input->post('mail');
                $discipline = $this->input->post('discipline');
                $url = $this->input->post('url');
                $bio = $this->input->post('bio');
                $bio = addslashes($bio);
                $discipline = addcslashes($discipline);
                $nom = addcslashes($nom);
                $prenom = addcslashes($prenom);
                $data['infos'] = $this->db_model->get_jury($username);
                $numero = $data['infos']->CPT_idCompte;
    
                //Ajout du sel
                $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";
                
                
                //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
                $password = hash('sha256', $salt.$password);

                if ($this->db_model->set_informations($username, $password, $nom, $prenom,$mail) && $this->db_model->set_informations_jury($numero, $discipline, $url, $bio))
                {
                    redirect(base_url()."index.php/compte/afficher");
                }
                else
                {
                    $this->load->view('templates/haut');
                    $this->load->view('back/menu_jury');
                    $this->load->view('back/modifier_profil');
                    $this->load->view('templates/bas');
                }
            }
        }
    }

    //Fonction qui déconnecte la session d'un utilisateur
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect(base_url()."index.php/accueil/afficher");
    }

    // Fonction qui affiche tous les comptes présents dans la BDD
    public function lister_comptes()
    {
        $data['comptes'] = $this->db_model->get_all_comptes_statut();
        $data['message'] = NULL;
        $this->load->view('templates/haut');
        $this->load->view('back/menu_administrateur');
        $this->load->view('back/gestion_comptes',$data);
        $this->load->view('templates/bas');
    }


    public function ajouter()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pseudo', 'pseudo', 'required|is_unique[t_compte_CPT.CPT_pseudo]');
        $this->form_validation->set_rules('mdp', 'mdp', 'required');
        $this->form_validation->set_rules('confirmationmdp', 'confirmationmdp', 'required|matches[mdp]');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('mail', 'mail', 'required|valid_email');
        $this -> form_validation -> set_message ( 'valid_email' ,  'Merci de mettre une adresse email valide.' );
        $this -> form_validation -> set_message ( 'matches' ,  'Merci de mettre le même mot de passe.' );
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/haut');
            $this->load->view('back/menu_administrateur');
            $this->load->view('back/ajout_compte');
            $this->load->view('templates/bas');
        }
        else
        {
            //Récrupération des champs pour les ajouter dans la BDD
            $pseudo = $this->input->post('pseudo');
            $password = $this->input->post('mdp');
            $pseudo = addcslashes($pseudo);

            //Ajout du sel
            $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

            //On ajoute le hash et le sel pour former le mot de passe présent dans la BDD
            $password = hash('sha256', $salt.$password);

            $nom = $this->input->post('nom');
            $nom = addcslashes($nom);
            $prenom = $this->input->post('prenom');
            $prenom = addcslashes($prenom);
            $mail = $this->input->post('mail');
            $accept = $this->db_model->add_compte($pseudo,$password,$nom,$prenom,$mail);
            if($accept == true)
            {
                $data['message'] = "compte ajouté !";
                $data['infos'] = $this->db_model->get_infos_compte($pseudo);
                $this->load->view('templates/haut');
                $this->load->view('back/menu_administrateur');
                $this->load->view('back/ajout_role',$data);
                $this->load->view('templates/bas');
                
            }
            else
            {
                $data['message'] = "Veillez saisir tous les champs et/ou ne pas mettre des informations érronées !";
                $this->load->view('templates/haut');
                $this->load->view('back/menu_administrateur');
                $this->load->view('back/accueil_admin',$data);
                $this->load->view('templates/bas');
            }
        }
    }

    public function ajouter_role_admin($numero)
    {
        if($this->db_model->set_admin($numero))
        {
                $data['message'] = "compte + rôle ajouté !";
                $this->load->view('templates/haut');
                $this->load->view('back/menu_administrateur');
                $this->load->view('back/accueil_admin',$data);
                $this->load->view('templates/bas');
        }
    }

    public function ajouter_role_jury()
    {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('biographie', 'biographie', 'required');
            $this->form_validation->set_rules('pseudo', 'pseudo', 'required');
            $this->form_validation->set_rules('url', 'url', 'required');
            $this->form_validation->set_rules('discipline', 'discipline', 'required');
            $this -> form_validation -> set_message ( 'required' ,  'Le champ de saisie {field} est vide !' );
    
    
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/haut');
                $this->load->view('back/menu_administrateur');
                $this->load->view('back/ajout_jury');
                $this->load->view('templates/bas');
            }
            else{
                $discipline = $this->input->post('discipline');
                $url = $this->input->post('url');
                $bio = $this->input->post('discipline');
                $bio = addslashes($bio);
                $pseudo = $this->input->post('pseudo');
                $data['info'] = $this->db_model->get_infos_compte($pseudo);
                $numero = $data['info']->CPT_idCompte;

                
                if($this->db_model->set_jury($numero, $discipline, $url, $bio))
                {
                    $data['message'] = "compte + rôle ajouté !";
                    $this->load->view('templates/haut');
                    $this->load->view('back/menu_administrateur');
                    $this->load->view('back/accueil_admin',$data);
                    $this->load->view('templates/bas');
                }
                else{
    
                }
                
            }
    }    
}
