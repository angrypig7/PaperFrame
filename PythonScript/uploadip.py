import os
import requests
import time

def upload(localip, coretemp):
        URL = "http://paperframe.dothome.co.kr/raspberryDataInput.php"
        data = {
                "localip": localip,
                "coretemp": coretemp,
        }
        response = requests.post(URL, data=data, timeout=10, verify=True)
        #       print(localip)
        #       print(coretemp)
        #       print(response)
        return

count = 1

while 1:
        localip = os.popen("ifconfig").read()
        coretemp = os.popen("vcgencmd measure_temp").read()
        coretemp = coretemp.replace("temp=", "")
        coretemp = coretemp.replace("'C", "")
        upload(localip, coretemp)

        iplength = len(localip)
        ctlength = len(coretemp)
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