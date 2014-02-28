import os
import time
import RPi.GPIO as GPIO ## Import GPIO library

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD) ## Use board pin numbering
GPIO.setup(22, GPIO.OUT)
GPIO.output(22, True)
