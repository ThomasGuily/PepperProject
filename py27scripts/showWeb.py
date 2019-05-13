import qi
import argparse
import sys
import time
from naoqi import ALProxy

def main(session):

    try:
        tabletService = session.service("ALTabletService")

        # Ensure that the tablet wifi is enable
        tabletService.enableWifi()

        tabletService.showWebview("http://10.107.70.12/App/Finalapp/PepperProject/index.html")
        #tabletService.showWebview("https://www.youtube.com")
        #tabletService.showWebview("https://js13kgames.com/games/re-wire/index.html")

        time.sleep(6000)

        # Display a local web page located in boot-config/html folder
        # The ip of the robot from the tablet is 198.18.0.1
        #tabletService.showWebview("https://www.youtube.com/watch?v=jkaRO8J_1XI")

       

        #Hide the web view
        #tabletService.hideWebview()
    except Exception, e:
        print "Error was: ", e

if __name__ == "__main__":
    parser = argparse.ArgumentParser()
    parser.add_argument("--ip", type=str, default="10.107.10.10",
                        help="Robot IP address. On robot or Local Naoqi: use '127.0.0.1'.")
    parser.add_argument("--port", type=int, default=9559,
                        help="Naoqi port number")

    args = parser.parse_args()
    session = qi.Session()
    try:
        session.connect("tcp://" + args.ip + ":" + str(args.port))
    except RuntimeError:
        print ("Can't connect to Naoqi at ip \"" + args.ip + "\" on port " + str(args.port) +".\n"
               "Please check your script arguments. Run with -h option for help.")
        sys.exit(1)
    main(session)