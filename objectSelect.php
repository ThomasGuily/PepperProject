<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<!---Connection to Data Base--->
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
<div class="container " >
<form>
  <fieldset>

    <div class="form-group">
      <label for="exampleSelect2">Example multiple select</label>
      <select name = "object[]" multiple class="form-control" id="exampleSelect2">
        <option value="person">person</option>
		<option value="bicycle">bicycle</option>
		<option value="car">car</option>
		<option value="motorbike">motorbike</option>
		<option value="aeroplane">aeroplane</option>
		<option value="bus">bus</option>
		<option value="train">train</option>
		<option value="truck">truck</option>
		<option value="boat">truck</option>
		<option value="traffic light">traffic light</option>
		<option value="fire hydrant">fire hydrant</option>
		<option value="stop sign">stop sign</option>
		<option value="parking meter">parking meter</option>
		<option value="bench">bench</option>
		<option value="bird">bird</option>
		<option value="cat">cat</option>
		<option value="dog">dog</option>
		<option value="horse">horse</option>
		<option value="sheep">sheep</option>
		<option value="cow">vache</option>
		<option value="elephant">elephant</option>
		<option value="bear">bear</option>
		<option value="zebra">zebra</option>
		<option value="giraffe">giraffe</option>
		<option value="backpack">backpack</option>
		<option value="umbrella">umbrella</option>
		<option value="handbag">handbag</option>
		<option value="tie">tie</option>
		<option value="suitcase">suitcase</option>
		<option value="frisbee">frisbee</option>
		<option value="skis">skis</option>
		<option value="snowboard">snowboard</option>
		<option value="sports ball">sports ball</option>
		<option value="kite">kite</option>
		<option value="baseball bat">baseball bat</option>
		<option value="baseball glove">baseball glove</option>
		<option value="skateboard">skateboard</option>
		<option value="surfboard">surfboard</option>
		<option value="tennis racket">tennis racket</option>
		<option value="bottle">bottle</option>
		<option value="wine glass">wine glass</option>
		<option value="cup">cup</option>
		<option value="fork">fork</option>
		<option value="knife">knife</option>
		<option value="spoon">spoon</option>
		<option value="bowl">bowl</option>
		<option value="banana">banana</option>
		<option value="apple">apple</option>
		<option value="sandwich">sandwich</option>
		<option value="orange">orange</option>
		<option value="broccoli">broccoli</option>
		<option value="carrot">carrot</option>
		<option value="hot dog">hot dog</option>
		<option value="pizza">pizza</option>
		<option value="donut">donut</option>
		<option value="cake">cake</option>
		<option value="chair">chair</option>
		<option value="sofa">sofa</option>
		<option value="pottedplant">pottedplant</option>
		<option value="bed">bed</option>
		<option value="diningtable">diningtable</option>
		<option value="toilet">toilet</option>
		<option value="tvmonitor">tvmonitor</option>
		<option value="laptop">laptop</option>
		<option value="mouse">mouse</option>
		<option value="remote">remote</option>
		<option value="keyboard">keyboard</option>
		<option value="cell phone">cell phone</option>
		<option value="microwave">microwave</option>
		<option value="oven">oven</option>
		<option value="toaster">toaster</option>
		<option value="sink">sink</option>
		<option value="refrigerator">refrigerator</option>
		<option value="book">book</option>
		<option value="clock">clock</option>
		<option value="vase">vase</option>
		<option value="scissors">scissors</option>
		<option value="teddy bear">teddy bear</option>
		<option value="hair drier">hair drier</option>
		<option value="toothbrush">toothbrush</option>

      </select>
    </div>
    
    <button type="submit" name="formSubmit[]" class="btn btn-primary">Submit</button>
  </fieldset>
</form>


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
		for($i=0; $i < $nobject; $i++)
		{
			echo($aobject[$i]." ");
		}
		echo("</p>");
	}
}
?>


<?php
$classe=$_POST['object'];
$query = $pdo->query("SELECT ".$classe." FROM `classename` ");
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


<form>
  <fieldset>
    <div class="form-group">
      <label for="exampleSelect2">Object selection</label>
      <select name = "Make your choice" multiple="multiple" class="form-control" id="exampleSelect2">
<?php 

//
//
$query = $pdo->query("SELECT * FROM `classename` ");
$resultat = $query->fetchAll();
$i=0;
while ($resultat -> fetchArray() ){
	?>
	
	<option value=" 
	<?
	=$resultat[$key]['name'];
	?>
	">
	<?
	=$resultat[$key]['name'];
	?>

	
	</option>
<?php
$i++;
}
?>
</select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>


</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>