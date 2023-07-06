<?php
session_start();

include "../includes/init.php";

if(isset($_GET['id'])){
  $id = $_GET['id'];
}else{
  header("Location: ../");
  die();
}

$request = $bdd->query("SELECT * FROM `ticket` WHERE id = '".$id."';");
$reponse = $request->fetch();

if($_SESSION['rank'] == 15 OR $reponse['pseudo'] == $_SESSION['pseudo']){

/*
if($reponse['pseudo'] == $_SESSION['pseudo'] || $_SESSION['rank'] >= 15){
*/

$message = json_decode($reponse['message_json'], true);
foreach ($message as $index) {
  echo nl2br($index)."<br>";
}



if(isset($_POST['addreponse'])){
  if(!empty($_POST['text_reponse'])){
  		echo "Réussi !";
      $message_new = $_SESSION['pseudo']." : ".$_POST['text_reponse'];
      array_push($message, $message_new);
      $json = json_encode($message);
			$reqaddreponse = $bdd->prepare("UPDATE `ticket` SET `message_json` = ? WHERE `id` = ?");
      $reqaddreponse->execute(array($json, $id));
  	}
	}else{
		$msg = "Veuillez remplir le champs";
}

?>

<form method="post" action="">

   <h5><textarea name="text_reponse" placeholder="Votre réponse"></textarea>
  <input type="submit" value="Envoyer" name="addreponse"></h5>

 </form>

 <?php
}else{
  header("Location: ../");
  die();
}
 ?>