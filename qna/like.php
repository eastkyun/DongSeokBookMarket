<?php
include '../dbconn.php';
if(!isset($_SESSION['id'])){
    echo("
      <script>
        window.alert('로그인 후 이용하세요.')
        history.go(-1)
      </script>
    ");
    exit;

}
$sql= 'select * from qna where num = '.$_GET['num'].';';
$result = mysql_query($sql, $connect);
$row = mysql_fetch_array($result);
$sql='update qna set recommended=recommended+1 where num = '.$_GET['num'].';';
$result = mysql_query($sql, $connect);
echo "
    <script>
    history.go(-1)
    </script>
 "; ?>
