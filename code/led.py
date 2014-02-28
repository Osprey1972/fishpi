import RPi.GPIO as GPIO ## Import GPIO library

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD) ## Use board pin numbering
GPIO.setup(26, GPIO.OUT)
GPIO.setup(16, GPIO.OUT)
GPIO.setup(22, GPIO.OUT)


def greenon():
	GPIO.output(26, True)

def greenoff():
	GPIO.output(26, False)

def yellowon():
	GPIO.output(16, True)

def yellowoff():
	GPIO.output(16, False)

def redon():
	GPIO.output(22, True)

def redoff():
	GPIO.output(22, False)
