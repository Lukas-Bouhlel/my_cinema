<?php
include 'mesFunctionsSQL.php';
include 'mesFunctionsTable.php';

$id = $_GET["id_perso"];
if ($id == 0) {
	$user = getNewUser();
	$action = "CREATE";
	$libelle = "Creer";
} else {
	$user = readUser($id);
	$action = "UPDATE";
	$libelle = "Mettre a jour";
}
?>

<html>
<header>
	<link rel="stylesheet" href="style.css">
</header>

<body>


	<form action="createUpdate.php" method="get">
		<p>
			<a href="crudMember.php">Liste des utilisateurs</a>

			<input type="hidden" name="id_perso" value="<?php echo $user['id_perso'];  ?>" />
			<input type="hidden" name="action" value="<?php echo $action;  ?>" />
			<div>
				<label for="name">Nom :</label>
				<input type="text" id="nom" name="nom" value="<?php echo $user['nom'];  ?>">
			</div>
			<div>
				<label for="prenom">Prenom</label>
				<input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom'];  ?>">
			</div>
			<div>
				<label for="date_naissance">Date de naissance:</label>
				<input type="text" id="age" name="date_naissance" value="<?php echo $user['date_naissance'];  ?>">
			</div>
			<div>
				<label for="email">Email :</label>
				<textarea id="adresse" name="email" placeholder="<?php echo $user['email'];  ?>"></textarea>
			</div>
			<div class="button">
				<button type="submit"><?php echo $libelle;  ?></button>
			</div>
		</p>
	</form>
	<br>

	<?php if ($action != "CREATE") { ?>
		<form action="createUpdate.php" method="get">
			<input type="hidden" name="action" value="DELETE" />
			<input type="hidden" name="id_perso" value="<?php echo $user['id_perso'];?>" />
			<p>
				<div class="button">
					<button type="submit">Supprimer</button>
				</div>
			</p>
		</form>
	<?php } ?>

</body>

</html>