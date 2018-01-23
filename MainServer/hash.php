<?php
include("./head.php");
$input = "admin";
$hashtye = "sha512";
if(isset($_POST['input'])){
    $input = $_POST['input'];
}
if(isset($_POST['hashtype'])){
    $hashtype = strtolower($_POST['hashtype']);
}
else{
    $hashtype = "md5";
}
// 여기서부터 재시작.
// HASH종류를 POST로 받은 후 (GET으로 바꾸는게 낫겠다) hash_algos()함수에서
// 나오는 어레이에 포함되면 패스, 없으면 MD5로 변형

// for($i=1;$i<46;$i++){
//     foreach (hash_algos() as $hashlist) {
//         $com = strcmp($hashlist, $hashtype);
//         if($com==0){
//             break;
//         }
//     }
//     $hashtype
// }

$result = 0;

$hash1 = hash($hashtype, $input);
$hash2 = hash($hashtype, $hash1);
$hash3 = hash($hashtype, $hash2);
$hash4 = hash($hashtype, $hash3);
?>
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
<?php include("./footer.php"); ?>
