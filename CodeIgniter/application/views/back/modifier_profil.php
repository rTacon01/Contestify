<br>
<br>
<br>
<?php echo validation_errors();
?>
<?php echo form_open('compte/modifier'); ?>
<label>Saisissez vos nouvelles informations ici :</label><br>
<h5>Nouveau nom : <input type="text" name="nom" value="<?php echo $infos->CPT_nom;?>"/></h5>
<h5>Nouveau prénom : <input type="text" name="prenom" value="<?php echo $infos->CPT_prenom;?>"/></h5>
<h5>Nouveau mail : <input type="text" name="mail" value="<?php echo $infos->CPT_mail;?>"/></h5>
<?php if($this->session->userdata('role')=='J')
{
?>
<h5>Nouvelle discipline : <input type="text" name="discipline" value="<?php echo $infos->JRY_discipline;?>" /></h5>
<h5>Nouveau url : <input type="text" name="url" value="<?php echo $infos->JRY_url;?>" /></h5>
<h5>Noubelle bio : <input type="text" name="bio" value="<?php echo $infos->JRY_bio;?>" /></h5>
<?php
}
?>
<h5>Nouveau mot de passe : <input type="password" name="mdp" /></h5>
<h5> Confirmation nouveau mot de passe : <input type="password" name="confirmationmdp" /></h5>
<input type="submit" value="confirmer"/>
<a href="<?php echo base_url();?>index.php/compte/afficher"><button type="button" class="btn btn-danger">Annuler</button></a>
</form>