<?php
/**
 * Created by PhpStorm.
 * User: angrypig
 * Date: 2017-11-05
 * Time: 오후 8:20
 */
include_once('dist/Medoo.php');

$SQL = "CREATE TABLE `paper_server` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `time` date(40) NULL DEFAULT NULL,
  `local_ip` varchar(45) DEFAULT NULL,
  `public_ip` varchar(45) DEFAULT NULL,
  `core_temp` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

mysqli_query($conn, $SQL);

?>
