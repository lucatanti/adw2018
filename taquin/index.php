<!DOCTYPE html>
<html>
<head>
  <title>Taquin : Accueil</title>
  <link rel="icon" type="image/ico" href="favicon.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <link rel="stylesheet" type="text/css" href="taquin.css">
<!--   <script language="javascript" src="taquin.js"></script> -->
</head>
<body>

<h1>Taquin</h1>

<p>
Vous devez résoudre le taquin en déplaçant les chiffres pour les aligner dans l'ordre Vous ne pouvez déplacer que les chiffres qui peuvent <em>glisser</em>
à la place de la case vide.
</p>
<div class="bouton">
<p> Veuillez choisir la taille de la grille </p>
<form method="POST"  action="game.php">
    <input type="radio" name="taille" value="22"/>2x2
    <input type="radio" name="taille" value="23"/>2x3
    <input type="radio" name="taille" value="33"/>3x3
    <input type="radio" name="taille" value="32"/>3x2
    <input type="submit" value="OK"/>
</form>
</div>
