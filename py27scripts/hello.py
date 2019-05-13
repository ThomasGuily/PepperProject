from naoqi import ALProxy
import sys

who = sys.argv[1]

tts = ALProxy("ALTextToSpeech", "10.107.70.12", 9559) 


tts.setParameter("speed", 100)

tts.say("bonjour " + str(who) +", et si on jouait ensemble !")