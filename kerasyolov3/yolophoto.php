

 


<?php
 
//$aller= $_POST['OK'];



shell_exec("C:/Anaconda/Scripts/activate newenv && cd C:\Python27\Scripts\ && python streamimage.py");

//shell_exec("C:/Anaconda/Scripts/activate newenv && C:/wamp64/www/app/projetba3/hello.py $aller");

shell_exec("C:/Anaconda/Scripts/deactivate");

shell_exec( "C:/Anaconda/Scripts/activate yolo && cd C:\Python27\Scripts\keras-yolo3\ && python yolo_video.py --image $classe"); //&& cd C:\Python27\Scripts\keras-yolo3\ && python yolo_video.py --image");


echo "le script est executée ";
include ('resultat.php')




//echo "valeur envoye ".$aller;
?>
		
