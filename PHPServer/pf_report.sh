#!/bin/bash

serverNum="1"
localip=$(ifconfig)

curl --data-urlencode "serverNum=$serverNum" --data-urlencode "localip=$localip" "http://paperframe.dothome.co.kr/upload.php"
