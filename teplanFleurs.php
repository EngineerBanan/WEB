<?php
    require_once ("teplan.php");
    $couleurs = recup_couleurs();
    $sel = $_GET['couleur'] ?? '';
    if ($sel!=='') {
    $fleurs = recup_fleurs_par_couleur($sel);
    } else {
    // Par défaut: fleurs vendues par TEPLAN (vue ListeFleurs)
    $c = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
    $r = pg_query($c, 'SELECT nom_fleur, image_fleur FROM "ListeFleurs" ORDER BY nom_fleur');
    $fleurs=[]; while($row=pg_fetch_assoc($r)) $fleurs[]=$row;
    pg_free_result($r); pg_close($c);
    }
?>
<!DOCTYPE html><html><head>
<meta charset="utf-8"><title>TEPLAN</title>
<link rel="stylesheet" href="Teplan.css">
</head><body>
<div id="MainPage3">
  <h1 id="TitreFleurs">Nos fleurs - quelques produits</h1>

  <form method="get" style="margin:1rem">
    <label>Couleur :</label>
    <select name="couleur" onchange="this.form.submit()">
      <option value="">Toutes</option>
      <?php foreach($couleurs as $c): ?>
        <option value="<?= htmlspecialchars($c) ?>" <?= $sel===$c?'selected':''; ?>><?= htmlspecialchars($c) ?></option>
      <?php endforeach; ?>
    </select>
    <noscript><button type="submit">OK</button></noscript>
  </form>

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
</body></html>
