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


   $sql = "select price from book where num = $_GET[book]";
   $result = mysql_query($sql, $connect);
   $row1 = mysql_fetch_array($result);
   $price = $row1['price'];
   $sql = "insert into purchase(book_num,user_id,quantity)";
   $sql .= "values ($_GET[book],'$_SESSION[id]',$_GET[quan]);";

   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행

   mysql_close();                // DB 연결 끊기

   echo "
	   <script>
	      location.href = './index.php';
	   </script>
	";
?>
