<h1><?php echo $titre;?></h1>
<br />
<?php
if(isset($actu)) {
echo $actu->ACT_idActualite;
echo(" -- ");
echo $actu->ACT_message;
}
else {echo "<br />";
echo "pas d’actualité !";
}
?>