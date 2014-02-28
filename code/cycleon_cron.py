__author__ = 'fishpi'

from crontab import CronTab
import greenon
import redoff
run = ('sudo python /var/www/fishpi/code/cycleon.py')
tab = CronTab(user='pi')

f = open ('/var/www/fishpi/code/cycle_status.txt','w')
f.write ("ON")
f.close

job = tab.new(run, comment='Schedule Enabled')
job.minute.every(2)
tab.write()

#print tab.render() #Remove HASH From Line Start To Test / See Crontab
