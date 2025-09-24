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
  <script src="footer.js"></script>
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
  <?php
    require_once("teplan.php");
    $tab = recup_magasin();

    $texte = '<script>let magasin=makeMagasin(["'.$tab[0].'","'.$tab[1].'","'.$tab[2].'","'.$tab[3].'",'.$tab[4].','.$tab[5].','.$tab[6].','.$tab[7].']);</script>';

    $texte.="<footer id='footerjs'>";
		$texte.=  '	<script>';
    $texte.=  '      var footerjs = document.getElementById("footerjs");';
    $texte.=  '      footerjs.innerHTML = "<div class=\"Contact\"><div><p>" + "Magasin " + magasin.nom.charAt(0).toUpperCase() + magasin.nom.slice(1).toLowerCase() + "</p><p>" + magasin.adresse + "</p><p>" + magasin.ville + "</p><div class=\"tel\"><div class=\"telImg\"><img id=\"Telephone\"src=\"images/telephone.png\"/></div><div class=\"telTexte\"><span class=\"texte\">" + magasin.tel + "</span></div></div></div></div><nav class=\"Lien\"><a href=\"TeplanAcceuil.php\"><img class=\"Lien\" src=\"images/planteAcceuil.png\"></a><a href=\"TeplanPlantes.html\"><img class=\"Lien\" src=\"images/plantePlantes.png\"></a><a href=\"teplanFleurs.php\"><img class=\"Lien\" src=\"images/planteFleurs.png\"></a></nav>";';                
    $texte.=  ' </script>';		  
		$texte.="</footer> ";
		echo $texte;
  ?>
</body>
</html>
