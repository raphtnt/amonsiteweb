<?php
session_start();

include "includes/init.php";

if(isset($_POST['forminscription'])){

  $pseudo = htmlspecialchars($_POST['pseudo']);
  $email = htmlspecialchars($_POST['email']);
  $email2 = htmlspecialchars($_POST['email2']);
  $mdp = sha1($_POST['mdp']);
  $mdp2 = sha1($_POST['mdp2']);

  if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])){

    $pseudolength = strlen($pseudo);
    if($pseudolength <= 255){
      if($email == $email2){
       if(filter_var($email, FILTER_VALIDATE_EMAIL)){

      $reqpseudo = $bdd->prepare("SELECT * FROM member WHERE pseudo=?");
      $reqpseudo->execute(array($pseudo));
      $pseudoexist = $reqpseudo->rowCount();

      $reqmail = $bdd->prepare("SELECT * FROM member WHERE mail=?");
      $reqmail->execute(array($email));
      $mailexist = $reqmail->rowCount();
    if($pseudoexist == 0){
      if($mailexist == 0){

        if($mdp == $mdp2){
            $insertmember = $bdd->prepare("INSERT INTO member (pseudo, mail, password) VALUES (?, ?, ?)");
            $insertmember->execute(array($pseudo, $email, $mdp));
            $msg = "Vous etes inscrit !";

        }else{
          $msg = "Votre mot de passe et la confirmations de votre mot de passe n'est pas identique !";
        }
      }else{
        $msg = "Adresse mail déjà utilisé !";
      }
    }else{
      $msg = "Pseudo déjà utilisé !";
    }
      }else{
        $msg = "Votre addresse mail n'est pas valide !";
      }
      }else{
        $msg = "Votre mail et la confirmations de votre email ne sont pas identique !";
      }
    }else{
      $msg = "Votre pseudo ne peux pas etre au dessus de 255 caracteres !";
    }

  }else{
    $msg = "Vous n'avez pas remplis tout les champs !";
  }
}

 ?>

<!DOCTYPE html>
<html>
				<title>GL - Inscription</title>
<head>
 <style>
 .form-horizontal{text-align: center !important;}
 </style>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

  <h1 style="padding-left: 125px;">Inscription</h1>

  <form method="POST" action="">
	<table>
		<tr>
		<td align="right">
			<label for="pseudo">Pseudo : </label>
	</td>
		<td>
			<input type="text" placeholder="Pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>" />
	</td>
</tr>

		<tr>
		<td align="right">
			<label for="email">Mail : </label>
	</td>
		<td>
			<input type="email" placeholder="EMail" id="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>" />
	</td>
</tr>

		<tr>
		<td align="right">
			<label for="email2">Confirmation de l'email : </label>
	</td>
		<td>
			<input type="email" placeholder="Confirmation de l'email" id="email2" name="email2" value="<?php if(isset($email2)) {echo $email2;} ?>" />
	</td>
</tr>

		<tr>
		<td align="right">
			<label for="mdp">Mot de passe : </label>
	</td>
		<td>
			<input type="password" placeholder="Mot de passe" id="mdp" name="mdp" />
	</td>
</tr>

		<tr>
		<td align="right">
			<label for="mdp2">Confirmation du mot de passe : </label>
	</td>
		<td>
			<input type="password" placeholder="Confirmation du mot de passe" id="mdp2" name="mdp2" />
	</td>
</tr>
	</table>
	<br />
	<td align="center">
	<input type="submit" name="forminscription" value="S'inscrire">
</td>
		</form>
	</div>

<?php

if(isset($msg)){
  echo $msg;
}

?>

</body>

<!-- INCLUDE FOOTER HERE -->

</html>
