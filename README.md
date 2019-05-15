# PepperProject
Web application interacting with Pepper Robot to recognize object in images (using Yolov3 implementation in keras and tensorflow)

Installer Php, Sql et Apache via Wampserver (Xamp/Lamp en fonction de l'OS, attention à installer dans le répertoire C://wamp).
Installer Anaconda 3 via le site officiel: rajouter à la variable d'environnement Home le chemin d'installation d'Anaconda pour pouvoir accéder à tous les services d'Anaconda directement dans l'invité de commande. Ouvrir un cmd et taper conda pour vérifier que la commande est reconnue.

Créer l'environnement initial pour communiquer avec le robot en python 2.7, installez-y pillow au passage en forçant Anaconda à fonctionner en 32bits (sinon possibles conflits avec la librairie naoqi qui est en 32 bits). Les commandes sont: 

set CONDA_FORCE_32BIT=1
conda create -n newenv python=2.7 pillow


Installer le sdk Naoqi (Python 2.7) disponible sur le site d'Aldebaran (suivre la documentation sur : http://doc.aldebaran.com/2-5/dev/python/install_guide.html).
Vérifier  en activant l'environnement: pour cela, taper :
 
activate newenv
python
import naoqi

Si aucun message d'erreur n'apparait, l'installation de la librairie est complétée.

Télécharger Cuda (dernière version pour les meilleures performances) et installer la librairie CUDNN correspondante, l'installation est ardue mais nécessaire pour obtenir l'accélération graphique voici un lien qui explique tout dans le détail : https://towardsdatascience.com/installing-tensorflow-with-cuda-cudnn-and-gpu-support-on-windows-10-60693e46e781.

Créer un nouvel environnement appelé yolo avec toutes les librairies nécessaires (veillez à ce que Anaconda soit en 64bits pour cette installation) : conda create -n yolo python=3.7 keras-gpu pillow matplotlib opencv. Vérifier que l'accélération graphique fonctionne en exécutant du code.

Télécharger le contenu du repository de l'adresse https://github.com/ThomasGuily/PepperProject. Déziper son contenu dans C://wamp/www/app/finalapp (un dossier PepperProject est alors créé, attention si le fichier n'est pas dans cette destination il faut changer tous les chemins des commandes exec() dans les fichiers .php). Pour finir, ouvrir phpmyadmin et éxecuter le script sql contenu dans /sql/classe.sql, afin de créer la base de donnée manipulée dans le cadre de notre projet.

Changer l'adresse IP pour mettre celle de Pepper dans les fichiers .py du dossier /py27scripts.
Changer le nom du PC dans les balises javascript au début des fichiers suivants : enter.html, choixPerso.php.
Taper localhost/app/finalapp/PepperProject dans votre explorateur et vérifier que tout fonctionne correctement en parcourant l'application.

N'oubliez pas non plus d'acheter le robot PEPPER (aldebaran robotics) pour la modique somme de 20000€!!!
