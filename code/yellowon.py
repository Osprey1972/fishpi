import RPi.GPIO as GPIO ## Import GPIO library

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD) ## Use board pin numbering

GPIO.setup(16, GPIO.OUT)
GPIO.output(16, True)
