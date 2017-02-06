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
	    <!-- Le formulaire est soumis à  lui-même (voir action=...) en POST. Voir l'effet plus haut dans cette page.  -->
	    <form method="post" action="<?= filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_VALIDATE_URL); ?>">
		<fieldset><legend>Votre identité:</legend>
		    <label for="prenom">Prénom: </label>
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
	    //  Cette partie de code sera exécuté seulement lors d'une requète POST, c'est à  dire lorsque le formulaire sera soumis.
	    if(filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) === 'POST'):
		// Récupération sécurisée des champs du formulaire
		// On en profite pour mettre en majuscule si nécessaire
		// et pour vérifier la longueur (pour utilisation avec bdd, identique à  la longueur du champ dans la bdd...)
		$nom = ($nom = strtoupper(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING))) ? substr(strtoupper($nom), 0, 30) : "";
		$prenom = ($prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING))? substr($prenom, 0, 30) : "";
	?>
	    <h1>Votre réponse:</h1>
	    <p class='description'>Bonjour <span class="blue"><?= $prenom ?> <?= $nom ?>!</span></p>
	<?php else:	?>
	    <p class='description'>Complétez le formulaire.</p>
	<?php endif;	?>
	</div>
			</td>
		</tr>
	</table>
</body>
</html>
