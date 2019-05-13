from naoqi import ALProxy
import qi
import argparse
import sys
import time
import socket
import motion

def main(session):
    posture = session.service("ALRobotPosture") 
    tracker = session.service("ALTracker")
    posture.goToPosture("StandInit", 100)
    frame = motion.FRAME_TORSO
    maxSpeed = 1
    tracker.lookAt([10.0, 0.0, 0.0], frame, maxSpeed, False)
    #posture.stopMove()

if __name__ == "__main__":
    parser = argparse.ArgumentParser()
    parser.add_argument("--ip", type=str, default="10.107.70.12",
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