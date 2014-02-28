import os
import time
import RPi.GPIO as GPIO ## Import GPIO library

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD) ## Use board pin numbering
GPIO.setup(11, GPIO.OUT)
GPIO.setup(15, GPIO.OUT)
GPIO.setup(18, GPIO.OUT)
GPIO.setup(13, GPIO.OUT)
loff = "OFF"
lon = "ON"


if GPIO.input(15) == False:
	f = open ('/var/www/fishpi/code/actinic_status.txt','w')
	f.write (loff)
	f.close
	print ("Actinic Lights Are OFF") # Actinic
if GPIO.input(15) == True:
	f = open ('/var/www/fishpi/code/actinic_status.txt','w')
	f.write (lon)
	f.close
	print ("Actinics Lights Are ON") # Actinic
if GPIO.input(18) == False:
	f = open ('/var/www/fishpi/code/daylight_status.txt','w')
	f.write (loff)
	f.close
 	print ("Daylights Are OFF") # Daylight
if GPIO.input(18) == True:
	f = open ('/var/www/fishpi/code/daylight_status.txt','w')
	f.write (lon)
	f.close
 	print ("Daylights Are ON") # Daylight
if GPIO.input(11) == False:
	f = open ('/var/www/fishpi/code/moonlight_status.txt','w')
	f.write (loff)
	f.close
	print ("Moonnlights Are OFF") # Moon
if GPIO.input(11) == True:
	f = open ('/var/www/fishpi/code/moonlight_status.txt','w')
	f.write (lon)
	f.close
    	print ("Moonlights Are ON") # Moon
if GPIO.input(13) == False:
	f = open ('/var/www/fishpi/code/sumplight_status.txt','w')
	f.write (loff)
	f.close
        print ("Sump Lights Are OFF") # Sump
if GPIO.input(13) == True:
	f = open ('/var/www/fishpi/code/sumplight_status.txt','w')
	f.write (lon)
	f.close
        print ("Sump Lights Are ON") # Sump


