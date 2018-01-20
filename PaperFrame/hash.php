<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PAPERFRAME - hash</title>
    <link rel="stylesheet" href="assets/css/main-layout.css" type="text/css">
    <script type="text/javascript" src="assests/js/main.js"></script>
    <?php include "login.php"; ?>
</head>
<body>
    <?php
    $input = "admin";
    $hashtye = "sha512";
    if(isset($_POST['input'])){
        $input = $_POST['input'];
    }
    if(isset($_POST['hashtype'])){
        $hashtype = strtolower($_POST['hashtype']);
    }
    // 여기서부터 재시작.
    // HASH종류를 POST로 받은 후 (GET으로 바꾸는게 낫겠다) hash_algos()함수에서
    // 나오는 어레이에 포함되면 패스, 없으면 MD5로 변형

    for($i=1;$i<46;$i++){
        foreach (hash_algos() as $hashlist) {
            $com = strcmp($hashlist, $hashtype);
            if($com==0){
                break;
            }
        }
        $hashtype
    }

    $result = 0;

    $hash1 = hash($hashtype, $input);
    $hash2 = hash($hashtype, $hash1);
    $hash3 = hash($hashtype, $hash2);
    $hash4 = hash($hashtype, $hash3);
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
                <h1><?php echo"$hashtype"; ?> HASH</h1>
                <section id="code">
                    <form class="" action="/hash.php" method="post">
                        <input type="text" name="input" placeholder="string to hash"></br>
                        <input type="text" name="hashtype" value="sha512" required></br>
                        <input type="submit" value="HASH">
                    </form>
                </section>
                <section id="code">
                    <?php
                    echo"HASH1: $hash1";
                    echo"</br></br>HASH2: $hash2";
                    echo"</br></br>HASH3: $hash3";
                    echo"</br></br>HASH4: $hash4</br>";
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
