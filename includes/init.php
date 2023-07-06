<?php
try{
  //  $bdd = new PDO('mysql:host=127.0.0.1;dbname=monsiteweb;charset=utf8', 'root', 'spl159875321');
	$bdd = new PDO('mysql:host=51.91.114.91;dbname=monsiteweb;charset=utf8', 'raph', 'Oplk259');
}
catch (PDOException $e){
    die('[BDD] Erreurs');
}

?>
