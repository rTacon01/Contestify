<br>
<br>
<br>
<?php
    if($message != NULL)
    {
        echo $message;
    }
    echo validation_errors();
?>
<?php echo form_open('candidature/load_candidature'); ?>
<label>Saisissez vos identifiants de candidature ici :</label><br>
<h5>Votre code d'inscription : <input type="text" name="codeInscription" /></h5>
<h5>Votre code d'identification : <input type="text" name="codeIdentification" /></h5>
<input type="submit" value="Visualiser"/>
</form>