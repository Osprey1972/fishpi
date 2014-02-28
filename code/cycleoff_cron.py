__author__ = 'fishpi'

import redon
import greenoff
from crontab import CronTab

run = ('sudo python /var/www/fishpi/code/cycleon.py')
tab = CronTab(user='pi')

f = open ('/var/www/fishpi/code/cycle_status.txt','w')
f.write ("OFF")
f.close

tab.remove_all(run, comment='Schedule Enabled')
tab.write()

#print tab.render()  #Remove HASH from Line Start To Test / See Crontab
