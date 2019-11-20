<?php
    $connect=mysql_connect( "localhost", "kang", "1111") or
        die( "SQL server에 연결할 수 없습니다.");
    mysql_select_db("mall",$connect);
?>
