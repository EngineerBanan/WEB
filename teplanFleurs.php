<?php
  require_once ("teplan.php");

  $c = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
  if (!$c) die("Connexion BD échouée : ".pg_last_error());

  $sql = 'SELECT nom_fleur, image_fleur FROM listefleurs ORDER BY nom_fleur';
  $r = pg_query($c, $sql);
  if (!$r) die("Erreur SQL: ".pg_last_error($c));

  $fleurs = [];
  while ($row = pg_fetch_assoc($r)) $fleurs[] = $row;

  pg_free_result($r);
  pg_close($c);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TEPLAN</title>
  <link rel="stylesheet" href="Teplan.css">
</head>
<body>
  <div id="MainPage3">
    <h1 id="TitreFleurs">Nos fleurs - quelques produits</h1>
    <div id="Fleurs">
      <?php foreach($fleurs as $f):
        $img = is_file($f['image_fleur']) ? $f['image_fleur'] : 'images/placeholder.jpg'; ?>
        <div>
          <a href="informationFleur.php?nom=<?= urlencode($f['nom_fleur']) ?>">
            <img src="<?= htmlspecialchars($img) ?>" alt="">
          </a>
          <p><?= htmlspecialchars($f['nom_fleur']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <footer id="footer"></footer>
  <script src="footer.js"></script>
</body>
</html>
