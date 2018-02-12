import os
import requests
import time

def upload(localip, thermal):
    URL = "http://paperframe.dothome.co.kr/raspberryDataInput.php"
    data = {
        "localip": localip,
        "thermal": thermal,
    }
    response = requests.post(URL, data=data, timeout=10, verify=True)
    #       print(thermal)
    #       print(response)
    return

count = 1

localip = os.popen("ifconfig").read()
iplength = len(localip)

while 1:
    thermal = os.popen("vcgencmd measure_temp").read()
    ctlength = len(thermal)
    thermal = thermal.replace("temp=", "")
    thermal = thermal.replace("'C", "")

    if ctlength>4:
        upload(localip, thermal)
    else:
        upload("ERROR")

    time.sleep(1800)