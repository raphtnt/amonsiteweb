<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>GL - Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- NavBar -->
<?php require_once 'includes/navbar.php'; ?>

  <div id="section1" class="container-fluid">

   <div style="padding-left: 50px;">
    <h1>GoodLife</h1>
    <h3>Nous rejoindes / Règlement</h3>
  </div>

  <div style="padding-left: 100px;">
   <h3>&rarr; Tout ce passeras sur le site il est conseillé de s'inscrire |&rarr; <a href="register.php"><button type="button" class="btn btn-info btn-lg">S'inscrire</button></a></h3>
   <h3>&rarr; Login |&rarr; <a href="login.php"><button type="button" class="btn btn-info btn-lg">Se connecté</button></a></h3>
   <h3>&rarr; Règlement |&rarr; <a href="reglement.php"><button type="button" class="btn btn-info btn-lg">Voir le règlement</button></a></h3><br><br><br><br>

   <h3>&rarr; TeamSpeak |&rarr; <a href="ts3server://91.121.76.75/"><button type="button" class="btn btn-info btn-lg">Se connecté</button></a></h3>
   <h3>&rarr; AltisLife |&rarr; <a href="steam://91.121.76.75"><button type="button" class="btn btn-info btn-lg">Se connecté</button></a></h3>
 </div>

  </div>
  <div id="section2" class="container-fluid">

<div id="top-section2">
    <mark>Good-Life</mark>
</div>
<br><hr><br>
<mark style="margin-left: 150px; font-size: 125px; opacity:0.8;">Others</mark>

  </div>
<!--  <div id="section3" class="container-fluid"></div> -->
<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">STAFF</h5>
        <div class="row">
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/99/998928af109630ad94224190d29aa70deb9675cb_full.jpg" alt="card image"></p>
                                    <h4 class="card-title">raphtnt</h4>
                                    <p class="card-text">Fondateur, Développeur.</p>
                              <!--      <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">raphtnt</h4>
                                    <p class="card-text">Fondateur, développeur s'occupe de recruter les développeurs et reglé les problemes important du type duplications etc. </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/2f/2f624f877587a76f22c4f42f7974f8c8eff3863c_full.jpg" alt="card image"></p>
                                    <h4 class="card-title">_oTmtc</h4>
                                    <p class="card-text">Assistant.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Assistant du serveur</h4>
                                    <p class="card-text">S'occupe du serveur, s'occupe des recrutements des mappeurs.</p>
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/73/73e1bef01f5889345bce23323c7c8593cae5630e_full.jpg" alt="card image"></p>
                                    <h4 class="card-title">Tony Every</h4>
                                    <p class="card-text">Gérant-Staff.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Gérant-Staff</h4>
                                    <p class="card-text">S'occupe des recrutements du staff et fait leurs formations en tant que nouveau membres du staff.</p>
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/ac/acdbaa1b5b1615aae13c23659969680a74e6715d_full.jpg" alt="card image"></p>
                                    <h4 class="card-title">Lorin Tax</h4>
                                    <p class="card-text">Administrateur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Administrateur</h4>
                                    <p class="card-text">S'occupe de rediriger les supports pour un staff efficace, s'occupé des problemes les plus importants.</p>
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fe/fef49e7fa7e1997310d705b2a6158ff8dc1cdfeb_full.jpg" alt="card image"></p>
                                    <h4 class="card-title">Dallas Cox</h4>
                                    <p class="card-text">Administrateur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Administrateur</h4>
                                    <p class="card-text">S'occupe de rediriger les supports pour un staff efficace, s'occupé des problemes les plus importants.</p>
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="" alt=""></p> <!-- Administrateur #3 -->
                                    <h4 class="card-title">A promouvoir</h4>
                                    <p class="card-text">Modérateur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Modérateur</h4>
                                    <p class="card-text">S'occupe des problemes rôleplay et les remboursements et accueil les nouveau joueurs.</p>
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="" alt=""></p> <!-- Modérateur #1 -->
                                    <h4 class="card-title">A promouvoir</h4>
                                    <p class="card-text">Modérateur-Test.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Modérateur-Test</h4>
                                    <p class="card-text">S'occupe des problemes rôleplay et les remboursements et accueil les nouveau joueurs</p>
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="" alt=""></p>
                                    <h4 class="card-title">A promouvoir</h4>
                                    <p class="card-text">Support.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Support</h4>
                                    <p class="card-text">S'occupe des problemes rôleplay, dirige les nouveau joueurs</p>
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="" alt=""></p>
                                    <h4 class="card-title">A promouvoir</h4>
                                    <p class="card-text">Support.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Support</h4>
                                    <p class="card-text">S'occupe des problemes rôleplay, dirige les nouveau joueurs.</p>
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ./Team member -->

        </div>
    </div>
</section>


</body>
</html>
