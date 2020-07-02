<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	$action = $_GET["action"];

	if ($action == "DELETE") {
		$id = $_GET["id_perso"];
	} else {
		$id = $_GET["id_perso"];
		$nom = $_GET["nom"];
		$prenom = $_GET["prenom"];
		$age = $_GET["date_naissance"];
		$email = $_GET["email"];
		
	}
	

	if ($action == "CREATE") {
		createUser($nom, $prenom, $age, $email);

		echo "user cree <br>";
		echo "<a href='crudMember.php'>Liste des utilisateurs</a>";
		
	}
	
	if ($action == "UPDATE") {
		updateUser($id, $nom, $prenom, $age, $email);
		echo "user update <br>";
		echo "<a href='crudMember.php'>Liste des utilisateurs</a>";
	}
	if ($action == "DELETE") {
		deleteUser($id);
		echo "user delete <br>";
		echo "<a href='crudMember.php'>Liste des utilisateurs</a>";
	}
