<br>
<br>
<br>
<?php 
 if($message != NULL)
 {
    echo $message;
 }

echo validation_errors(); ?>
<?php echo form_open('compte/connecter'); ?>
<label>Saisissez vos identifiants ici :</label><br>
<h5>Mon pseudo : <input type="text" name="pseudo" /></h5>
<h5>Mon mot de passe : <input type="text" name="mdp" /> </h5>
<input type="submit" value="Connexion"/>
</form>
