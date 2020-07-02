<?php
try {//Ont se connecte à la base de donnée.
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cinema', "root", "root");
}
catch (Exception $var){//Ont est déconnecter à la base de donnée.
    die ('Error: '.$var->getMessage());
}
//Requête préparées pour les genre de films ou par distributeur.
if(isset($_GET["distributeur"])){
$requete = $bdd->query("SELECT * FROM distrib ORDER BY distrib.nom ASC");

while ($resultat = $requete->fetch()){
    echo "<option>" . $resultat['nom'] . "</option>";
} 
}