import os
import time
import RPi.GPIO as GPIO ## Import GPIO library

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD) ## Use board pin numbering
GPIO.setup(13, GPIO.OUT)
GPIO.output(13, False)
