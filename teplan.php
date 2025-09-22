<?php

require("fonctions.inc.php");

//travail 2 : récupération des infos du magasin
function recup_magasin() {
	//connexion à la base de donnée
	
	$conn=pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
	if(!$conn) {
		die("Erreur de connexion :".pg_last_error());	
	}
	//requête sql
	$sql="SELECT nom_magasin,ville,adresse,tel,MardiSamediOuverture,MardiSamediFermeture,DimancheOuverture,DimancheFermeture
		   from informationmagasin
		   where nom_magasin='TEPLAN';";
	//envoi de la requête
	$result=pg_query($conn, $sql);
	if(!$result) {
		die("Erreur dans la requête SQL:".pg_last_error());
	}	
	//récupération des résultats
	$tab=pg_fetch_array($result);
	
	//suppression de l'espace dédié à $result
	pg_free_result($result);
	pg_close($conn);
	
	return $tab;
}

//travail 3 : récupération des fleurs
function recup_fleurs($couleur) {
    $conn = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
    if (!$conn) die("Erreur de connexion :".pg_last_error());

    $sql = "
        SELECT DISTINCT f.*
        FROM Fleurs f
        JOIN Couleur_fleur cf ON f.id_fleur = cf.id_fleur
        JOIN Couleurs c       ON cf.id_couleur = c.id_couleur
        WHERE c.couleur = $1
        ORDER BY f.nom_fleur;
    ";
    $result = pg_query_params($conn, $sql, [$couleur]);
    if (!$result) die("Erreur dans la requête SQL:".pg_last_error($conn));

    $texte = [];
    while ($row = pg_fetch_assoc($result)) $texte[] = $row;

    pg_free_result($result);
    pg_close($conn);
    return $texte;
}


//travail 3 : récupération des plantes
function recup_plantes() {
    $conn = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
    if (!$conn) {
        die("Erreur de connexion :".pg_last_error());
    }
    // on récupère toutes les plantes
    $sql = "SELECT * FROM plantes;";
    $result = pg_query($conn, $sql);
    if (!$result) {
        die("Erreur dans la requête SQL:".pg_last_error($conn));
    }
    $texte = [];
    while ($row = pg_fetch_assoc($result)) {
        $texte[] = $row;
    }
    pg_free_result($result);
    pg_close($conn);
    return $texte;
}

//travail 5: informations sur les fleurs
function recup_infoFleur($nomFleur) {
    $conn = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
    if (!$conn) die("Erreur de connexion :".pg_last_error());
    $sql = "SELECT * FROM informationfleur WHERE nom_fleur = $1 LIMIT 1";
    $result = pg_query_params($conn, $sql, [$nomFleur]);
    if (!$result) die("Erreur SQL :".pg_last_error($conn));
    $row = pg_fetch_assoc($result);
    pg_free_result($result); pg_close($conn);
    return $row;
}

//travail 6: récupération des accessoires
function recup_accessoires() {
    $conn = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
    if (!$conn) die("Erreur de connexion :".pg_last_error());
    // Vue créée dans ton SQL : ListeAccessoires
    $result = pg_query($conn, 'SELECT nom_accessoire, image_accessoire, info_accessoire, prix_accessoire
                       FROM "ListeAccessoires" ORDER BY nom_accessoire');
    if (!$result) die("Erreur SQL :".pg_last_error($conn));
    $out=[]; while($row=pg_fetch_assoc($result)) $out[]=$row;
    pg_free_result($result); pg_close($conn);
    return $out;
}

//travail 7: récupération du nombre de produits
function recup_nombreProduits($nom='TEPLAN') {
    $conn = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
    if (!$conn) die("Erreur de connexion :".pg_last_error());

    $result = pg_query_params($conn,
        'SELECT * FROM nombredeproduit WHERE nom_magasin = $1',
        [$nom]
    );
    if (!$result) die("Erreur SQL :".pg_last_error($conn));

    $row = pg_fetch_assoc($result);
    pg_free_result($result); pg_close($conn);
    if (!$row) return null;

    return [
      'nb_fleurs'       => $row['Nombre de fleurs'] ?? 0,
      'min_prix_fleur'  => $row['prix minimum Fleurs'] ?? null,
      'max_prix_fleur'  => $row['prix maximum Fleurs'] ?? null,
      'nb_plantes'      => $row['Nombre de plantes'] ?? 0,
      'min_prix_plante' => $row['prix minimum Plantes'] ?? null,
      'max_prix_plante' => $row['prix maximum Plantes'] ?? null,
      'nb_accessoires'  => $row["Nombre d'accessoires"] ?? 0,
    ];
}

//travail 9: récupération des couleurs
function recup_couleurs(){
  $conn = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
  if (!$conn) die("Erreur de connexion :".pg_last_error());
  $result = pg_query($conn, "SELECT couleur FROM Couleurs ORDER BY couleur");
  if (!$result) die("Erreur SQL :".pg_last_error($conn));
  $out=[]; while($row=pg_fetch_assoc($result)) $out[]=$row['couleur'];
  pg_free_result($result); pg_close($conn); return $out;
}

function recup_fleurs_par_couleur($couleur){
  $conn = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
  if (!$conn) die("Erreur de connexion :".pg_last_error());
  $sql = "SELECT DISTINCT f.nom_fleur, f.image_fleur
          FROM Fleurs f
          JOIN Couleur_fleur cf ON f.id_fleur=cf.id_fleur
          JOIN Couleurs c2      ON c2.id_couleur=cf.id_couleur
          WHERE c2.couleur = $1
          ORDER BY f.nom_fleur";
  $result = pg_query_params($conn,$sql,[$couleur]);
  if (!$result) die("Erreur SQL :".pg_last_error($conn));
  $out=[]; while($row=pg_fetch_assoc($result)) $out[]=$row;
  pg_free_result($result); pg_close($conn); return $out;
}
?>
