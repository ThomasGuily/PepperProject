<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta charset ="utf-8">
<title> Enter your Name </title>
<!-- css-->
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/style.css">
<script language="javascript" >
function connect() {

				 
                const Http = new XMLHttpRequest();
                const url='http://desktop-42v9tau.umons.ac.be/PepperProjet/main.php'; //to change
                Http.open("GET", url);
                Http.send();
                Http.onreadystatechange=(e)=>{
                    console.log(Http.responseText)
                }
				
   }

function disablebtn(){
				document.getElementById('playbtn').disabled = false; //working?

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
			<li class="nav-item">
				<a class="nav-link" href="#" onclick="window.location.href='index.html'">Home </a>
			</li>
      
		</ul>
		<ul class="navbar-nav ">
		<li class="nav-item">
		<button type="button" onclick="window.location.href='index.html'"class="btn   ">Return</button>
		</li>
		<li class="nav-item">
		<button type="button" onclick="self.close()" class="btn ">Close</button>
		</li>
		</ul>
	</div>

	
</nav>

<div class="container h-80">
<div class="row align-items-center h-100">
	<div class="col-md-3">
	</div>

    <div class="col-3 mx-auto">
	
        <div class="text-center">
            
            <form class="form-signin" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">        
                <input type="text" class="form-control form-group" name="OK" placeholder="Enter your name" required autofocus>
				<button  onclick="connect();" name="formsubmit" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Enter</button> <!--working??-->
			</form>
			<br><br><br><br><br>
			<button type="button" id="playbtn" onclick="window.location.href='MultiSelect.php'" class="btn btn-lg btn-secondary btn-block btn-signin" disabled>Play</button>
        </div>
    </div>
	<div class="col-md-3">
	<img id="profile-img" class="rounded " src="image/Pepper-Hello.JPG" />
	</div>
	<div class="col-md-3">
	</div>
	
	
</div>
</div>


<?php
if(isset($_POST['formsubmit']))
{
	$name = $_POST['OK'];
	//echo "je suis server";
	shell_exec("C:\xampp\htdocs\PepperProject $name"); //to change 
	//echo "le script est executée";
	//echo "valeur envoyée " .$name;
	echo '<script type="text/javascript">',
     'disablebtn();',
     '</script>';	
}
?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>