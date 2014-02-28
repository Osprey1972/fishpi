import os

file = "/var/www/fishpi/code/pi_cpu_temp.txt"

x = os.popen("/opt/vc/bin/vcgencmd measure_temp").read()
f = x
result = f
v = result.replace("\n","")
w = v.replace("temp=","")
x = w.replace("'C","")
f = open(file,"w")
result = f.write(x)
f.close()
