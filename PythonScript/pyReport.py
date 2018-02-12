import os
import requests
import time

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
        print()
        print("LOCALIP : " + str(localip))
        print("THERMAL : " + str(thermal))
        print("SERVERNO : " + str(serverno))
        print("RESPONSE : " + str(response))
        print()
        return

count = 1

while 1:
        serverno = 1
        localip = os.popen("ifconfig").read()
        thermal = 123
#        thermal = os.popen("awk '{printf \"%3.1f\n\", $1/1000}' /sys/class/thermal/thermal_zone0/temp && awk '{printf \"%3.1f\n\", $1/1000}' /sys/class/thermal/thermal_zone1/temp && awk '{printf \"%3.1f\n\", $1/1000}' /sys/class/thermal/thermal_zone2/temp && awk '{printf \"%3.1f\n\", $1/1000}' /sys/class/thermal/thermal_zone3/temp && awk '{printf \"%3.1f\n\", $1/1000}' /sys/class/thermal/thermal_zone4/temp").read()
        freq = os.popen("cat /sys/devices/system/cpu/cpu0/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu1/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu2/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu3/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu4/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu5/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu6/cpufreq/cpuinfo_cur_freq && cat /sys/devices/system/cpu/cpu7/cpufreq/cpuinfo_cur_freq").read()
        
        serverno = str(serverno)
        localip = str(localip)
        thermal = str(thermal)
        freq = str(freq)
        upload(serverno, localip, thermal, freq)

        iplength = len(localip)
        tlength = len(thermal)
        if(iplength>5 and tlength>1):
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
                upload(localip, "ERROR1", "ERROR2")
                upload("ERROR", "ERROR2", "ERROR2")
        break