<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="css/style2.css">
<script src="js/style2.js"></script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarColor01">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item ">
				<a class="nav-link" href="#" onclick="window.location.href='HomePage.html'">Home </a>
			</li>
      
		</ul>
		<ul class="navbar-nav ">
		<li class="nav-item">
		<button type="button" onclick="window.location.href='main.html'"class="btn   my-2 my-lg-0 ">Return</button>
		</li>
		<li class="nav-item">
		<button type="button" onclick="self.close()" class="btn ">Close</button>
		</li>
		</ul>
		
	</div>

	
</nav>

<?php 
if (extension_loaded ('PDO')) {
	echo 'PDO OK'; 
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

<div class="jumbotron">
<h4 class="display-4">
<?php
if(isset($_POST['formSubmit']))
{
	$aobject =$_POST['object'];
	if(!isset($aobject))
	{
		
		echo ("<p>Aucun objet selectionne</p>\n");
		
	}
	else{
		$nobject = count ($aobject);
		echo("<p> Vous avez choisis $nobject objets: "); 
		?>
		</h4>
		<?php
		if ($nobject >6 )
		{
			?>
			<div class="alert alert-dismissible alert-secondary">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Vous avez séléctionné plus de 6 objets!</strong> Seul les 6 premiers seront pris en comptes.</a>.
			</div>
			<?php
		}
		?>
		<ul class="list-group">
		<?php
		for($i=0; $i < $nobject; $i++)
		{
			?>
			<li class="list-group-item d-flex justify-content-between align-items-center">
			<?php
			echo($aobject[$i]." ");
			?>
			</li>
			<?php
		}
		echo("</p>");
	}
}
?>
</ul>
<p class="lead">
<a class="btn btn-primary btn-lg" href="#" role="button">Let's go!</a>
</p>
</div>

<?php
$array = array_fill(0, 1, $aobject[0]);
print_r($array);

$query = $pdo->prepare("SELECT * FROM `classename` WHERE name LIKE  'person' ");
$query->execute();
$resultat = $query->fetchAll();
print("<table border=\"1\">");
foreach($resultat as $key =>$variable)
{
	print("<tr>");
	print("<td>".$resultat[$key]['name']."</td>");
	print("<tr>");
}
print ("</table>");
?>

<?php
for($i=0; $i < $nobject; $i++)
{
	$array = array_fill(0, 1, $aobject[$i]);
	$search = join(',',array_fill(0, count ($array), '?'));
	$query = $pdo->prepare("SELECT * FROM `classename` WHERE name LIKE " .$search);
	$query->execute($array);
	$resultat = $query->fetchAll();
	print("<table border=\"1\">");
	foreach($resultat as $key =>$variable)
	{
		print("<tr>");
		print("<td>".$resultat[$key]['name']."</td>");
		print("<tr>");
	}
	print ("</table>");

}
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>