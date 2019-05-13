import sys
import argparse
from yolo import YOLO, detect_video
from PIL import Image

def detect_img(yolo):
    while True:
        img = "C:/wamp/www/App/Finalapp/PepperProject/kerasyolov3/camImage.png"
        try:
            image = Image.open(img)
        except:
            print('Open Error! Try again!')
            continue
        else:
            
            r_image = yolo.detect_image(image,str(classe)) #img passe dans le réseau de neurone
            
            #r_image.show() 
            r_image.save("C:/wamp/www/App/Finalapp/PepperProject/kerasyolov3/camerapepper.png")
        break;
    yolo.close_session()

FLAGS = None

if __name__ == '__main__':

    #print(sys.argv[1]) #la valeure est bien récupérée mais le code crash plus bas
   
    # class YOLO defines the default value, so suppress any default here
    parser = argparse.ArgumentParser(argument_default=argparse.SUPPRESS)
    '''
    Command line options
    '''
   
	
    parser.add_argument(
        '--model', type=str,
        help='path to model weight file, default ' + YOLO.get_defaults("model_path")
    )
   
    parser.add_argument(
        '--anchors', type=str,
        help='path to anchor definitions, default ' + YOLO.get_defaults("anchors_path")
    )
   
    parser.add_argument(
        '--classes', type=str,
        help='path to class definitions, default ' + YOLO.get_defaults("classes_path")
    )
   
    parser.add_argument(
        '--gpu_num', type=int,
        help='Number of GPU to use, default ' + str(YOLO.get_defaults("gpu_num"))
    )
   
    parser.add_argument(
        '--image', default=True, action="store_true",
        help='Image detection mode, will ignore all positional arguments'
    )
  
    '''
    Command line positional arguments -- for video detection mode
    '''
    parser.add_argument(
        "--input", nargs='?', type=str,required=False,default='./path2your_video',
        help = "Video input path"
    )
    
    parser.add_argument(
        "--output", nargs='?', type=str, default="",
        help = "[Optional] Video output path"
    )
    
    
    FLAGS = parser.parse_args(['--image']) #ICI ça crash lorsque je passe une valeur de système
    
    if FLAGS.image:
        """
        Image detection mode, disregard any remaining command line arguments
        """
        #print("Image detection mode")
        classe = str(sys.argv[1])
        #print(sys.argv[1])
        #if "input" in FLAGS:
            #print(" Ignoring remaining command line arguments: " + FLAGS.input + "," + FLAGS.output)
        detect_img(YOLO(**vars(FLAGS)))
        
    elif "input" in FLAGS:
        detect_video(YOLO(**vars(FLAGS)), FLAGS.input, FLAGS.output)
    else:
        print("Must specify at least video_input_path.  See usage with --help.")
