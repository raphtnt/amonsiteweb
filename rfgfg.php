
/*
if(isset($_POST['addreponse'])){
	$json = htmlspecialchars($_POST['message_json']);
	$id = $_GET['id'];
  if(!empty($_POST['text_reponse'])){
  		echo "Réussi !";
			$reqaddreponse = $bdd->prepare("UPDATE `ticket` SET `message_json`='".$json."' WHERE id = '".$id."';");
  	}
	}else{
		$msg = "Veuillez remplir le champs";
}
*/

if(isset($_POST['addreponse'])){
  if(!empty($_POST['text_reponse'])){
  		echo "Réussi !";
      $message_new = $_SESSION['pseudo']." : MESSAGE2";
      array_push($message, $message_new);
      $json = json_encode($message);
      echo $json;
			$reqaddreponse = $bdd->prepare("UPDATE `ticket` SET `message_json` = ? WHERE `id` = ?");
      $reqaddreponse->execute(array($json, $id)); // $reqaddbank
  	}
	}else{
		$msg = "Veuillez remplir le champs";
}


 <form method="post" action="">

 		<h5><textarea name="text_reponse" placeholder="Votre réponse"></textarea>
 	 <input type="submit" value="Envoyer" name="addreponse"></h5>

 	</form>
