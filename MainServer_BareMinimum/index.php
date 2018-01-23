<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Paperframe - Free servers</title>
        <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?php
            print('</br>seems to be working</br>');
            include_once('dist/Medoo.php');
//            include_once('raspberryDataInput.php');
         ?>
         <p>
             <hr>
             <form class="" action="raspberryDataInput.php" method="post">
                 localip:</br>
                 <input type="text" name="localip" value=""></br>
                 coretemp:</br>
                 <input type="text" name="coretemp" value=""></br>
                 <input type="submit" name="" value="Submit"></br>
             </form>
             <hr>
         </p>

    </body>
</html>
