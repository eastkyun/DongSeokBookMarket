<?php
    session_start();
    include "../dbconn.php";

    if(!isset($_SESSION['name'])){
        ?>
        <script>
            window.alert('로그인을 해주세요');
            history.go(-1);
        </script>
        <?php
    }
    else{
	$ID = $_SESSION['name'];
	$Title = $_POST['title'];
	$Content = $_POST['content'];
	$date = date('Y-m-d H:i:s');
	$sql = 'insert into free (name,subject,content, regist_day,recommended, hit) values("'.$ID.'", "' . $Title . '", "' . $Content . '", "' . $date . '", 0,0 )';
    echo "$sql";
    $result = mysql_query($sql, $connect);
	if($result) { // query가 정상실행 되었다면,
		$msg = "정상적으로 글이 등록되었습니다.";
        $sql= 'select * from free order by num desc;';
        $result2 = mysql_query($sql, $connect);
        $row = mysql_fetch_array($result2);
        $num = $row['num'];
        echo "$num";
		$replaceURL = './show.php?num=' . $num;
	} else {
		$msg = "글을 등록하지 못했습니다.";
?>
		<script>
			alert("<?php echo $msg?>");
			history.back();
        </script>
<?php
	}
?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
<?php } ?>
