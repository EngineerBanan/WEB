<?php
  require_once ("teplan.php");
  $acc = recup_accessoires();
?>
<!DOCTYPE html>
<html>
<head>
  <title>TEPLAN</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="Teplan.css">
  <script src="footer.js"></script>
  <style>.prix{color:brown;font-weight:bold}</style>
</head>
<body>
  <div id="MainPage3">
    <h1 id="TitreFleurs">Nos accessoires - quelques produits</h1>
    <div id="accessoires">
      <?php foreach($acc as $a):
        $img = is_file($a['image_accessoire']) ? $a['image_accessoire'] : 'images/placeholder.jpg'; ?>
        <div>
          <img src="<?= htmlspecialchars($img) ?>" alt="">
          <p><?= htmlspecialchars($a['nom_accessoire']) ?></p>
          <p class="prix">
            <?= $a['prix_accessoire']!==null ? number_format($a['prix_accessoire'],0,',',' ').' €' : '—' ?>
          </p>
          <?php if(!empty($a['info_accessoire'])): ?>
            <p><?= htmlspecialchars($a['info_accessoire']) ?></p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <footer id="footer"></footer>
</body>
</html>
