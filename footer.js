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
	return{
		nom: tab[0],
		adresse: tab[2] ,
		ville: tab[1],
		tel: tab[3] ,
	}
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