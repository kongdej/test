
#!/usr/bin/python
import microgear.client as microgear
import time


# NETPIE appid and apikeys
appid = "PudzaSOI"
gearkey = "xXCgD7V2IbWlArR"
gearsecret =  "QgrhkLHJ3xbbm58B9TsVtK15d"

microgear.create(gearkey,gearsecret,appid,{'debugmode': False})

def connection():
  print "Now I am connected with netpie"

def subscription(topic,message):
  print topic+"="+message
    

def disconnect():
  print "disconnect is work"

microgear.setalias("test")
microgear.on_connect = connection
microgear.on_message = subscription
microgear.on_disconnect = disconnect
microgear.subscribe("/test");

microgear.connect(False)

i=0
while True:
  i = i +1
  microgear.publish("/test",i,{"retain":True})
  time.sleep(1)  
