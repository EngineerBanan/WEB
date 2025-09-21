<!DOCTYPE html>
<html>
    <head>
        <title>TEPLAN</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Teplan.css">
        <script src="footer.js"></script>
    </head>
    
    <body>
        <div id="MainPage">

            <h1>Ami.e.s des plantes, bienvenu.e.s</h1>
    
        <p>Vous aimez les plantes, vous voulez marquer une occasion ou aménager <br>
            votre jardin, nous sommes là pour vous aider et vous conseiller.<br><br></p>
            
            <p>Carine, spécialiste des plantes grimpantes est disponible tous les matins<br>
            pour vous donner quelques précieux tuyaux. <img src="images/smiley.png" class="ImageT" alt="smiley"><img src="images/smiley.png" class="ImageT" alt="smiley"><img src="images/smiley.png" class="ImageT" alt="smiley"><br><br></p>

            <p>Proche des circuits courts, nous apportons une grande importance à la<br>
            qualité de nos produits et leur fraîcheur ! <img src="images/parapluie.png" class="ImageT" alt="parapluie"><br><br></p>

            <p>N'hésitez pas à nous contacter par mail (voir lien contactez-nous) ou par<br>
            téléphone ! <img src="images/telephone.png" class="ImageT" alt="telephone"></p>

            <p>Au plaisir de vous voir !</p>
            
        </div>
        
          <?php       
          //travail n°2 : affichage des horaires et du footer avec données de la base de données					  
                /* lecture du magasin depuis la bd*/
                require_once("teplan.php");
                $tab=recup_magasin();

                /* initiation du let magasin*/
                $texte =  '<script>let magasin=makeMagasin(["'.$tab[0].'","'.$tab[1].'","'.$tab[2].'","'.$tab[3].'",'.$tab[4].','.$tab[5].','.$tab[6].','.$tab[7].']);</script>';
                $texte2 = '<script>let footer=afficherFooter(["'.$tab[0].'","'.$tab[1].'","'.$tab[2].'","'.$tab[3].']);</script>';            
                //affichage des horaires
                
		        $texte.="<div class='cube'>";
		        $texte.="<p id='horaires'></p>";
		        $texte.=  '  <script>';
		        $texte.=  '      var horaires = document.getElementById("horaires");';
		        $texte.=  '      horaires.innerHTML += "Notre magasin est ouvert<br>du mardi au samedi<br>de " + magasin.MardiSamediOuverture + "h à " + magasin.MardiSamediFermeture + "h <br>et le dimanche<br>de " + magasin.DimancheOuverture + "h à " + magasin.DimancheFermeture + "h <br>";';	
		        $texte.=  '  </script>';
		        $texte.=  '  <p>Pour toute question';
		        $texte.=  '  <a href="contact.html" >Contactez-nous</a>';
		        $texte.=  '  </p>';
		        $texte.="</div>";     
		        $texte.="<footer id='footerjs'>";
				$texte.=  '	<script>';
                $texte.=  '      var footerjs = document.getElementById("footerjs");';
                $texte.=  '      footerjs.innerHTML = "<div class=\"Contact\"><div><p>" + "Magasin " + magasin.nom.charAt(0).toUpperCase() + magasin.nom.slice(1).toLowerCase() + "</p><p>" + magasin.adresse + "</p><p>" + magasin.ville + "</p><div class=\"tel\"><div class=\"telImg\"><img id=\"Telephone\"src=\"images/telephone.png\"/></div><div class=\"telTexte\"><span class=\"texte\">" + magasin.tel + "</span></div></div></div></div><nav class=\"Lien\"><a href=\"TeplanAcceuil.php\"><img class=\"Lien\" src=\"images/planteAcceuil.png\"></a><a href=\"TeplanPlantes.html\"><img class=\"Lien\" src=\"images/plantePlantes.png\"></a><a href=\"TeplanFleurs.html\"><img class=\"Lien\" src=\"images/planteFleurs.png\"></a></nav>";';                
                $texte.=  ' </script>';		  
				$texte.="</footer> ";
		        echo $texte;
	      ?>
          
    </body>

</html>