import os
import requests

def upload(localip):
        URL = "http://paperframe.dothome.co.kr/upload.php"
        data = {
                "serverNum": "1",
                "serverName": "Odroid_HC1",
                "localip": localip,
        }
        response = requests.post(URL, data=data, timeout=10, verify=True)
        print(response)
        return


localip = os.popen("ifconfig eth0 | grep 'inet'").read()  # Linux
# localip = os.popen("chcp 437 | ipconfig").read()  # Windows
localip = localip.encode(encoding="UTF-8")
upload(localip)
