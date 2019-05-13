#! /usr/bin/env python
# -*- encoding: UTF-8 -*-

"""Example: Use transformInterpolations Method on Arm"""

import qi
import argparse
import sys
import motion
import almath


def main(session):
    """
    Use transformInterpolations Method on Arm
    """
    # Get the services ALMotion & ALRobotPosture.
    tracker= session.service("ALTracker")
    x = 0.0
    y = -0.1
    z = 0.0

    maxSpeed = 1 
    effector = "RArm"

    frame = motion.FRAME_TORSO
      

    tracker.pointAt(effector, [x, y, z], frame, maxSpeed)
	

    x = 0.0
    y = 0.1
    z = 0.0

    maxSpeed = 1 
    effector = "LArm"

    frame = motion.FRAME_TORSO
      

    tracker.pointAt(effector, [x, y, z], frame, maxSpeed)
	
    


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

