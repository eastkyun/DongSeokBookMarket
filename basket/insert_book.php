<?
   session_start();
   extract($_POST);
   extract($_GET);
   extract($_SESSION);
?>
<meta charset="utf-8">
<?
   if(!isset($_SESSION['id'])) {
     echo("
	   <script>
	     window.alert('로그인 후 이용하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   include "../dbconn.php";       // dconn.php 파일을 불러옴
   $quan=1;
   $sql = "insert into basket(book_num,user_id,quantity)";
   $sql .= "values ($num,'$id',$quan);";
   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행

   mysql_close();                // DB 연결 끊기

   echo "
	   <script>
	     location.href = './index.php';
	   </script>
	";
?>
