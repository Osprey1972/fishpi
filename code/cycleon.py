__author__ = 'fishpi'

import time as wait
import RPi.GPIO as GPIO
import greenon
import redoff

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(13, GPIO.OUT) #sump
GPIO.setup(11, GPIO.OUT) #moonlight
GPIO.setup(15, GPIO.OUT) #actinic
GPIO.setup(18, GPIO.OUT) #daylight

def run():
    from datetime import datetime, time,date
    now = datetime.now()
    now_time = now.time()
    if now_time >= time(6,00) and now_time <= time(6,59):
	print ("1")
	GPIO.output(11, True)
       	GPIO.output(15, False)
       	GPIO.output(18, False)
    if now_time >= time(7,00) and now_time <= time(8,59):
	print ("2")
        GPIO.output(11, True)
        GPIO.output(15, True)
        GPIO.output(18, False)
    if now_time >= time(9,00) and now_time <= time(17,29):
	print ("3")
        GPIO.output(11, True)
        GPIO.output(15, True)
        GPIO.output(18, True)
    if now_time >= time(17,29) and now_time <= time(19,59):
        print ("4")
	GPIO.output(11, True)
        GPIO.output(15, False)
        GPIO.output(18, False)
    if now_time >= time(20,00) and now_time <= time(23,59):
	print ("5")
        GPIO.output(11, False)
        GPIO.output(15, False)
        GPIO.output(18, False)
run()	
    
