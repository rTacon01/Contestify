<br>
<br>
<br>
<?php echo validation_errors();
?>
<?php echo form_open('compte/connecter'); ?>
<label>Saisissez vos identifiants ici :</label><br>
<input type="text" name="pseudo" />
<input type="password" name="mdp" />
<input type="submit" value="Connexion"/>
</form>
