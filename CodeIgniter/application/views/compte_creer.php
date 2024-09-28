<?php
echo validation_errors();
echo form_open('compte_creer');
echo form_label('Pseudo :');
$champ1=array('name'=>'id',
 'required'=>'required');
echo form_input($champ1);
echo form_label('Mot de passe :');
$champ2=array('name'=>'mdp',
 'required'=>'required');
echo form_input($champ2);
?>
<input type="submit" name="submit" value="Créer un compte" />
</form>
