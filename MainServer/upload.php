<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PAPERFRAME - upload</title>
    <link rel="stylesheet" href="assets/css/main-layout.css" type="text/css">
    <script type="text/javascript" src="assests/js/main.js"></script>
    <?php include "login.php"; ?>
</head>
<body>
    <?php

    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
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
    $publicip = get_client_ip();
    $curtime = (new DateTime())->format("Y-m-d H:i:s");
    $localip = "0";//inital value
    $temperature = "0";//inital value
    $serverno = -100;//inital value

    if(isset($_GET['serverno'])){
        $serverno = $_GET['serverno'];
    }
    if(isset($_POST['localip'])){
        $localip = $_POST['localip'];
    }
    if(isset($_POST['temperature'])){
        $temperature = $_POST['temperature'];
    }

    if($localip!=0){
        $SQL = "INSERT INTO pf_servers VALUES('', '$curtime',  '$serverno', '$localip', '$publicip', '$temperature')";
        mysqli_query($conn, $SQL);
    }
    ?>
    <div class="wrapper row1">
        <header id="header" class="clear">
            <div id="hgroup">
                <h1><a href="/main.php">Paper<span>frame</span></a></h1>
                <h2>server management page powered from Odroid</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="/upload.php?serverno=1">Server1</a></li>
                    <li><a href="/upload.php?serverno=2">Server2</a></li>
                    <li><a href="/upload.php?serverno=3">Server3</a></li>
                    <li><a href="/hash.php">HASH</a></li>
                    <li class="last"><a href="/">LOGOUT</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- content body -->
            <div id="homepage">
                <!-- One Quarter -->
                <h1>UPLOAD</h1>
                <section id="code">
                    <form class="" action="upload.php" method="post">
                        <input type="text" name="localip" placeholder="localip"></br>
                        <input type="text" name="temperature" placeholder="temperature"></br>
                        <input type="submit" value="Submit"></br>
                    </form>
                </section>
                <section id="code">
                    <?php
                    echo("serverno : $serverno</br>");
                    echo("publicIP : $publicip</br>");
                    echo("localip : $localip</br>");
                    echo("temperature : $temperature</br>");
                    echo("curtime : $curtime</br>");
                    ?>
                </section>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="wrapper row3">
        <footer id="footer" class="clear">
            <p class="fl_left">Paperframe - server powered from Odroid</a></p>
            <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
        </footer>
    </div>
</body>
</html>
