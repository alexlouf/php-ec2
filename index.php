<?php
	$servername = "database-1.cxv0wxoujkeg.us-east-1.rds.amazonaws.com";
	$username = "admin";
	$password = "rootroot";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=etudiantsipssi", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully";
	}
	catch(PDOException $e){
	    echo "Connection failed: " . $e->getMessage();
	}

	$sql =  'SELECT * FROM etudiants';
	$rows = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
  	  <span class="navbar-brand mb-0 h1">Connexion</span>
      <a class="btn btn-danger" href="danger.php">Supprimer les donnees de la table</a>
  	</nav>
	<div class="container">
		<form method="post" action="insert.php">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Prenom</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="prenom">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nom</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" name="nom">
		  </div>
		  <button type="submit" class="btn btn-primary">Ajout</button>
		</form>
		<table class="table table-striped mt-3">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Prenom</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($rows as $row) {
						?>
							<tr>
								<td><?= $row["nom"] ?></td>
								<td><?= $row["prenom"] ?></td>
							</tr>
						<?php
					}
					?>
			</tbody>
		</table>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
