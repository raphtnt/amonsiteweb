<?php
session_start();

try{
//	$bdd = new PDO('mysql:host=127.0.0.1;dbname=altislife;charset=utf8', 'root', 'spl159875321');
	$bdd = new PDO('mysql:host=51.91.114.91;dbname=monsiteweb;charset=utf8', 'raph', 'Oplk259');
}
catch (Exception $e){
        die('[BDD] Erreur : ' . $e->getMessage());
}

if(isset($_GET['uid']) AND $_GET['uid'] > 0){

   $getid = intval($_GET['uid']);
   $gplayer = $bdd->prepare("SELECT * FROM players WHERE uid = ?");
   $gplayer->execute(array($getid));
   $gplayerinfo = $gplayer->fetch();

}

?>

<!-- Commence ICI 22:28 -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    p{font-size: 25px !important;}
    </style>

</head>
<body>

  <div class="row">
   <div class="col-sm-6">

    <div class="panel panel-info">
     <div class="panel-heading">Informations sur le joueurs</div>
     <div class="panel-body">

        <div class="row">
     <div class="col-sm-6">

       <h3>Nom du joueur<p><?= $gplayerinfo['name'] ?></p></h3><br>
       <h3>Cash<p>

         <?php

         $addnoteautocheater = "A dépassé les 15 Millions (A surveillé !)";
         $pid = $gplayerinfo['pid'];
         $gbankacc = $gplayerinfo['bankacc'];
         $cash = $gplayerinfo['cash'];
         $maxcash = "1500000";

         switch ($cash) {
             case 0:
                 echo "<span style=\"color: green; \">Le joueur n'a pas d'argent sur lui</span>";
                 break;
             case $cash < $maxcash:
                 echo "<span style=\"color: green; \">Le joueur a $cash</span>";
                 break;
             case $cash >= $maxcash:
                 echo "<span style=\"color: red; \">Le joueur a $cash </span>";
                 break;
         }

          ?>


       </p></h3><br>
       <h3>Cop Level<p>
    <?php
       switch ($gplayerinfo['coplevel']) {
           case 0:
               echo "N'est pas policier";
               break;
           case 1:
               echo "Est une recrue";
               break;
           case 2:
               echo "Est un fdp";
               break;
       }
    ?>
  </p></h3><br>


			<h3>Admin Level<p>
		<?php
			switch ($gplayerinfo['adminlevel']) {
					case 0:
							echo "N'est pas membre du staff";
							break;
					case 1:
							echo "Est un Modérateur";
							break;
					case 2:
							echo "Est Administrateur";
							break;
					case 3:
							echo "Est Fondateur";
							break;
			}
		?>
	</p></h3><br>

	<h3>Admin Level<p>
<?php
	switch ($gplayerinfo['blacklist']) {
			case 0:
					echo "Ce joueur n'est pas blacklisté.";
					break;
			case 1:
					echo "Ce joueur est blacklisté.";
					break;
	}
?>
</p></h3><br>

<h3>Premiere connection<p><?= $gplayerinfo['insert_time'] ?></p></h3>

     </div>
     <div class="col-sm-6">

       <h3>UID (Player ID)<p><?= $gplayerinfo['pid'] ?></p></h3><br>
       <h3>Banque<p><?= $gplayerinfo['bankacc'] ?></p></h3><br>
       <h3>Medic Level<p>
         <?php
         switch ($gplayerinfo['mediclevel']) {
             case 0:
                 echo "N'est pas medecin";
                 break;
             case 1:
                 echo "Est une sapeur";
                 break;
             case 2:
                 echo "Est un fdp";
                 break;
         }
          ?>
        </p></h3><br>

				<h3>Donateur Level<p>
			<?php
				switch ($gplayerinfo['donorlevel']) {
						case 0:
								echo "N'est pas donateur";
								break;
						case 1:
								echo "Est Donateur de niveau 1";
								break;
						case 2:
								echo "Est Donateur de niveau 2";
								break;
						case 3:
								echo "Est Donateur de niveau 3";
								break;
				}
			?>
		</p></h3><br>

				<h3>Temps joué<p> <?= $gplayerinfo['playtime'] ?></p></h3><br>

		<h3>Derniere connection<p><?= $gplayerinfo['last_seen'] ?></p></h3><br>

     </div>
    </div>
     </div>
   </div>

   </div>
   <div class="col-sm-6"></div>
	 <div class="panel panel-primary">
	<div class="panel-heading">Edit les joueurs</div>
	<div class="panel-body">

<?php

/*
|-------------------|
|-| Remboursement |-|
|-------------------|
*/

if(isset($_POST['addcash'])){
	$textaddcash = htmlspecialchars($_POST['textaddcash']);
	$addcashreason = htmlspecialchars($_POST['reason']);
	$troll = $gplayerinfo['bankacc'];
	$nameofplayer = $gplayerinfo['name'];
	$pidremboursement = $gplayerinfo['pid'];
	$typeremboursement = "Remboursement";
	$pseudo_admin = $_SESSION['pseudo'];
	$sommetotal = $textaddcash + $troll;
  if(!empty($_POST['textaddcash']) && !empty($_POST['reason'])){
  	if($textaddcash > 1 && $textaddcash < 110000000){
  		echo "Réussi !";
      $reqaddcash = $bdd->prepare("UPDATE players SET bankacc=$sommetotal WHERE uid = $getid");
      $reqaddcash->execute(array($sommetotal));
			$reqaddbank = $bdd->prepare("INSERT INTO informations (pid, nameofplayer, type, reason, somme_rembourse, pseudo_admin) VALUES (?, ?, ?, ?, ?, ?)");
			$reqaddbank->execute(array($pidremboursement, $nameofplayer, $typeremboursement, $addcashreason, $textaddcash, $pseudo_admin)); // $reqaddbank
  	}else{
  	$msg = "Veuillez mettre un nombre valade entre 0 a 100000000 !";
  	}
}else{
	$msg = "Veuillez remplir le champs";
   }
}

/*

|-------------------|
|-| Avertissement |-|
|-------------------|

*/

if(isset($_POST['addwarning'])){
	$warning_reason = htmlspecialchars($_POST['text_warrning']);
	$nameofplayerwarning = $gplayerinfo['name'];
	$pidwarning = $gplayerinfo['pid'];
	$typewarning = "Avertissement";
	$pseudo_admin = $_SESSION['pseudo'];
  if(!empty($_POST['text_warrning'])){
  		echo "Réussi !";
			$reqaddwarning = $bdd->prepare("INSERT INTO informations (pid, nameofplayer, type, reason, pseudo_admin) VALUES (?, ?, ?, ?, ?)");
			$reqaddwarning->execute(array($pidwarning, $nameofplayerwarning, $typewarning, $warning_reason, $pseudo_admin)); // $reqaddbank
  	}
	}else{
		$msg = "Veuillez remplir le champs";
}



/*

|-------------------|
|-|     Note      |-|
|-------------------|

*/

if(isset($_POST['addnote'])){
	$note_reason = htmlspecialchars($_POST['text_note']);
	$nameofplayernote = $gplayerinfo['name'];
	$pidnote = $gplayerinfo['pid'];
	$typenote = "Note";
	$pseudo_admin = $_SESSION['pseudo'];
  if(!empty($_POST['text_note'])){
  		echo "Réussi !";
			$reqaddnote = $bdd->prepare("INSERT INTO informations (pid, nameofplayer, type, reason, pseudo_admin) VALUES (?, ?, ?, ?, ?)");
			$reqaddnote->execute(array($pidnote, $nameofplayernote, $typenote, $note_reason, $pseudo_admin)); // $reqaddbank
  	}
	}else{
		$msg = "Veuillez remplir le champs";
}



?>

<form method="post" action="">

	<!-- Remboursement -->

		<h5>Ajouté <input type="text" name="textaddcash" placeholder="Noté la somme à rajouté"> a la banque, raison :
		<input type="text" name="reason" placeholder="raison du remboursement">
		<input type="submit" value="Confirmé" name="addcash"><br></h5>

<!-- Avertissement -->

		<h5>Ajouté <input type="text" name="text_warrning" placeholder="Avertissement">
	 <input type="submit" value="Confirmé" name="addwarning"></h5>

<!-- Note -->

		<h5>Ajouté <input type="text" name="text_note" placeholder="Note">
	 <input type="submit" value="Confirmé" name="addnote"></h5>


	</form>
		</div>
	</div>
</div>
<div class="container">
<h2>Liste des avertissements / remboursement</h2>
<p>Recherche ce que tu souhaites.</p>
<div class="panel panel-primary">
<div class="panel-heading">Avertissements / Remboursement
</div>
<div class="panel-footer">
<input class="form-control" id="myInput" type="text" placeholder="Recherche">
<br>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>pid</th>
			<th>Nom</th>
			<th>Type</<th>
			<th>Raison</th>
			<th>Somme du remboursement</th>
			<?php
			if($_SESSION['rank'] >= 35){
			echo "<th>Nom de l'administrateur</th>";
		}
			?>
		</tr>
	</thead>
	<tbody id="myTable">
		<tr>
			<?php

			$pid = $gplayerinfo['pid'];
			$gplayerinfos = $bdd->query("SELECT * FROM informations WHERE pid = '$pid'");

			while ($gplayerinfonote = $gplayerinfos->fetch()){

			?>
			<td><?= $gplayerinfonote['pid']; ?> </td>
			<td><?= $gplayerinfonote['nameofplayer']; ?></td>
			<td><?= $gplayerinfonote['type']; ?></td>
			<td><?= $gplayerinfonote['reason']; ?></td>
			<td><?= $gplayerinfonote['somme_rembourse']; ?></td>
			<?php
			if($_SESSION['rank'] >= 35){
				echo "<td>$gplayerinfonote['pseudo_admin'];</td>";
			}
			?>
		</tr>
<?php
} // Fermeture de la boucle while
$gplayer->closeCursor();
?>
	</tbody>
</table>
	</div>
</div>
</div>

<script>
$(document).ready(function(){
$("#myInput").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	$("#myTable tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
});
});
</script>
</body>

<!-- Include footer HERE -->

</html>


<?php

if(isset($msg)){
  echo $msg;
}

?>
