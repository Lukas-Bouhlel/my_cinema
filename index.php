<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/film.css" rel="stylesheet">
    <title>My Cinema</title>
</head>

<body>
    <form method="GET" action="index.php">
        <header id="header1">
            <div id="search">
                <input type="text" name="titre" placeholder="Rechercher un film..." id="searchBarre">
                <input type="submit" value="Rechercher" name="submit" class="buttonRechercher">
            </div>
            <a class="linkMemberPage" href="member.php"><span><img id="iconMember" src="assets/iconsMember.png" alt="icons"></span> MEMBER LOGIN</a>
            <a class="linkMemberPage" href="crud/crudMember.php"><span><img id="iconCrud" src="assets/iconsCRUD.png" alt="crud"></span>CRUD</a>
            <p id="logo">MY<br>CI<br>NÉ</p>
        </header>
        <h1 id="title">MY CINÉMA</h1>
        <div id="button">
            <select name="genre" class="genre">
                <option hidden selected value="genre">Genres de films</option>
                <?php include("system/genre.php"); ?>
            </select>
            <select name="distributeur" class="distributeur">
                <option value="distributeur" hidden selected>Distributeurs de films</option>
                <?php include("system/distributeur.php"); ?>
            </select>
        </div>
        <table class="filmCss">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date d'affiche</th>
                    <th>Durée du film</th>
                    <th>Genre</th>
                    <th>Distributeur</th>
                    <th>Synopsis et détails</th>
                </tr>
            </thead>
            <?php include("system/recherche.php"); ?>
        </table>
</body>

</html>