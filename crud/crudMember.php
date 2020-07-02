<!DOCTYPE html>
<html>

<head>
	<title>CRUD PHP</title>
</head>

<body>
	<a href=formulaireUtilisateur.php?id_perso=0>Creer un user</a>
	<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';

	$headers = getHeaderTable();
	$users = getAllUsers();
	afficherTableau($users, $headers);
	?>
</body>

</html>