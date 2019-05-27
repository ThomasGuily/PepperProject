<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="css/style2.css">
<script src="js/style2.js"></script>

<script language="javascript" >
            function con() {


                const Http = new XMLHttpRequest();
                const url='http://dekstop-82cbd3b.umons.ac.be/test2server/yolophoto.php'; /app/projetba3
                Http.open("GET", url);
                Http.send();
                Http.onreadystatechange=(e)=>{
                    console.log(Http.responseText)
                }
				
				      function con2() {


                const Http = new XMLHttpRequest();
                const url='http://dekstop-82cbd3b.umons.ac.be/test2server/yolophoto2.php'; /app/projetba3
                Http.open("GET", url);
                Http.send();
                Http.onreadystatechange=(e)=>{
                    console.log(Http.responseText)
                }
   }
        </script> 

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
		<button type="button" onclick="window.location.href='MultiSelect.php'"class="btn   my-2 my-lg-0 ">Return</button>
		</li> 
		<li class="nav-item">
		<button type="button" onclick="self.close()" class="btn ">Close</button>
		</li>
		</ul>
		
	</div>

	
</nav>

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
<div class="row form-group product-chooser">


<?php
$aobject = $_GET['aobject'];
$nobject = $_GET['nobject'];

if ($nobject >6){
	$nbr =6;
}
else if ($nobject <6 || $nobject = 6){
	$nbr = $nobject;
}
for($i=0; $i < $nbr; $i++)
{
	$array = array_fill(0, 1, $aobject[$i]);
	$search = join(',',array_fill(0, count ($array), '?'));
	$query = $pdo->prepare("SELECT * FROM `classename` WHERE name LIKE " .$search);
	$query->execute($array);
	$resultat = $query->fetchAll();
	foreach($resultat as $key =>$variable)
	{
		$choice= $resultat[$key]['name'];
		?>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
		<div class="card mb-3 border-primary"  style="max-width: 20rem;"  data-toggle="modal" data-target="#my<?php echo$choice ?>"> 
			
				<img src="image/<?php echo $choice?>.png" class="card-img-top" width="250px" height="250px" alt="Card image">
			
			<div class="card-footer text-white bg-primary">
				<?php print $choice ?> 
			</div>
		</div>
		</div>
	
		<?php
		
		
	}
	foreach($resultat as $key =>$variable)
	{		$choice= $resultat[$key]['name'];
 
	?>
		<!-- The Modal -->
  <div class="modal" id="my<?php echo$choice ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header"><h4 class="modal-title"> Do I look for the <?php echo $choice ?>? </h4>
		
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
		  <img id="profile-img" class="rounded center " src="image/Pepper-Ask.JPG" style="width:250px;height:350px;" />
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non je change d'avis!</button>
			
		    <form action="yolophoto.php?choice=<?php echo $choice; ?>" method="post">
             
				<button onclick="con();" class="btn btn-lg btn-primary btn-block btn-signin" type="submit"> Oui vas-y! </button>
			</form>
			
        </div>
        
      </div>
    </div>
  </div>
		<?php
	}

}
?>
    </div>
</div>




<div class="container">
  	<!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header"><h4 class="modal-title"> Do I look for the <?php echo $choice ?>? </h4>
		
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
		  <img id="profile-img" class="rounded center " src="image/Pepper-Ask.JPG" style="width:250px;height:350px;" />
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Non je change d'avis!</button>
		  <button type="button" class="btn btn-primary" data-dismiss="modal">Oui vas-y!</button>
        </div>
        
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>