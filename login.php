<?php
session_start();

include "includes/init.php";

if(isset($_POST['connect'])){
  $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
  $mdpconnect = sha1($_POST['mdpconnect']);
  if(!empty($pseudoconnect) AND !empty($mdpconnect)){

    $requser = $bdd->prepare("SELECT * FROM member WHERE pseudo = ? AND password = ?");
    $requser->execute(array($pseudoconnect, $mdpconnect));
    $userexist = $requser->rowCount();
    if($userexist == 1){
      $userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['rank'] = $userinfo['rank'];
      header("Location: ./");
    }else {
      $msg = "<br><div style=\"color:red;text-align:center;\">Mauvais identifiant";
    }

  }else{
    $msg = "<br><div style=\"color:red;text-align:center;\">Vous n'avez pas remplis tous les champs,<br>Veuillez les remplirs tous !";
  }
}

?>

<!DOCTYPE html>
<html>
        <title>GL - Login</title>
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
<div style="text-align: center;">
  <h1>Se connecté</h1><br>

  <form method="POST" action="">
    <input type="text" name="pseudoconnect" placeholder="Votre pseudo" /><br>
    <input type="password" name="mdpconnect" placeholder="Votre mot de passe" /><br><br>
    <input type="submit" name="connect" placeholder="Se connecté" />
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
