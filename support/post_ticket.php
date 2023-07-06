<?php
session_start();

include "../includes/init.php";


if(isset($_POST['addticket'])){
  if(!empty($_POST['title']) AND !empty($_POST['objet']) AND !empty($_POST['messagejson'])){
  		echo "Réussi !";

      $pseudo = $_SESSION['pseudo'];
      $title = htmlspecialchars($_POST['title']);
      $objet = htmlspecialchars($_POST['objet']);
      $messagejsons = json_encode(array($pseudo.' : '.$_POST['messagejson']));
			$reqaddticket = $bdd->prepare("INSERT INTO ticket (title, objet, pseudo, message_json) VALUES (?,?,?,?)");
      $reqaddticket->execute(array($title, $objet, $pseudo, $messagejsons));
  	}
	}else{
		$msg = "Veuillez remplir le champs";
}

?>
<style>
	
	.center{
		text-align: center;
		color: #474E5D;
	}

</style>
<form method="post" action="">
<div class="center">
  <h3>Titre : <input type="text" name="title" placeholder="Votre réponse"><br></h3>
  <h3>Objet : <input type="Objet" name="title" placeholder="Votre réponse"><br></h3>
  <!--
  <select name="categoris">
    <option value="prp">Probleme RP</option>
    <option value="rbs">Remboursement</option>
    <option value="dde">Demande d'entreprise</option>
    <option value="ddfr">Demande de famille rebelle</option>
  </select><br> -->

  <h3>Contenu : <textarea name="messagejson" placeholder="Votre réponse"></textarea></h3>
  <input type="submit" value="Envoyer" name="addticket">
	</div>
</form>