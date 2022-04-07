<?php

// Ce fichier permet de tester les fonctions développées dans le fichier malibforms.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) == "conversations.php")
{
	header("Location:../index.php?view=conversations");
	die("");
}

include_once("libs/modele.php"); // listes
include_once("libs/maLibUtils.php");// tprint
include_once("libs/maLibForms.php");// mkTable, mkLiens, mkSelect ...

// Les utilisateurs non connectés ne devraient pas avoir accès à cette vue ! 

// SI (user non connecte) 
// On déclenche une redirection vers la page de connexion avec un message 

if (! valider("connecte","SESSION")) {
	// header("Location:?view=login&msg=" . urlencode("Il faut être connecté !"));
	// une redirection utilise les entetes HTTP de réponse 
	// Les entetes de réponse doivent être envoyées AVANT le corps de la réponse
	// Une erreur "headers already sent" s'affiche sur certains serveurs 
	// cf. directive output_buffering du fichier php.ini => en TNE 
	
	// utiliser la fonction header n'interrompt pas l'interprétation de la page
	// => risque de fuite de données 
	// => On interrompt la page immédiatement 
	// die("");
	
	// alternative :  
	$_REQUEST["msg"] = "Il faut être connecté !"; 
	include("templates/login.php"); 
}  

else {

?>

	<h1>Conversations du site</h1>

	<h2>Liste des conversations actives</h2>

	<?php
	//TODO: lister les conversations actives sous forme de liens 
	$listConv = listerConversations("actives"); 
	mkLiens($listConv,"theme", "id", "?view=chat", "idConv");
	?>

	<h2>Liste des conversations inactives</h2>

	<?php
	//TODO: lister les conversations inactives sous forme de liens 
	$listConv = listerConversations("inactives");
	mkLiens($listConv,"theme", "id", "?view=chat", "idConv"); 
	?>

	<?php 
	// SI on est administrateur
	if (valider("isAdmin","SESSION")) {
	?>

		<hr />
		<h2>Gestion des conversations</h2>

		<?php

		//TODO : proposer des formulaires de gestion de conversations
		$listConv = listerConversations();
		
		// on récupère un éventuel idConv renvoyé par le controleur  
		$idConv = valider("idConv");

		mkForm("controleur.php");
		mkSelect("idConv", $listConv,"id", "theme",$idConv,"active");
		mkInput("submit","action","Archiver");
		mkInput("submit","action","Activer");
		mkInput("submit","action","Supprimer Conversation");
		endForm();

		mkForm("controleur.php");
		mkInput("text","theme");
		mkInput("submit","action","Ajouter Conversation"); 
		endForm();
		?>
		
	<?php
	} // FIN si user isAdmin  
	?>

<?php
} // FIN si user connecte 
?>












