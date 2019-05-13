<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/style2.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarColor01">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item ">
				<a class="nav-link" href="#" onclick="window.location.href='index.html'">Home </a>
			</li>
      
		</ul>
		<ul class="navbar-nav ">
		<li class="nav-item">
		<button type="button" onclick="window.location.href='index.html'"class="btn ">Return</button>
		</li>
		<li class="nav-item">
		<button type="button" onclick="self.close()" class="btn ">Close</button>
		</li>
		</ul>
	</div>

	
</nav>
<!--- echo htmlentities($_SERVER['PHP_SELF']); --->
<!---Connection to Data Base--->
<?php 
if (extension_loaded ('PDO')) {
} 
else {
	echo 'PDO KO'; 
}
$dsn = 'mysql:host=localhost;dbname=classe;port=3306;charset=utf8';
try{
	$pdo = new PDO($dsn, 'root' , '');
}
catch(PDOException $exception){
	exit('Erreur de connexion à la base de données');
}
?>

<div class="container " >
	<form action="yourChoice.php"  method="post">
		<fieldset>

			<div class="form-group">
				<label for="exampleSelect2">Selectionnez les objets faces à Pepper (6 max)</label>
					<select name = "object[]" multiple class="form-control" size="15" 	required id="exampleSelect2">

						<?php
						$query = $pdo->prepare("SELECT * FROM `classename`");
						$query->execute($array);
						$resultat = $query->fetchAll();
						foreach($resultat as $key =>$variable)
							{	$result = $resultat[$key]['name'];
								?>
								<option value="<?php echo $result ?>"><?php echo $result ?></option>
								<?php
							}
								?>
					</select>
			</div>
    		<button type="submit" name="formSubmit" class="btn btn-primary">Submit</button>
		</fieldset>
	</form>
</div>
 


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>