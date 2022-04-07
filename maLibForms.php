<?php


/*
Ce fichier définit diverses fonctions permettant de faciliter la production de mises en formes complexes : 
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
	// Fonction appelée dans mkTable, produit une ligne d'entête
	// contenant les noms des champs à afficher dans mkTable
	// Les champs à afficher sont définis à partir de la liste listeChamps 
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
	// Fonction appelée dans mkTable, produit une ligne 
	// contenant les valeurs des champs à afficher dans mkTable
	// Les champs à afficher sont définis à partir de la liste listeChamps 
	// si elle est fournie ou du tableau tabAsso
	
	echo "<tr>\n"; 
	if ($listeChamps) {
		// on ne doit afficher que les valeurs des champs demandés !!
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
	// Produit un tableau affichant les données passées en paramètre
	// Si listeChamps est vide, on affiche toutes les données de $tabData
	// S'il est défini, on affiche uniquement les champs listés dans ce tableau, 
	// dans l'ordre du tableau
	
	if (count($tabData) == 0) return; // rienfaire : tableau vide 
	
	echo "\n<table border=\"1\">\n"; 
	
		mkLigneEntete($tabData[0],$listeChamps); // légende 
		
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
	// Produit un menu déroulant portant l'attribut name = $nomChampSelect
	// TNE: Si cette variable se termine par '[]', il faudra affecter l'attribut multiple à la balise select

	// Produire les options d'un menu déroulant à partir des données passées en premier paramètre
	// $champValue est le nom des cases contenant la valeur à envoyer au serveur
	// $champLabel est le nom des cases contenant les labels à afficher dans les options
	// $selected contient l'identifiant de l'option à sélectionner par défaut
	// si $champLabel2 est défini, il indique le nom d'une autre case du tableau 
	// servant à produire les labels des options
}

function mkForm($action="",$method="get")
{
	// Produit une balise de formulaire NB : penser à la balise fermante !!
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
	// Et sélectionne cet élément si le quatrième argument est vrai
}
?>

















