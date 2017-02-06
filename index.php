<!DOCTYPE html>
<html>
<head>
	<title>PHP Starter Application</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<table>
		<tr>
			<td style='width: 30%;'>
				<img class = 'newappIcon' src='images/newapp-icon.png'>
			</td>
			<td>
				<h1 id = "message">Hello!</h1>
	<div id="cadre_saisie">
	    <!-- Le formulaire est soumis � lui-m�me (voir action=...) en POST. Voir l'effet plus haut dans cette page.  -->
	    <form method="post" action="<?= filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_VALIDATE_URL); ?>">
		<fieldset><legend>Votre identit�:</legend>
		    <label for="prenom">Pr�nom: </label>
			<input id="prenom" type="text" name="prenom" maxlength="30" size="30" />
		    <label for="nom">Nom: </label>
			<input id="nom" type="text" name="nom" required="required" maxlength="30" size="30" />
		    <br/>
		    <input type="submit" value="Enregistrer" />
		</fieldset>
	    </form>
	</div>
	<div id="cadre_affichage">
	<?php
	    //  Cette partie de code sera ex�cut� seulement lors d'une requ�te POST, c'est � dire lorsque le formulaire sera soumis.
	    if(filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) === 'POST'):
		// R�cup�ration s�curis�e des champs du formulaire
		// On en profite pour mettre en majuscule si n�cessaire
		// et pour v�rifier la longueur (pour utilisation avec bdd, identique � la longueur du champ dans la bdd...)
		$nom = ($nom = strtoupper(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING))) ? substr(strtoupper($nom), 0, 30) : "";
		$prenom = ($prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING))? substr($prenom, 0, 30) : "";
	?>
	    <h1>Votre r�ponse:</h1>
	    <p class='description'>Bonjour <span class="blue"><?= $prenom ?> <?= $nom ?>!</span></p>
	<?php else:	?>
	    <p class='description'>Compl�tez le formulaire.</p>
	<?php endif;	?>
	</div>
			</td>
		</tr>
	</table>
</body>
</html>
