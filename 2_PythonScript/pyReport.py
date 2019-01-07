import os
import requests
import time
import string

def upload(serverno, localip, thermal, freq):
        serverno = str(serverno)
        localip = str(localip)
        thermal = str(thermal)
        freq = str(freq)
        URL = "http://paperframe.dothome.co.kr/upload.php"
        data = {
                "serverno": serverno,
                "localip": localip,
                "thermal": thermal,
                "freq": freq
        }
        response = requests.post(URL, data=data, timeout=10, verify=True)
        
        print("==============================")
        print("LOCALIP : ")
        print(str(localip))
        print("==============================")
        print("SERVERNO : " + str(serverno))
        print("THERMAL : " + str(thermal))
        print("CPUFREQ : " + str(freq))
        print("RESPONSE : " + str(response))
        print("==============================")

        return response

serverno = 1
localip = os.popen("ifconfig").read()
freq = os.popen("cat /sys/devices/system/cpu/cpu0/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu1/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu2/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu3/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu4/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu5/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu6/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu7/cpufreq/cpuinfo_cur_freq").read()
freq = freq.replace("\n", " // ")
# thermal = os.popen("awk '{printf "%3.1f\n", $1/1000}' /sys/class/thermal/thermal_zone0/temp && awk '{printf "%3.1f\n", $1/1000}' /sys/class/thermal/thermal_zone1/temp && awk '{printf "%3.1f\n", $1/1000}' /sys/class/thermal/thermal_zone2/temp && awk '{printf "%3.1f\n", $1/1000}' /sys/class/thermal/thermal_zone3/temp && awk '{printf "%3.1f\n", $1/1000}' /sys/class/thermal/thermal_zone4/temp").read()
ther1 = int(os.popen("cat /sys/class/thermal/thermal_zone0/temp").read())/1000
ther2 = int(os.popen("cat /sys/class/thermal/thermal_zone1/temp").read())/1000
ther3 = int(os.popen("cat /sys/class/thermal/thermal_zone2/temp").read())/1000
ther4 = int(os.popen("cat /sys/class/thermal/thermal_zone3/temp").read())/1000
thermal = str(ther1) + " // " + str(ther2) + " // " + str(ther3) + " // " + str(ther4)

serverno = str(serverno)
localip = str(localip)
thermal = str(thermal)
freq = str(freq)
iplength = len(localip)
tlength = len(thermal)
frlength = len(freq)

if(iplength>5 and tlength>1 and frlength>5):
        response = str(upload(serverno, localip, thermal, freq))
        if(str("<Response [200]>") == str(response)):
                print("SUCCESS")

