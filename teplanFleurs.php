<?php
  require_once ("teplan.php");

  $c = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
  if (!$c) die("Connexion BD échouée : ".pg_last_error());

  if (isset($_POST['ajout_fleur']) && !empty(trim($_POST['nom_fleur']))) {
      $nom = trim($_POST['nom_fleur']);

      $sqlInsert = "INSERT INTO fleurs(nom_fleur) VALUES ($1)";
      $resInsert = pg_query_params($c, $sqlInsert, [$nom]);
      if (!$resInsert) {
          die("Erreur lors de l'insertion : ".pg_last_error($c));
      }
      pg_free_result($resInsert);

      header("Location: teplanFleurs.php");
      exit;
  }

  $sql = 'SELECT nom_fleur, image_fleur FROM fleurs ORDER BY nom_fleur';
  $r = pg_query($c, $sql);
  if (!$r) die("Erreur SQL: ".pg_last_error($c));

  $fleurs = [];
  while ($row = pg_fetch_assoc($r)) {
      $fleurs[] = $row;
  }

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
    <div id="AjoutFleur">
      <h2>Ajouter une fleur</h2>
      <form method="POST" action="">
        <input type="text" name="nom_fleur" placeholder="Nom de la fleur" required>
        <button type="submit" name="ajout_fleur">AJOUT</button>
      </form>
    </div>
  </div>
  <footer id="footer"></footer>
  <script src="footer.js"></script>
</body>
</html>
