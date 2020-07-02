<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/member.css" rel="stylesheet">
    <title>My Cinema</title>
</head>

<body>
    <form method="GET" action="member.php">
    <header id="header2">
            <div id="search1">
                <input type="text" name="nom" placeholder="Rechercher un membre par son nom..." id="searchBarre1">
                <input type="submit" value="Rechercher" name="member" class="buttonRechercher1">       
            </div>
            <div id="search2">
                <input type="text" name="prenom" placeholder="Rechercher un membre par son prenom..." id="searchBarre2">
                <input type="submit" value="Rechercher" name="member" class="buttonRechercher2">       
            </div>
            <a class="linkMemberPage2" href="index.php">FILM</a>
            <p id="logo2">MY<br>CI<br>NÉ</p>
        </header>
        <div id="tableMouv">
    <table class="memberCss">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>date de naissance</th>
                    <th>email</th>
                    <th>code postal</th>
                    <th>ville</th>
                </tr>
            </thead>
            <?php include("system/searchMemberNom.php"); ?>
        </table>
        <table class="memberCss">
            <thead>
                <tr>
                    <th>prénom</th>
                    <th>date de naissance</th>
                    <th>email</th>
                    <th>code postal</th>
                    <th>ville</th>
                </tr>
            </thead>
            <?php include("system/searchMemberPrenom.php"); ?>
        </table>
        </div>
    </form>
</body>
</html>