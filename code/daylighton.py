import os
import time
import RPi.GPIO as GPIO ## Import GPIO library
GPIO.setmode(GPIO.BOARD) ## Use board pin numbering
GPIO.setup(24, GPIO.OUT) ## Setup GPIO Pin 24 to OUT
GPIO.setup(21, GPIO.OUT) ## Setup GPIO Pin 26 to OUT
GPIO.setup(7, GPIO.OUT)
GPIO.setup(23, GPIO.OUT)
GPIO.setup(18, GPIO.OUT)
GPIO.output(18, True)  ## Turn on GPIO pin 21
