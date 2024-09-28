<?php
class Db_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    //Fonction d'affichage des comptes
    public function get_all_compte()
    {
        $query = $this->db->query("SELECT CPT_pseudo FROM t_compte_CPT;");
        return $query->result_array();
    }

    //Fonction d'affichage d'une actualité selon son ID
    public function get_actualite($numero)
    {
        $query = $this->db->query("SELECT ACT_idActualite, ACT_message FROM t_actualite_ACT WHERE
        ACT_idActualite=".$numero." AND ACT_activation = 'O';");
        return $query->row();
    }

    //Fonction d'affichage des actualités
    public function get_all_actualite()
    {
        $query = $this->db->query("SELECT CPT_pseudo, ACT_titreActualite, ACT_message, ACT_dateActualite 
                                   FROM t_actualite_ACT 
                                   JOIN t_compte_organisateur_ORG USING(CPT_idCompte)
                                   JOIN t_compte_CPT USING(CPT_idCompte);");
        return $query->result_array();
    }

    //Fonction d'affichage du nombre de comptes
    public function get_number_all_compte()
    {
        $query = $this->db->query("SELECT COUNT(CPT_idCompte) AS NbCompte FROM t_compte_CPT;");
        return $query->row();
    }

    //Fonction d'affichage des concours selon le pseudo de l'organisateur, sa date de début, sa date de fin, ses catégories, ses jurys...
    public function get_all_concours()
    {
        $query = $this->db->query("SELECT CCS_nomConcours, ORG.CPT_pseudo AS PseudoDeLorganisateur, CCS_dateDebut, CCS_dateFin, donner_categorie(CCS_idConcours) AS NomCategorie, donner_jury(CCS_idConcours) AS jury, phase_concours(t_concours_CCS.CCS_idConcours) AS PhaseConcours
                                    FROM t_concours_CCS
                                    RIGHT OUTER JOIN  t_compte_organisateur_ORG ON t_concours_CCS.CPT_idCompte = t_compte_organisateur_ORG.CPT_idCompte
                                    LEFT OUTER JOIN t_compte_CPT ORG ON ORG.CPT_idCompte = t_compte_organisateur_ORG.CPT_idCompte
                                    ORDER BY CCS_dateDebut");
        return $query->result_array();
    }

    //Fonction d'affichage des concours en affichant que leur nom et l'intro du concours
    public function get_all_concours2()
    {
        $query = $this->db->query("SELECT CCS_nomConcours, CCS_intro, CCS_imageConcours FROM t_concours_CCS");
        return $query->result_array();
    }

    //Fonction d'affichage d'une candidature ainsi que ses documents
    public function get_candidature($numero)
    {
        $query = $this->db->query("SELECT PTT_nom, PTT_prenom, PTT_mail, PTT_statutParticipant, PTT_dateInscription, CAT_nom, CCS_nomConcours 
                                    FROM t_participant_PTT 
                                    JOIN t_categorie_CAT USING(CAT_idCategorie)
                                    JOIN t_concours_CCS USING(CCS_idConcours) 
                                    WHERE PTT_codeInscription = '".$numero."';");
        return $query->row();
    }

    //Fonction d'affichage des concours en affichant que leur nom et l'intro du concours
    public function get_all_documents($numero)
    {
        $query = $this->db->query("SELECT DCT_chemin FROM t_participant_PTT JOIN t_document_DCT USING(PTT_idParticipant) WHERE PTT_codeInscription = '".$numero."';");
        return $query->result_array();
    }

    //Fonction d'affichage des documents par l'id du participant
    public function get_all_documents_by_id($numero)
    {
        $query = $this->db->query("SELECT DCT_chemin FROM t_participant_PTT JOIN t_document_DCT USING(PTT_idParticipant) WHERE PTT_idParticipant = '".$numero."';");
        return $query->result_array();
    }

    // Fonction créée et testée dans le précédent tutoriel
    public function get_nb_comptes()
    {   
        $query=$this->db->query("SELECT COUNT(*) as nb FROM t_compte_CPT;");
        return $query->row();
    }

    // Fonction qui insère une ligne dans la table des comptes
    public function set_compte()
    {   
        $this->load->helper('url');

        $id=$this->input->post('id');
        $mdp=$this->input->post('mdp');
        $req="INSERT INTO t_compte_CPT( CPT_pseudo, CPT_motDePasse, CPT_nom, CPT_prenom, CPT_activation) VALUES ('".$id."','".$mdp."','".$id."','".$id."','N');";
        $query = $this->db->query($req);
        return ($query);
    }

    public function connect_compte($username, $password)
    {
        $query =$this->db->query("SELECT CPT_pseudo,CPT_motDePasse
                                  FROM t_compte_CPT
                                  WHERE CPT_pseudo='".$username."'
                                  AND CPT_motDePasse='".$password."';");
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Fonction qui retourne le rôle de l'utilisateur
    public function get_role($username)
    {   
        $query=$this->db->query("SELECT donner_role('".$username."') AS role;");
        return $query->row();
    }

    // Fonction qui retourne toutes les informations du compte en fonction de son pseudo
    public function get_infos($username)
    {   
        $query=$this->db->query("SELECT * FROM t_compte_CPT WHERE CPT_pseudo = '".$username."' ; ");
        return $query->row();
    }

    // Fonction qui retourne toutes les informations du compte en fonction de son pseudo
    public function get_infos_jury($username)
    {   
        $query=$this->db->query("SELECT CPT_pseudo, CPT_motDePasse, CPT_nom, CPT_prenom , JRY_discipline, JRY_url, JRY_bio
                                 FROM t_compte_jury_JRY
                                 JOIN t_compte_CPT USING(CPT_idCompte)
                                 WHERE CPT_pseudo = '".$username."' ;");
        return $query->row();
    }

    // Fonction modifie le mot de passe de la personne suivant son pseudo
    public function set_infos($username, $password)
    {   
        $query=$this->db->query("UPDATE t_compte_CPT
                                 SET CPT_motDePasse = '".$password."' 
                                 WHERE CPT_pseudo = '".$username."';");
        return true;
    }

    // Fonction qui modifie les informations d'un compte sauf son pseudo
    public function set_informations($username, $password, $nom, $prenom, $mail)
    {   
        $query=$this->db->query("UPDATE t_compte_CPT SET CPT_motDePasse='".$password."',CPT_nom='".$nom."',CPT_prenom='".$prenom."',CPT_mail='".$mail."'
                                WHERE CPT_pseudo = '".$username."';");
        return true;
    }
    // Fonction modifie les champs d'un compte de jury
    public function set_informations_jury($numero, $discipline, $url, $bio)
    {   
        $query=$this->db->query("UPDATE t_compte_jury_JRY SET JRY_discipline= '".$discipline."', JRY_url='".$url."', JRY_bio='".$bio."'
                                WHERE CPT_idCompte = '".$numero."';");
        return true;
    }

    // Fonciton qui retourne tous les concours auquel il est jury
    public function get_all_concours_jury($username)
    {
        $query = $this->db->query("SELECT CCS_idConcours, CCS_nomConcours, CCS_dateDebut, CCS_dateFin, donner_categorie(CCS_idConcours) AS NomCategorie, phase_concours(t_concours_CCS.CCS_idConcours) AS PhaseConcours
                                   FROM t_compte_CPT
                                   JOIN t_compte_jury_JRY USING(CPT_idCompte)
                                   JOIN t_siege_SGE USING(CPT_idCompte)
                                   JOIN t_concours_CCS USING(CCS_idConcours)
                                   WHERE CPT_pseudo = '".$username."'
                                   ORDER BY CCS_dateDebut, NomCategorie;");
        return $query->result_array();
    }

    //Fonction d'affichage des candidatures selon l'id du concours
    public function get_all_candidatures($numero)
    {
        $query = $this->db->query("SELECT PTT_idParticipant, PTT_nom, PTT_prenom, PTT_mail, PTT_statutParticipant, PTT_dateInscription
                                   FROM t_concours_CCS
                                   JOIN t_participant_PTT USING(CCS_idConcours)
                                   WHERE CCS_idConcours = ".$numero.";");
        return $query->result_array();
    }

    //Fonction d'affichage d'une candidature ainsi que ses documents
    public function get_candidature2($inscription,$identification)
    {
        $query = $this->db->query("SELECT PTT_idParticipant, PTT_nom, PTT_prenom, PTT_mail, PTT_statutParticipant, PTT_dateInscription, CAT_nom, CCS_nomConcours 
                                    FROM t_participant_PTT 
                                    JOIN t_categorie_CAT USING(CAT_idCategorie)
                                    JOIN t_concours_CCS USING(CCS_idConcours) 
                                    WHERE PTT_codeInscription = '".$inscription."'
                                    AND PTT_codeIdentification = '".$identification."' ;");
        return $query->row();
    }

    //Fonction d'affichage d'une candidature en fonction de l'id du participant
    public function get_candidature3($numero)
    {
        $query = $this->db->query("SELECT PTT_idParticipant, PTT_nom, PTT_prenom, PTT_codeInscription, PTT_codeIdentification, PTT_dateInscription, PTT_mail, PTT_statutParticipant
                                    FROM t_participant_PTT 
                                    WHERE PTT_idParticipant = ".$numero." ;");
        return $query->row();
    }

    // Fonction modifie le mot de passe de la personne suivant son pseudo
    public function delete_candidature($inscription,$identification)
    {   
        $query=$this->db->query("DELETE FROM t_participant_PTT WHERE PTT_codeInscription = '".$inscription."' AND PTT_codeIdentification = '".$identification."';");
        return true;
    }

    // Fonction modifie le mot de passe de la personne suivant son pseudo
    public function delete_documents($numero)
    {   
        $query=$this->db->query("DELETE FROM t_document_DCT WHERE PTT_idParticipant = ".$numero.";");
        return true;
    } 

    //Fonction d'affichage des comptes ainsi que leur statut et leur état
    public function get_all_comptes_statut()
    {
        $query = $this->db->query("SELECT CPT_pseudo, CPT_prenom, CPT_nom, CPT_mail, CPT_activation, donner_role(CPT_pseudo)AS CPT_Statut FROM t_compte_CPT;");
        return $query->result_array();
    }

    //Fonction qui ajoute un compte dans la BDD
    public function add_compte($pseudo,$password,$nom,$prenom,$mail)
    {
        $query = $this->db->query("INSERT INTO t_compte_CPT(CPT_pseudo, CPT_motDePasse, CPT_nom, CPT_prenom, CPT_mail, CPT_activation) 
                                   VALUES ('".$pseudo."','".$password."','".$nom."','".$prenom."','".$mail."','O');");
        return true;
    }

    // Fonciton qui retourne tous les concours pour les administrateurs
    public function get_all_concours_admin()
    {
        $query = $this->db->query("SELECT CCS_idConcours, CCS_nomConcours, CCS_dateDebut, CCS_dateFin, donner_categorie(CCS_idConcours) AS NomCategorie, phase_concours(t_concours_CCS.CCS_idConcours) AS PhaseConcours, donner_nbCandidature(CCS_idConcours) AS NbCandidature
                                   FROM t_concours_CCS
                                   ORDER BY CCS_dateDebut, NomCategorie;");
        return $query->result_array();
    }

    //Fonction d'affichage des candidatures selon l'id du concours pour un admin
    public function get_all_candidatures_admin($numero)
    {
        $query = $this->db->query("SELECT PTT_idParticipant, PTT_nom, PTT_prenom, PTT_mail, PTT_statutParticipant, PTT_dateInscription, CAT_nom
                                   FROM t_concours_CCS
                                   JOIN t_participant_PTT USING(CCS_idConcours)
                                   JOIN t_categorie_CAT USING(CAT_idCategorie)
                                   WHERE CCS_idConcours = ".$numero."
                                   ORDER BY CAT_nom ;");
        return $query->result_array();
    }

    //Fonction qui retourne les informations d'un compte dans la table des comptes selon son pseudo
    public function get_infos_compte($username)
    {
        $query=$this->db->query("SELECT * FROM t_compte_CPT
        WHERE  CPT_pseudo= '".$username."' ; ");
        return $query->row();
    }

    // Fonction qui retourne toutes les informations d'un membre du jury selon son pseudo
    public function get_jury($username)
    {
        $query = $this->db->query("SELECT CPT_idCompte,CPT_pseudo, CPT_motDePasse, CPT_nom, CPT_mail, CPT_prenom , JRY_discipline, JRY_url, JRY_bio
        FROM t_compte_jury_JRY
        JOIN t_compte_CPT USING(CPT_idCompte)
        WHERE CPT_pseudo = '".$username."';");
        return $query->row();
    }

    // Fonction qui ajoute un organisateur 
    public function set_admin($numero)
    {
        $query = $this->db->query("INSERT INTO t_compte_organisateur_ORG(CPT_idCompte) VALUES ('".$numero."');");
        return true;
    }

    // Fonction qui ajoute un jury
    public function set_jury($numero, $discipline, $url, $bio)
    {
        $query = $this->db->query("INSERT INTO t_compte_jury_JRY(CPT_idCompte, JRY_discipline, JRY_url, JRY_bio) VALUES ('".$numero."','".$discipline."','".$url."','".$bio."');");
        return true;
    }

}
?>