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
    #       print(coretemp)
    #       print(response)
    return

count = 1

localip = os.popen("ifconfig").read()
iplength = len(localip)

while 1:
    coretemp = os.popen("vcgencmd measure_temp").read()
    ctlength = len(coretemp)
    coretemp = coretemp.replace("temp=", "")
    coretemp = coretemp.replace("'C", "")

    if ctlength>4:
        upload(localip, coretemp)
    else:
        upload("ERROR")

    time.sleep(1800)