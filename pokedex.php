<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pokédex</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php require_once 'includes/navbar.php'; ?>
<div class="container">
  <h1>Pokédex</h1>
  <div class="row">
<?php
$pokemonIds = range(1, 5);
foreach ($pokemonIds as $id) {
    $response = @file_get_contents("https://pokeapi.co/api/v2/pokemon/$id");
    if ($response === false) {
        continue;
    }
    $data = json_decode($response, true);
    if (!$data) {
        continue;
    }
    $types = array_map(function ($t) { return ucfirst($t['type']['name']); }, $data['types']);
    $abilities = array_map(function ($a) { return ucfirst($a['ability']['name']); }, $data['abilities']);
    echo '<div class="col-sm-6 col-md-4">';
    echo '  <div class="thumbnail">';
    echo '    <img src="'.htmlspecialchars($data['sprites']['front_default']).'" alt="'.htmlspecialchars($data['name']).'">';
    echo '    <div class="caption">';
    echo '      <h3>'.ucfirst($data['name']).' (#'.$data['id'].')</h3>';
    echo '      <ul>';
    echo '        <li>Type: '.implode(', ', $types).'</li>';
    echo '        <li>Height: '.$data['height'].'</li>';
    echo '        <li>Weight: '.$data['weight'].'</li>';
    echo '        <li>Abilities: '.implode(', ', $abilities).'</li>';
    echo '      </ul>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
}
?>
  </div>
</div>
</body>
</html>
