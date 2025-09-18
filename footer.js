function makeMagasin(tab){
	//récupère la valeur dans le tableau de recup_magasin()
	return{
		nom: tab[0],
		adresse: tab[2] ,
		ville: tab[1],
		tel: tab[3] ,
		MardiSamediOuverture: tab[4],
		MardiSamediFermeture: tab[5],
		DimancheOuverture: tab[6],
		DimancheFermeture: tab[7]
	};
}

function afficherFooter(tab){
    var footerjs = document.getElementById("footerjs");
    footerjs.innerHTML = '<div class=\"Contact\"><div><p>Magasin Teplan</p><p>8 rue de la Graine</p><p>51100 REIMS</p><div class=\"tel\"><div class=\"telImg\"><img id=\"Telephone\"src=\"images/telephone.png\"/></div><div class=\"telTexte\"><span class=\"texte\">03.26.12.34.56</span></div></div></div></div><nav class=\"Lien\"><a href=\"TeplanAcceuil.php\"><img class=\"Lien\" src=\"images/planteAcceuil.png\"></a><a href=\"TeplanPlantes.html\"><img class=\"Lien\" src=\"images/plantePlantes.png\"></a><a href=\"TeplanFleurs.html\"><img class=\"Lien\" src=\"images/planteFleurs.png\"></a></nav>';
}

function InfoAlstroemeria() {
    alert("Informations sur l'Alstroemeria jaune\ntempérature min : -15°C\nensoleillement : ensoleillée\norigine : Chili");
}

function InfoPruner() {
    const monImage = document.getElementById('monImage');
    const imgPruner = document.getElementById('imgPruner');
    monImage.style.display = 'block';
    imgPruner.src = 'images/accessoires/Capture d’écran_2025-09-02_17-25-50.png';
}

function fermerImage() {
    const monImage = document.getElementById('monImage');
    monImage.style.display = 'none';
}

afficherFooter();