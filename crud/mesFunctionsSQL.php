<?php 
	
	function getDatabaseConnexion() {
		try {
		    $user = "root";
			$pass = "root";
			$pdo = new PDO('mysql:host=localhost;dbname=cinema', $user, $pass);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

	
	// récupere tous les users
	function getAllUsers() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT * from fiche_personne ORDER BY id_perso ASC';
		$rows = $con->query($requete);
		return $rows;
	}

	// creer un user
	function createUser($nom, $prenom, $age, $email) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO fiche_personne (nom, prenom, date_naissance, email) 
					VALUES ('$nom', '$prenom', '$age' ,'$email')";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	//recupere un user
	function readUser($id) {
		$con = getDatabaseConnexion();
		$requete = "SELECT * from fiche_personne where id_perso = '$id' ";
		$stmt = $con->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
		
	}

	//met à jour le user
	function updateUser($id, $nom, $prenom, $age, $email) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE fiche_personne set 
						nom = '$nom',
						prenom = '$prenom',
						date_naissance = '$age',
						ville = '$email' 
						where id_perso = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $stmt . "<br>" . $e->getMessage();
	    }
	}

	// suprime un user
	function deleteUser($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from fiche_personne where id_perso = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $stmt . "<br>" . $e->getMessage();
	    }
	}

	function getNewUser() {
		$user['id_perso'] = "";
		$user['nom'] = "";
		$user['prenom'] = "";
		$user['date_naissance'] = "";
		$user['email'] = "";
		
	}
	


 ?>