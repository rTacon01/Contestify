<br>
<br>
<br>
<?php echo validation_errors();
?>
<?php echo form_open('compte/ajouter_role_jury'); ?>
<label>Saisissez les champs pour ajouter un jury :</label><br>
<h5>Pseudo : <input type="text" name="pseudo" /></h5>
<h5>Discipline : <input type="text" name="discipline" /></h5>
<h5>L'url : <input type="text" name="url" /></h5>
<h5>Biographie : <input type="text" name="biographie" /> </h5>
<br>
<input type="submit" value="confirmer"/>
</form>