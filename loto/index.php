<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loto</title>
</head>
<body>
<?php // FONCTION
// --------------------------------
// CONSTRUCTION DE LA GRILLE
function TabGrilleLoto($numeros_OK_array, $num_complementaire, $date_tirage)
{
	// --------------------------------
	$NbrLigne = 10;
	// nombre de cellules a remplir
	$NbreData = 49; // numéros de 1 à 49
	// --------------------------------
	// affichage
		$i = 0;
		$NbrCol = 0;
?>
	<table border="1" cellpadding="5">
	<tbody>
		<tr>
			<th colspan="5">LOTO du <?php echo $date_tirage; ?></th>
		</tr>
<?php
		for ($i=0; $i<$NbrLigne; $i++) 
		{
?>		<tr>
<?php
			$j = 0;
			while (($i+($j*$NbrLigne))%$NbrLigne==$i && ($i+($j*$NbrLigne))<$NbreData) 
			{
				$k = ($i+($j*$NbrLigne))+1; // numéro, de 1 à 49
				$tdstyle = '';
				if(in_array($k, $numeros_OK_array)){ $tdstyle = ' style="background:green;"'; }
				if($k == $num_complementaire){ $tdstyle = ' style="background:yellow;"'; }
?>
			<td<?php echo $tdstyle;?>><?php echo $k; // DONNEE A AFFICHER dans la cellule ?></td>
<?php				$j++;
				// nombre de colonnes
				$NbrCol = max($NbrCol,$j);
			}
			// ajout cellule vide (derniere colonne)
			if ($j!=$NbrCol) { 
?>			<td>&nbsp;</td>
<?php
			}
?>		</tr>
<?php
		}
?>
	</tbody>
	</table>
<?php
}
?>
<?php // AFFICHAGE
// --------------------------------
// EXEMPLE DE RESULTAT DE TIRAGE DU LOTO :
$numeros_OK_array = array(11,4,23,14,17,41);
shuffle($numeros_OK_array); // on trie (facultatif)
$num_complementaire = 33;
$date_tirage = '02/09/2013';
// --------------------------------
?>
<h4>Résultat du tirage du LOTO du <?php echo $date_tirage; ?></h4>
<ul>
	<li>Numéros gagnants : <?php echo implode(', ', $numeros_OK_array); ?></li>
	<li>Numéro complémentaire : <?php echo $num_complementaire; ?></li>
</ul>
<?php echo TabGrilleLoto($numeros_OK_array, $num_complementaire, $date_tirage); // Affichage de la grille ?>

</body>
</html>