<?php
var_dump($_POST);
$servername = "database-1.cxv0wxoujkeg.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "rootroot";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=etudiantsipssi", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully";
	}
	catch(PDOException $e){
	    echo "Connection failed: " . $e->getMessage();
	}

	$stmt = $conn->prepare("INSERT INTO etudiants (prenom, nom) VALUES (:prenom, :nom)");
	$stmt->bindParam(':prenom', htmlspecialchars($_POST["prenom"]));
	$stmt->bindParam(':nom', htmlspecialchars($_POST["nom"]));
	$stmt->execute();

	header('Location: /index.php');