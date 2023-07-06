<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">GoodLife</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="./">Accueil</a></li>
        <li><a href="#">Règlement</a></li>
        <li><a href="#">Informations</a></li>
     </ul>
      <?php


      if(isset($_SESSION['pseudo'])){
        echo 
        "
      <ul class=\"nav navbar-nav navbar-right\">
        <li class=\"dropdown\">
          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-user\"></span> Votre profil <span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"#\">Profil</a></li>
            <li><a href=\"#\">Demande d'aide</a></li>
            <li><a href=\"./logout.php\">Se deconnecté</a></li>
        ";
        if($_SESSION['rank'] == 15){
          echo
          "
            <li><a href=\"./gs/\">Gestions</a></li>
          </ul>
        </li>
      </ul>
          ";
        }
      }else{
        echo
        "
      <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"./register.php\"><span class=\"glyphicon glyphicon-user\"></span> Inscription</a></li>
          <li><a href=\"./login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Connexion</a></li>
      </ul>
        ";
      }


?>
      </ul>
    </div>
  </div>
</nav>