var hole;         // l'image qui contient la case vide
var hole_row ;    // la ligne où se trouve le trou
var hole_column;  // la colonne où se trouve le trou
var nbClick = 0;  // le nombre de chiffres déplacés
var gagne=false;
window.onload=trou;
// Traite le click sur l'image 'image' de
// coordonnées ('ligne','colonne') dans la grille
function clickAt(ligne,colonne,image) {
	if(ordre()==false){
			if(((ligne==hole_row+1)&&(colonne==hole_column))||((ligne==hole_row-1)&&(colonne==hole_column))||((ligne==hole_row)&&(colonne==hole_column+1))||((ligne==hole_row)&&(colonne==hole_column-1))&&(image!=0)){
				nbClick+=1;
				var newTrou=document.getElementById(image);
				var deplacement=document.getElementById('0');
				deplacement.src="images/"+image+".png";
				var clic="clickAt("+hole_row+","+hole_column+","+image+")";
				deplacement.setAttribute('onclick',clic);
				deplacement.id=image;

				newTrou.src=hole;
				var clic2="clickAt("+ligne+","+colonne+",0)";
				newTrou.setAttribute('onclick',clic2);
				newTrou.id='0';
				hole_row=ligne;
				hole_column=colonne;
				if(ordre()==true){
					document.getElementById('message').innerHTML="Bravo vous avez gagné en "+nbClick+" coups"+"<input type=\"button\" value=\"Accueil\" onClick=\"javascript:document.location.href='index.php'\" />";
					document.getElementById('message').style.visibility='Visible';
				}
		}
	}
}
function trou(){
	hole_column=document.getElementById('col').value;
	hole_row=document.getElementById('lin').value;
	hole="images/0.png";
	if(ordre()==true){
		document.getElementById('message').innerHTML="Bravo vous avez gagné en "+nbClick+" coups"+"<input type=\"button\" value=\"Accueil\" onClick=\"javascript:document.location.href='index.php'\" />";
		document.getElementById('message').style.visibility='Visible';
	}
}
function ordre(){
	var tabImg=document.getElementsByTagName('img');
	var tabId=new Array();
	for(i=0;i<tabImg.length;i++){
		tabId[i]=tabImg[i].id;
	}
	if (tabId[tabId.length-1]=='0'){
		tabId.pop();
		var idVerif=tabId.slice();
		idVerif.sort();
		if(idVerif.join('')==tabId.join('')){
			return true;
		}
		else return false;
	}
	else return false;
}
