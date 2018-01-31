
# PaperFrame - server management script (in progress)

### Link 
	> [config backup] https://forum.openmediavault.org/index.php/Thread/5080-Configuration-Backup/
	> [PPTP server] http://www.daftdevil.com/8

	

# Main Server
	- SocketPing.php 파일은 관리자가 접속시에만 확인 및 DB기록 -> server.php파일에 ip 및 port 지정하는 페이지 제작, Main.php 이더넷 아이콘 수정
	- 개별 서버 보고를 주기적인 DB기록 용도로 사용 -> cron에서 주기 줄이기
	- paperframe 접속 기록 모두 DB에 기록
	- Odroid를 제외한 나머지 서버는 웹에서 변경이 가능하도록 설정
	- setcronjob.com 같은 서비스를 사용할 수도

### DB구성
> 0: 메인서버, 1: Odroid, 2: RasPi, 3:ETC

	- pf_servers (개별서버의 보고기록 및 메인서버의 socket 결과 저장)
		○ idx, datetime, serverno, alive, public_ip, local_ip, temperature, load_status, 
	- pf_accesslog (모든 서버의 접속 기록)
		○ idx, datetime, serverno, public_ip, file
	- pf_serverstatus (메인 서버에서 확인하는 alive 여부)
		○ idx, datetime, port, serverno, errno, errstr

### 메인 서버
	- 개별 서버의 alive 여부 판단(fsockopen, 시스템 쉘)
	- 소켓의 errno, errstr및 22, 80등의 well-known 포트 상태 모두 기록
	- 모든 정보는 DB에 저장 -> 서버 번호로 구분

### 개별 서버
	- startup script로 스크립트 실행
		○ 파이썬 스크립트 내부의 딜레이
		○ cron을 비롯한 스케줄러 사용
	- 2개이상의 프로세스를 통한 좀비화
	- 서버 번호, 'ifconfig'결과, 센서 측정값(온도, 전력량), 로드율(CPU, 메모리, 네트워크), 디스크 상태, 작동 속도
	- 로그 파일도 업로드
	- 어드민 PHP관리 파일을 통한 보고

### 보안
	- 메인서버 접속시 접속 IP로깅+로그인 성공/실패
	- 개별 서버에서 접속 기록 모두 보고
	- 개별 서버의 주기적인 로그 파일 업로드

#

## individual server

### Security
	- DenyHosts
	- ReportHackISP
	- fail2ban

### idea
	- OMV기준으로 CPU 작동속도 지정(1400/1400 이상)
	- 20V -> 5V감압모듈 + UPS회로로 전원부 구성
	- PPTP VPN서버 구성
	- 온도 및 로드율 정수형으로 보고하는 스크리트 제작
	
### Keyword
	- /pi/home/startup/uploadip.py
	- /etc/ppp/chap-secrets
	- vcgencmd measure_temp
	- PHPSysInfo

### AppJam installs
	sudo apt install apache2
	sudo apt install php7.0
	sudo apt install libapache2-mod-php7.0
	sudo apt install mysql-service
	
### Link
	- [PPTP Server] http://www.daftdevil.com/8

### Cron Scripts
	- SAMPLE
		a. printf "\n===============================================================================\n #finger -l:\n\n";finger -l;

	- Reports
		a. printf "\n=================================================================    ==============\n #ifconfig:\n\n"; ifconfig; printf "\n===============================================================================\n #users:\n\n"; users; printf "\n=================================================================    ==============\n #finger:\n\n"; finger; printf "\n===============================================================================\n #finger -l:\n\n";finger -l; printf "\n=====================================    ==========================================\n #iptables -L:\n\n"; iptables -L; printf "\n===============================================================================\n #cat /var/log/auth.log|tail -n 50:\n\    n"; cat /var/log/auth.log|tail -n 100; printf "\n===============================================================================\n #ps -u root:\n\n"; ps -u root; printf "\n===================================    ============================================\n\n";

	- Reboot
		a. printf "\n===============================================================================\n #ifconfig:\n\n"; ifconfig; printf "\n===============================================================================\n #finger -l:\n\n"; finger -l; printf "\n===============================================================================\n #iptables -L:\n\n"; iptables -L;printf "\n===============================================================================\n\n";

