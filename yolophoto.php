

 


<?php
 
$classe = $_GET ["choice"];
exec("C:/Anaconda/Scripts/activate newenv && cd C:/wamp/www/app/finalapp/PepperProject/py27scripts && python standinit.py");
exec("C:/Anaconda/Scripts/activate newenv && cd C:/wamp/www/app/finalapp/PepperProject/py27scripts && python streamimage.py");
exec("C:/Anaconda/Scripts/activate yolo && cd C:/wamp/www/app/finalapp/PepperProject/kerasyolov3 && python yolo_video.py $classe", $value); 
//en enlevant la variable $classe, tout fonctionne bien (si on a bien commenté tout les sys.argv[1] dans le fichier .py évidemment)
include ("resultat.php");

//echo "valeur envoye ".$classe;

//var_dump($value);


$result = count($value) ; 
//echo "valeur envoye ".$result ;
$recognize = ($result - 1)/2 ;
//echo "valeur envoye ".$recognize ;

if (1 == $result) {
    exec("C:/Anaconda/Scripts/activate newenv && cd C:/wamp/www/app/finalapp/PepperProject/py27scripts && python dialog1.py");
} 

else {
	
	$anglehor = $value[1]; //converts an array to JSON string
	$anglever = $value[2]; //converts an array to JSON string
	
	//echo "valeur envoye ".$anglehor." ".$anglever ;
	exec("C:/Anaconda/Scripts/activate newenv && cd C:/wamp/www/app/finalapp/PepperProject/py27scripts && python bougebras.py $recognize $anglehor $anglever",$test);
	//var_dump($test);
}



?>
		
