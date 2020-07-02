<?php
try { //Ont se connecte à la base de donnée.
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cinema', "root", "root");
} catch (Exception $var) { //Ont est déconnecter à la base de donnée.
    die('Error: ' . $var->getMessage());
}

if(isset($_GET["nom"])) {
    $nom = $_GET["nom"];

    if ($nom !== "nom") {
        $requete = $bdd->prepare("SELECT *,fiche_personne.nom FROM fiche_personne WHERE nom LIKE \"%$nom%\" ORDER BY nom ASC");
        $requete->execute();
    }
    
while ($resultat = $requete->fetch()) {
    echo "<tr><th>" . $resultat['nom'] . "</th>";
    echo "<th>" . $resultat['date_naissance'] . "</th>";
    echo "<th>" . $resultat['email'] . "</th>";
    echo "<th>" . $resultat['cpostal'] . "</th>";
    echo "<th>" . $resultat['ville'] . "</th></tr>";
}
}
