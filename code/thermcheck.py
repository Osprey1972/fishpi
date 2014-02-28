import time
import led

file = ("/var/www/fishpi/code/therm.txt")
pi_cpu = ("/var/www/fishpi/code/pi_cpu_temp.txt")
database = ("/var/www/fishpi/code/database.db")


# Flashes Yellow LED everytime script is run (Every Minute from crontab)
# Remember you need to add this file to your crontab manually to run every minute using sudo

for i in range(0,4):
	led.yellowon()
	time.sleep(0.05)
	led.yellowoff()
	time.sleep(0.05)


# This is where my temperature probe is being read, your serial number will be different.
# If your modules are set according to my article in PiMag and you have setup your probe as per Adafruit
# you should just have to change the serial number to yours

tfile = open("/sys/bus/w1/devices/28-0000053cfcb7/w1_slave")
text = tfile.read()
tfile.close()
secondline = text.split("\n")[1]
thermdata = secondline.split(" ")[9]
therm = float(thermdata[2:])
therm = therm / 1000

xfile = open(pi_cpu)
cpu = xfile.read()
xfile.close


wfile = open (file,'w')
wfile.write (str(therm))
wfile.close()

#The readings taken above are then put into the SQLite DB for the graphs to read from.

import sqlite3
from time import ctime

createDb = sqlite3.connect(database)
curs = createDb.cursor()

def createTable():
    curs.execute('CREATE TABLE temperature (id INTEGER PRIMARY KEY,time TEXT,temp INTEGER,cpu INTEGER)')

def addTemp(time, temp, cpu):
    curs.execute('INSERT INTO temperature (time,temp,cpu) VALUES (?,?,?)',(time,temp,cpu))

def writedata():
    time = ctime()
    addTemp(time,therm,cpu)
    createDb.commit()

def callup():
    queryCurs.execute('SELECT * FROM temperature')
    for i in queryCurs:
        print "\n"
        for j in i:
            print j,
            
try:
	createTable()
except:
	print ("Table already exists, table not created.")

writedata()
