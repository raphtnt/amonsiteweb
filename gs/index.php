<?php
session_start();

if(isset($_SESSION['id'])){
	if($_SESSION['rank'] >= 15){

	


 ?>

<html lang="en">
<head>
  <title>GL - DashBoard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h2>Bienvenue <?= $_SESSION['pseudo']; ?></h2><!DOCTYPE html>
  <p>Voici votre panel d'administrations</p>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Accueil</a></li>
    <li><a data-toggle="pill" href="#menu1">Plainte RP</a></li>
    <li><a data-toggle="pill" href="#menu2">Mapping</a></li>
    <li><a data-toggle="pill" href="#menu3">Développement</a></li>
		<li><a data-toggle="pill" href="#gestions">Gestions</a></li>
		<li><a data-toggle="pill" href="#logs">Logs</a></li>

  </ul>

<style>

.dashboard_ico{
	text-align: left;
	padding: 8px;
}

.dashboard_ico_text{
	text-align: left;
	padding: 8px;
}

</style>



  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    	<p>...</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>...</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>...</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>...</p>
    </div>
		<div id="gestions" class="tab-pane fade">
			<?php
	} // Fin de la verifications du rank
				if($_SESSION['rank'] >= 15){

			try{
			//	$bdd = new PDO('mysql:host=127.0.0.1;dbname=altislife;charset=utf8', 'root', 'spl159875321');
				$bdd = new PDO('mysql:host=51.91.114.91;dbname=monsiteweb;charset=utf8', 'raph', 'Oplk259');
			}
			catch (Exception $e){
			        die('[BDD] Erreur : ' . $e->getMessage());
			}

			$gplayer = $bdd->query('SELECT * FROM players');

			?>

			  <div class="container"><br><br>
			  <div class="panel panel-primary">
			  <div class="panel-heading">Liste des joueurs (AltisLife)
			</div>
			<div class="panel-footer">
			  <input class="form-control" id="myInput" type="text" placeholder="Recherche">
			  <br>
			  <table class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Nom</th>
			        <th>Pid</th>
							<th>Informations sur le joueur si il est a surveillé !</<th>
			        <th>Gestions</th>
			      </tr>
			    </thead>
			    <tbody id="myTable">
			      <tr>
			        <?php

			        while ($gplayerinfo = $gplayer->fetch()){

								$gbankacc = $gplayerinfo['bankacc'];
								$gcashacc = $gplayerinfo['cash'];

								$raison = "Argent / Avertissement";

								if($gbankacc >= "15000000" || $gcashacc >= "15000000"){
					         $jsp = "<font color=\"red\">A surveillé !</font> (Raison : $raison)";
					      }else{
					         $jsp = '<font color="green">Joueurs clean !</font>';
					      }

			        ?>

			        <td><?= $gplayerinfo['name']; ?> </td>
			        <td><?= $gplayerinfo['pid']; ?></td>
							<td><?= $jsp; ?></td>
			        <td><a href="gplayer.php?uid=<?= $gplayerinfo['uid']; ?>">Gestion </a></td>
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


			<!-- Include footer HERE -->


			<?php
			}else{
				echo "<br><b><div style=\"color:red;text-align:center;\">Vous n'avez pas l'acreditations necessaire pour accedé a cette page !</b>";
			}


			 ?>

    </div>

		<div id="logs" class="tab-pane fade">
      <h3>Logs</h3>
      <p></p>
    </div>
  </div>
</div>

</body>
</html>

<?php
}else{
	echo "<br><b><div style=\"color:red;text-align:center;font-size: 20px;\">Vous n'avez pas l'acreditations necessaire pour accedé a cette page !<br><br>Vous allez etre rediriger dans 10 secondes vers l'accueil.</b>";
	header("Location: ../");
}
 ?>
