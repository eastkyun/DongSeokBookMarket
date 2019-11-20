<?php
include '../dbconn.php';
$sql= 'select * from book where num = '.$_GET['num'].';';
$result = mysql_query($sql, $connect);
$row = mysql_fetch_array($result);
$sql='update book set recommended=recommended+1 where num = '.$_GET['num'].';';
$result = mysql_query($sql, $connect);
echo "
    <script>
    history.go(-1)
    </script>
 "; ?>
