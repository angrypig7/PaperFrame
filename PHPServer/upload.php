<?php
$NOLOGIN = 4660;
include("./head.php");
include("./footer.php");
include_once('dist/Medoo.php');

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

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
$publicip = get_client_ip();
// $curtime = (new DateTime())->format("Y-m-d H:i:s");


if(isset($_POST['serverNum'])){
    $serverNum = $_POST['serverNum'];
}
else if(isset($_GET['serverNum'])){
    $serverNum = $_GET['serverNum'];
}
if(!isset($serverNum)){
    // $serverNum = 404;
    $serverNUm = NULL;
}

if(isset($_POST['serverName'])){
    $serverName = $_POST['serverName'];
}
else if(isset($_GET['serverName'])){
    $serverName = $_GET['serverName'];
}
if(!isset($serverName)){
    $serverName = NULL;
}

if(isset($_POST['localip'])){
    $localip = $_POST['localip'];
}
else{
    $localip = NULL;
}

if(isset($_POST['test'])){
    $test = $_POST['test'];
}
else{
    $test = NULL;
}

echo "$serverNum $localip $publicip $thermal";

$SQL = "INSERT INTO pf_servers (serverNum, serverName, local_ip, public_ip, test) VALUES('$serverNum', '$serverName', '$localip', '$publicip', '$test')";
mysqli_query($conn, $SQL);

// echo"<script>history.back();</script>";
// die;

?>
