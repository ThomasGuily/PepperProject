<?php
$name = $_POST['OK'];
exec("C:/Anaconda/Scripts/activate newenv && cd C:/wamp/www/app/finalapp/PepperProject/py27scripts && python hello.py $name");
 

include ("MultiSelect.php");

?>