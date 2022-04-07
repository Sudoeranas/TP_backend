<?php


/*
Ce fichier d�finit diverses fonctions permettant de faciliter la production de mises en formes complexes : 
tableaux, formulaires, ...
*/

/*
Array
        (
            [id] => 4
            [pseudo] => Phil
            [blacklist] => 1
            [connecte] => 0
            [couleur] => green
        )
*/
function mkLigneEntete($tabAsso,$listeChamps=false)
{
	// Fonction appel�e dans mkTable, produit une ligne d'ent�te
	// contenant les noms des champs � afficher dans mkTable
	// Les champs � afficher sont d�finis � partir de la liste listeChamps 
	// si elle est fournie ou du tableau tabAsso
	echo "<tr>\n"; 
	if ($listeChamps) {
		foreach($listeChamps as $nomChamp) {
			echo "<th>$nomChamp</th>\n"; 
		}
	} else {  
		foreach($tabAsso as $cle => $val) {
			echo "<th>$cle</th>\n"; 
		} 
	}
	echo "</tr>\n"; 
}

function mkLigne($tabAsso,$listeChamps=false)
{
	// Fonction appel�e dans mkTable, produit une ligne 
	// contenant les valeurs des champs � afficher dans mkTable
	// Les champs � afficher sont d�finis � partir de la liste listeChamps 
	// si elle est fournie ou du tableau tabAsso
	
	echo "<tr>\n"; 
	if ($listeChamps) {
		// on ne doit afficher que les valeurs des champs demand�s !!
		foreach($listeChamps as $nomChamp) {
			echo "<td>$tabAsso[$nomChamp]</td>\n"; 
		}
	} else { 
		foreach($tabAsso as $cle => $val) {
			echo "<td>$val</td>\n"; 
		} 
	}
	echo "</tr>\n";
}

/*
Array
(
    [0] => Array
        (
            [id] => 4
            [pseudo] => Phil
            [blacklist] => 1
            [connecte] => 0
            [couleur] => green
        )

    [1] => Array
        (
            [id] => 6
            [pseudo] => toto
            [blacklist] => 1
            [connecte] => 0
            [couleur] => black
        )

)

*/


function mkTable($tabData,$listeChamps=false)
{
	// Produit un tableau affichant les donn�es pass�es en param�tre
	// Si listeChamps est vide, on affiche toutes les donn�es de $tabData
	// S'il est d�fini, on affiche uniquement les champs list�s dans ce tableau, 
	// dans l'ordre du tableau
	
	if (count($tabData) == 0) return; // rienfaire : tableau vide 
	
	echo "\n<table border=\"1\">\n"; 
	
		mkLigneEntete($tabData[0],$listeChamps); // l�gende 
		
		// les lignes: 
		//for($i=0;$i<count($tabData);$i++) {
		// 	mkLigne($tabData[$i]);
		//}
		
		foreach($tabData as $nextData) {
			mkLigne($nextData,$listeChamps);
		}
		
	echo "</table>\n"; 
}

function mkSelect($nomChampSelect, $tabData,$champValue, $champLabel,$selected=false,$champLabel2=false)
{
	// Produit un menu d�roulant portant l'attribut name = $nomChampSelect
	// TNE: Si cette variable se termine par '[]', il faudra affecter l'attribut multiple � la balise select

	// Produire les options d'un menu d�roulant � partir des donn�es pass�es en premier param�tre
	// $champValue est le nom des cases contenant la valeur � envoyer au serveur
	// $champLabel est le nom des cases contenant les labels � afficher dans les options
	// $selected contient l'identifiant de l'option � s�lectionner par d�faut
	// si $champLabel2 est d�fini, il indique le nom d'une autre case du tableau 
	// servant � produire les labels des options
}

function mkForm($action="",$method="get")
{
	// Produit une balise de formulaire NB : penser � la balise fermante !!
}
function endForm()
{
	// produit la balise fermante
}

function mkInput($type,$name,$value="")
{
	// Produit un champ formulaire
}

function mkRadioCb($type,$name,$value,$checked=false)
{
	// Produit un champ formulaire de type radio ou checkbox
	// Et s�lectionne cet �l�ment si le quatri�me argument est vrai
}
?>

















