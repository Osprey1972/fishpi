import RPi.GPIO as GPIO ## Import GPIO library

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD) ## Use board pin numbering

GPIO.setup(26, GPIO.OUT)
GPIO.output(26, False)
