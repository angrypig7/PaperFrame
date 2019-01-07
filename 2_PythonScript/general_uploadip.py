import os
import requests
import time

def upload(localip, thermal):
        URL = "http://paperframe.dothome.co.kr/server.php?serverno=1"
        data = {
                "localip": localip,
                "thermal": thermal,
        }
        response = requests.post(URL, data=data, timeout=10, verify=True)
        #       print(localip)
        #       print(thermal)
        #       print(response)
        return

count = 1

while 1:
        localip = os.popen("ifconfig").read()
        thermal = os.popen("vcgencmd measure_temp").read()
        thermal = thermal.replace("temp=", "")
        thermal = thermal.replace("'C", "")
        upload(localip, thermal)

        iplength = len(localip)
        ctlength = len(thermal)
        if(iplength>5 and ctlength>1):
                print()
                print("SUCCESS")
                print()
                count += 100
        else:
                count+=1
                print()
                print("ERROR")
                print()
        if count>2 and count<20:
                upload(localip, "ERROR1")
                upload("ERROR", "ERROR2")
        break