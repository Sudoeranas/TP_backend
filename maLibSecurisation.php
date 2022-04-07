<?php

include_once "maLibUtils.php";	// Car on utilise la fonction valider()

/**
 * @file login.php
 * Fichier contenant des fonctions de v�rification de logins
 */

/**
 * Cette fonction v�rifie si le login/passe pass�s en param�tre sont l�gaux
 * Elle stocke le pseudo de la personne dans des variables de session : session_start doit avoir �t� appel�...
 * Elle enregistre aussi une information permettant de savoir si l'utilisateur qui se connecte est administrateur ou non
 * Elle enregistre l'�tat de la connexion dans une variable de session "connecte" = true
 * @pre login et passe ne doivent pas �tre vides
 * @param string $login
 * @param string $password
 * @return false ou true ; un effet de bord est la cr�ation de variables de session
 */
function verifUser($login,$password)
{

}




/**
 * Fonction à placer au début de chaque page privée
 * Cette fonction redirige vers la page $urlBad en envoyant un message d'erreur 
 * et arrète l'interpretation si l'utilisateur n'est pas connecté
 * Elle ne fait rien si l'utilisateur est connecté, et si $urlGood est faux
 * Elle redirige vers urlGood sinon
 */
function securiser($urlBad,$urlGood=false)
{
	
}

?>
