

<?php
    include "../dbconn.php";
    $sql='delete from qna_reply where num='.$_GET['num'].';';
    $result = mysql_query($sql, $connect);

   echo "
	   <script>
         window.alert('삭제되었습니다.')
       history.go(-1)
	   </script>
	";
 ?>
