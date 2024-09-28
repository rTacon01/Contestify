<br>
<br>
<br>
<?php echo validation_errors();
?>
<?php echo form_open('compte/ajouter'); ?>
<label>Saisissez les champs pour ajouter un compte :</label><br>
<h5>Pseudo : <input type="text" name="pseudo" /></h5>
<h5>Nom : <input type="text" name="nom" /></h5>
<h5>Prénom : <input type="text" name="prenom" /></h5>
<h5>Mail : <input type="text" name="mail" /></h5>
<h5>Mot de passe : <input type="password" name="mdp" /></h5>
<h5>Confirmation mot de passe : <input type="password" name="confirmationmdp" /> </h5>
<br>
<input type="submit" value="confirmer"/>
<a href="<?php echo base_url();?>index.php/compte/lister_comptes"><button type="button" class="btn btn-danger">Annuler</button></a>
</form>