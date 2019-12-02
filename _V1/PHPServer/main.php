<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Seoul');

include_once("./head.php");
include_once('dist/Medoo.php');

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
    $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
    else
    $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function elapsed_time($timestamp, $precision = 2) {
    $time = time("Y-m-d H:i:s") - $timestamp;
    $a = array('decade' => 315576000, 'year' => 31557600, 'month' => 2629800, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'min' => 60, 'sec' => 1);
    $i = 0;
    foreach($a as $k => $v) {
        $$k = floor($time/$v);
        if ($$k) $i++;
        $time = $i >= $precision ? 0 : $time - $$k * $v;
        $s = $$k > 1 ? 's' : '';
        $$k = $$k ? $$k.' '.$k.$s.' ' : '';
        @$result .= $$k;
    }
    return $result ? $result.'ago' : '1 sec to go';
}

$publicip = get_client_ip();
$curtime = (new DateTime())->format("Y-m-d H:i:s");

if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
    if($menu>10 || $menu<0){
        die("INVALID REQUEST FORMANT");
    }
}else{
    $menu = 0;
}

$server[3][6] = "0";
for($i=1; $i<4; $i++){
    $SQL = "SELECT * FROM pf_servers WHERE serverNum=$i ORDER BY idx DESC LIMIT 1";
    $result = mysqli_query($conn, $SQL);
    while($row = mysqli_fetch_assoc($result)){
        $server[$i-1][0] = $row['timestamp'];
        $server[$i-1][1] = $row['serverNum'];
        $server[$i-1][2] = $row['serverName'];
        $server[$i-1][3] = $row['local_ip'];
        $server[$i-1][4] = $row['public_ip'];
        $server[$i-1][5] = $row['test'];
    }
}

$ser1TS = $server[0][0];
$ser1Name = $server[0][2];
$ser1LocIP = substr($server[0][3], 0, 80);
$ser1PubIP = $server[0][4];
$ser1TSElap = elapsed_time(strtotime($server[0][0]));
$ser1status = time("Y-m-d H:i:s")-strtotime($server[0][0]) < 86400 ? 1 : 0;  // 1 if last report has been around less than a day

$ser2TS = $server[1][0];
$ser2Name = $server[1][2];
$ser2LocIP = $server[1][3];
$ser2PubIP = $server[1][4];
$ser2TSElap = elapsed_time(strtotime($server[1][0]));
$ser2status = time("Y-m-d H:i:s")-strtotime($server[1][0]) < 86400 ? 1 : 0;  // 1 if last report has been around less than a day

$ser3TS = $server[2][0];
$ser3Name = $server[2][2];
$ser3LocIP = $server[2][3];
$ser3PubIP = $server[2][4];
$ser3TSElap = elapsed_time(strtotime($server[2][0]));
$ser3status = time("Y-m-d H:i:s")-strtotime($server[2][0]) < 86400 ? 1 : 0;  // 1 if last report has been around less than a day



?>

<!-- content -->
<div class="wrapper row2">
    <div id="container" class="clear">
        <!-- content body -->
        <div id="homepage">

            <!-- One Quarter -->
            <h1>Server List</h1>
            <section id="services" class="clear">
                <article>
                    <figure><img src="assets/images/ethernet_<?php  if($ser1status) echo"green"; else echo"orange"; ?>.png" width="32" height="32" alt=""></figure>
                    <strong>Server1 - <?php echo"$ser1Name";?> </strong>
                    <p>Last report: <?php echo"$ser1TS";?> <a href="#"><?php echo"$ser1TSElap";?></a></p>
                    <p>PublicIP: <a href="#"><?php echo"$ser1PubIP";?></a></p>
                    <p>LocalIP: <a href="#"><?php echo"$ser1LocIP";?></a></p>
                    <p class="more"><a href="#">Detailed Info &raquo;</a></p>
                </article>

                <article>
                    <figure><img src="assets/images/ethernet_<?php  if($ser2status) echo"green"; else echo"orange"; ?>.png" width="32" height="32" alt=""></figure>
                    <strong>Server2 - <?php echo"$ser2Name";?> </strong>
                    <p>Last report: <?php echo"$ser2TS";?> <a href="#"><?php echo"$ser2TSElap";?></a></p>
                    <p>PublicIP: <a href="#"><?php echo"$ser2PubIP";?></a></p>
                    <p>LocalIP: <a href="#"><?php echo"$ser2LocIP";?></a></p>
                    <p class="more"><a href="#">Detailed Info &raquo;</a></p>
                </article>

                <article class="last">
                    <figure><img src="assets/images/ethernet_<?php  if($ser3status) echo"green"; else echo"orange"; ?>.png" width="32" height="32" alt=""></figure>
                    <strong>Server3 - <?php echo"$ser3Name";?> </strong>
                    <p>Last report: <?php echo"$ser3TS";?> <a href="#"><?php echo"$ser3TSElap";?></a></p>
                    <p>PublicIP: <a href="#"><?php echo"$ser3PubIP";?></a></p>
                    <p>LocalIP: <a href="#"><?php echo"$ser3LocIP";?></a></p>
                    <p class="more"><a href="#">Detailed Info &raquo;</a></p>
                </article>
            </section>

            <section id="code">
                <p>
                    URL: http://paperframe.dothome.co.kr/upload.php <br>
                    Fields: serverNum, serverName, localip, test
                </p>
            </section>


            <section id="code">
                <!-- <p>
                    ini_set('display_errors', 1);<br>
                    ini_set('display_startup_errors', 1);<br>
                    error_reporting(E_ALL);
                </p> -->
            </section>

        </div>
    </div>
</div>
<!-- Footer -->
<?php include("./footer.php");?>
