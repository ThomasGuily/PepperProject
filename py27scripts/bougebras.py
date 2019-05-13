from naoqi import ALProxy
import qi
import sys
import time
import socket
import motion



tts = ALProxy("ALTextToSpeech", "10.107.70.12", 9559) 
tracker = ALProxy("ALTracker", "10.107.70.12", 9559)

tts.setParameter("speed", 100)

tts.say("J'ai trouver l'objet en question")
#print (sys.argv[1])
#print (sys.argv[2])
#print (sys.argv[3])


if int(sys.argv[1]) > 1 :
    tts.say("J'ai meme retrouver" +str(sys.argv[1]) + " exemplaires de la classe !")
    if float(sys.argv[2]) <= 400 and float(sys.argv[2]) >= 240:
        if float(sys.argv[3]) <= 300 and float(sys.argv[3]) >= 180:
            tts.say("L'un des objets se situe pile au centre de mon champ de vision!" )
        elif float(sys.argv[3]) > 300:
            tts.say("L'un des objets se situe en face de moi et vers le bas !" )
        else :
            tts.say("L'un des objets se situe en face de moi et vers le haut !" )
    elif float(sys.argv[2]) < 240:
        if float(sys.argv[3]) <= 300 and float(sys.argv[3]) >= 180:
            tts.say("L'un des objets se situe pile a ma guauche" )
        elif float(sys.argv[3]) > 300:
            tts.say("L'un des objets se situe a ma gauche et vers le bas !" )
        else :
            tts.say("L'un des objets se situe a ma gauche et vers le haut !" )
    else :
        if float(sys.argv[3]) <= 300 and float(sys.argv[3]) >= 180:
            tts.say("L'un des objets se situe pile a ma droite" )
        elif float(sys.argv[3]) > 300:
            tts.say("L'un des objets se situe a ma droite et vers le bas !" )
        else :
            tts.say("L'un des objets se situe a ma droite et vers le haut !" )

else :
    tts.say("J'ai trouver un seul exemplaire de cette classe !" )
    if float(sys.argv[2]) <= 400 and float(sys.argv[2]) >= 240:
        if float(sys.argv[3]) <= 300 and float(sys.argv[3]) >= 180:
            tts.say("Il se situe pile au centre de mon champ de vision!" )
        elif float(sys.argv[3]) > 300:
            tts.say("Il se situe en face de moi et vers le bas !" )
        else :
            tts.say("Il se situe en face de moi et vers le haut !" )
    elif float(sys.argv[2]) < 240:
        if float(sys.argv[3]) <= 300 and float(sys.argv[3]) >= 180:
            tts.say("Il se situe pile a ma guauche" )
        elif float(sys.argv[3]) > 300:
            tts.say("Il se situe a ma gauche et vers le bas !" )
        else :
            tts.say("Il se situe a ma gauche et vers le haut !" )
    else :
        if float(sys.argv[3]) <= 300 and float(sys.argv[3]) >= 180:
            tts.say("Il se situe pile a ma droite" )
        elif float(sys.argv[3]) > 300:
            tts.say("Il se situe a ma droite et vers le bas !" )
        else :
            tts.say("Il se situe a ma droite et vers le haut !" )
#640 hor 480 ver

	    


	


	

