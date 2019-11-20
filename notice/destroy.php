<?php
    include "../dbconn.php";
    $sql='delete from notice where num='.$_GET['num'].';';
    $result = mysql_query($sql, $connect);

   echo "
	   <script>
         window.alert('게시물이 삭제되었습니다.')
	   </script>
	";
    header("location: ./index.php")
 ?>
