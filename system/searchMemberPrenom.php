<?php
try { //Ont se connecte à la base de donnée.
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cinema', "root", "root");
} catch (Exception $var) { //Ont est déconnecter à la base de donnée.
    die('Error: ' . $var->getMessage());
}
if(isset($_GET["prenom"])) {
    $prenom = $_GET["prenom"];

    if ($prenom !== "prenom") {
        $requete = $bdd->prepare("SELECT *,fiche_personne.prenom FROM fiche_personne WHERE prenom LIKE \"%$prenom%\" ORDER BY prenom ASC");
        $requete->execute();
    }
while ($resultat = $requete->fetch()) {
    echo "<tr><th>" . $resultat['prenom'] . "</th>";
    echo "<th>" . $resultat['date_naissance'] . "</th>";
    echo "<th>" . $resultat['email'] . "</th>";
    echo "<th>" . $resultat['cpostal'] . "</th>";
    echo "<th>" . $resultat['ville'] . "</th></tr>";
}
}