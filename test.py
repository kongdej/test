
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
  if topic == "/PudzaSOI/test_cmd" :
      print "Recv:" + message
    

def disconnect():
  print "disconnect is work"

microgear.setalias("test")
microgear.on_connect = connection
microgear.on_message = subscription
microgear.on_disconnect = disconnect
microgear.subscribe("/test_data");
microgear.subscribe("/test_cmd");

microgear.connect(False)

i=0
while True:
  i = i + 1
  d = 't='+str(i)+',ec='+str(i+1)+',tb='+str(i+2)+',ph='+str(i+3)
  microgear.publish("/test_data",d,{"retain":True})
  time.sleep(1)  
