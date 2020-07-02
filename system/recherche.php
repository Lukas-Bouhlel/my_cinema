<?php
try { //Ont se connecte à la base de donnée.
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=cinema', "root", "root");
} catch (Exception $var) { //Ont est déconnecter à la base de donnée.
    die('Error: ' . $var->getMessage());
}
//Requête préparées pour les genre de films.WHERE id_genre = 'action'
if (isset($_GET["submit"])) {
    $recherche = $_GET["titre"];
    $genre = $_GET["genre"];
    $distrib = $_GET["distributeur"];


    if ($recherche !== "titre") {
        $requete = $bdd->prepare("SELECT *, genre.nom AS genreNom, distrib.nom AS distribNom FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON film.id_genre = genre.id_genre WHERE film.titre LIKE \"%$recherche%\" ORDER BY titre ASC");
        $requete->execute();
    }
    if ($genre !== "genre") {
        $requete = $bdd->prepare("SELECT *, genre.nom AS genreNom, distrib.nom AS distribNom FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON film.id_genre = genre.id_genre WHERE genre.nom LIKE \"%$genre%\" ORDER BY titre ASC");
        $requete->execute();
    }
    if ($distrib !== "distributeur") {
        $requete = $bdd->prepare("SELECT *, genre.nom AS genreNom, distrib.nom AS distribNom FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON film.id_genre = genre.id_genre WHERE distrib.nom LIKE \"%$distrib%\" ORDER BY titre ASC");
        $requete->execute();
    }

    if ($distrib !== "distributeur" && $genre !== "genre") {
        $requete = $bdd->prepare("SELECT *, genre.nom AS genreNom, distrib.nom AS distribNom FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON film.id_genre = genre.id_genre WHERE distrib.nom LIKE \"%$distrib%\" AND genre.nom LIKE \"%$genre%\" ORDER BY titre ASC");
        $requete->execute();
    }
    if ($distrib !== "distributeur" && $recherche !== "titre") {
        $requete = $bdd->prepare("SELECT *, genre.nom AS genreNom, distrib.nom AS distribNom FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON film.id_genre = genre.id_genre WHERE distrib.nom LIKE \"%$distrib%\" AND film.titre LIKE \"%$recherche%\" ORDER BY titre ASC");
        $requete->execute();
    }
    if ($recherche !== "titre" && $genre !== "genre") {
        $requete = $bdd->prepare("SELECT *, genre.nom AS genreNom, distrib.nom AS distribNom FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON film.id_genre = genre.id_genre WHERE genre.nom LIKE \"%$genre%\" AND film.titre LIKE \"%$recherche%\" ORDER BY titre ASC");
        $requete->execute();
    }
    if ($recherche !== "titre" && $genre !== "genre" && $distrib !== "distributeur") {
        $requete = $bdd->prepare("SELECT *, genre.nom AS genreNom, distrib.nom AS distribNom FROM film LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib INNER JOIN genre ON film.id_genre = genre.id_genre WHERE distrib.nom LIKE \"%$distrib%\" AND genre.nom LIKE \"%$genre%\" AND film.titre LIKE \"%$recherche%\" ORDER BY titre ASC");
        $requete->execute();
    }
    while ($resultat = $requete->fetch()) {
        echo "<tr><td>" . $resultat['titre'] . "</td>";
        echo "<td>" . $resultat['date_debut_affiche'] . "</td>";
        echo "<td>" . $resultat['duree_min'] . "</td>";
        echo "<td>" . $resultat['genreNom'] . "</td>";
        echo "<td>" . $resultat['distribNom'] . "</td>";
        echo "<td>" . $resultat['resum'] . "</td></tr>";
    }
}
