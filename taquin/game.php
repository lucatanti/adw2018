<?php
if(!isset($_POST['taille'])){
	header("Location: index.php");
	exit();
}
$taille=$_POST['taille'];
switch ($taille) {
	case '22':
		$max=3;
		$row=2;
		$line=2;
		break;

	case '23':
		$max=5;
		$row=3;
		$line=2;
		break;
	case '33':
		$max=8;
		$row=3;
		$line=3;
		break;
	case '32':
		$max=5;
		$row=2;
		$line=3;
		break;

}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/ico" href="favicon.ico">
  <title>Taquin : Jeu</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <link rel="stylesheet" type="text/css" href="taquin.css">
  <script language="javascript" src="taquin.js"></script>
</head>
<body>

<h1>Taquin</h1>

<p>
Vous devez résoudre le taquin en déplaçant les chiffres pour les aligner dans l'ordre de 1 à
<?php
print($max);
?>
 . Vous ne pouvez déplacer que les chiffres qui peuvent <em>glisser</em>
à la place de la case vide.
</p>

<?php
	$a=0;
	$nombre=array();
	while($a<$max+1){
		$chiffre=rand(0,$max);
		while(in_array($chiffre,$nombre)){
			$chiffre=rand(0,$max);
		}
		$nombre[]=$chiffre;
		$a++;
	}
	$trou = array_search(0, $nombre);
	$col=$trou%$line;
	$lign=(int)($trou/$line);
	$res="<input type=\"hidden\" id=\"col\" value=\"$col\">";
	$res.="<input type=\"hidden\" id=\"lin\" value=\"$lign\">";
	// print_r($nombre);
	$res.="<div id=\"grid\">\n";
	for($i=0; $i<$row;$i++){
		$res.="	<div class=\"row\">\n";
		for($j=0; $j<$line;$j++){
			$case=$nombre[$line*$i+$j];
			$res.="<img src=\"images/$case.png\" id=\"$case\" onclick=\"clickAt($i,$j,$case)\">\n";
		}
		$res.="	</div>\n";
	}
	$res.="</div>\n";
	print($res);
?>
<div id="message">
    Félicitations, vous avez résolu le taquin à l'aide de 27 déplacements
</div>
<p> Revenir à l'accueil et perdre la partie en cours?</p>
<input type="button" value="Accueil" onClick="javascript:document.location.href='index.php'" />

</body>
</html>