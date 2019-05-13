from naoqi import ALProxy
import sys



tts = ALProxy("ALTextToSpeech", "10.107.70.12", 9559) 


tts.setParameter("speed", 100)

tts.say("Je n'ai pas trouver d'exemplaire de cette classe, on recommence ?")
	
	
