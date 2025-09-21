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
    $c = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
    if (!$c) die("Erreur de connexion :".pg_last_error());
    $sql = "SELECT * FROM informationfleur WHERE nom_fleur = $1 LIMIT 1";
    $r = pg_query_params($c, $sql, [$nomFleur]);
    if (!$r) die("Erreur SQL :".pg_last_error($c));
    $row = pg_fetch_assoc($r);
    pg_free_result($r); pg_close($c);
    return $row;
}

//travail 6: récupération des accessoires
function recup_accessoires() {
    $c = pg_connect('host='.HOST.' dbname=bdteplan user='.USER.' password='.PASS);
    if (!$c) die("Erreur de connexion :".pg_last_error());
    // Vue créée dans ton SQL : ListeAccessoires
    $r = pg_query($c, 'SELECT nom_accessoire, image_accessoire, info_accessoire, prix_accessoire
                       FROM "ListeAccessoires" ORDER BY nom_accessoire');
    if (!$r) die("Erreur SQL :".pg_last_error($c));
    $out=[]; while($row=pg_fetch_assoc($r)) $out[]=$row;
    pg_free_result($r); pg_close($c);
    return $out;
}



?>
