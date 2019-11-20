<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./main.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>동석문고 - 온라인 도서문화 스토어</title>
        <style>
        .book_ad{

            width:100%;
            margin: 0 auto;
        }
        .address{
        }
        .demo-card-square.mdl-card {
          width: 320px;
          height: 320px;
          float: left;
        }
        .pagenation{
            float: none;
            margin: 0 auto;
        }
        .demo-card-square > .mdl-card__title {
          color: #fff;
        }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="gnb">
                <div class="gnbmenu">
                    <div class="gnbmenu">
                        <?php
                        if(!isset($_SESSION['id']) || !isset($_SESSION['name'])){
                            echo "<a href=\"./login/login.php\" alt=\"\">로그인 |</a>";
                            echo "<a href=\"./member/member.php\" alt=\"\">회원가입 |</a>";
                            echo "<a href=\"#\" alt=\"\">Mypage |</a>";
                        }
                        else {
                            $user_id = $_SESSION['id'];
                            $user_name = $_SESSION['name'];
                            echo "<a>$user_name($user_id) |</a>";
                            echo "<a href=\"./login/logout.php\">[로그아웃] |</a>";
                            echo "<a href=\"./member/member_update.php\" alt=\"\">Mypage |</a>";

                        }?>
                        <a href="./purchase/index.php">구매내역 |</a>
                        <a href="./basket/index.php">장바구니 </a>
                    </div>
                </div>
            </div>
            <div class="lns">
                <div class="logo">
                    <a href="./index.php"  ><img class = "logoimg" src="./img/dongseoklogo.png" alt="" ></a>
                </div>
                <div class="search">
                    <form class="" action="./search/search.php" method="get">
                        <input type="text" class = "searchbar" name="query" value = "" size="60" placeholder="검색어를 입력하세요">
                        <button type="submit" class="btn btn-primary" style="background-color:orange;border:1px solid orange;height:48px;width :80px;">검색</button>
                    </form>
                </div>
            </div>
            <div class="lnb">
                <div class="lnbmenu">
                    <a href="./year/index.php">연도별도서</a>
                    <a href="./recommended/index.php">추천도서</a>
                    <a href="./genre/index.php">장르별</a>
                    <a href="./notice/index.php">커뮤니티</a>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="book_ad" style="border: 2px solid rgb(242,93,46);margin:20px auto; width:80%; background-color:white;">
                <?php
                    require_once "./dbconn.php";
                    if(!isset($_GET['page']))$_GET['page']=1;
                    $end_row=5;
                    $start_row = ($_GET['page']-1)*$end_row;
                    $sql2= "select * from book order by recommended desc limit $start_row, $end_row";
                    $result = mysql_query($sql2, $connect);

                    ?>
                    <div class="ad_top" style="overflow:hidden;">
                        <div class="" style="float:right;">
                            <a href="./recommended/index.php?mode=이용자추천도서" style="font-size: 1.3em;position: relative; top: 10px; margin:20px;">+더보기</a>
                        </div>
                        <div class="" style="float:none;">
                            <h3 style=" margin:20px; width : 18%;border-bottom: 3px solid rgb(242,93,46); font-size:2.5em;">추천도서 Top 5</h3>
                        </div>
                    </div>
                    <div class="ad_content" style="overflow:hidden; width:100%; text-align:center; margin-top:15px">
                        <?php
                        while($row=mysql_fetch_array($result)){
                        ?>
                        <div class="content" style="float:left;position: relative; left: 17%; margin:3px;padding: 0 15px;">
                            <div class="img">
                                <img src="<?php echo "$row[path_img]"; ?>" alt="" style=" width: 190px; height:300px;" >
                            </div>
                            <div class="book_name">
                                <a href="./book/show.php?book_num=<?=$row['num']?>" style="font-decoration:none; color:black; font-size: 1.5em;"><?php echo "$row[name]"; ?></a>
                            </div>
                        </div>
                        <?php
                        }
                         ?>
                    </div>

            </div>
            <div class="community">
                <div class="comm" style="width: 80%; margin: 0 auto;">
                    <div class="comm_navi" style="position:relative; left:10px;">
                        <?php
                        if(!isset($_GET['comm']))$_GET['comm']="notice";
                        if($_GET['comm']==="notice"){

                            echo "<a href=\"./index.php?comm=notice\" style=\"background-color:rgb(242,93,46);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;border-right:1px solid #f2f4f7; box-sizing:border-box;\">공지사항</a>";
                            echo "<a href=\"./index.php?comm=free\" style=\"background-color:rgb(247,150,70);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;border-right:1px solid #f2f4f7; box-sizing:border-box;\">자유게시판</a>";
                            echo "<a href=\"./index.php?comm=qna\" style=\"background-color:rgb(247,150,70);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;\">QnA</a>";

                        }
                        else if($_GET['comm']==="free"){
                            echo "<a href=\"./index.php?comm=notice\" style=\"background-color:rgb(247,150,70);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;border-right:1px solid #f2f4f7; box-sizing:border-box;\">공지사항</a>";
                            echo "<a href=\"./index.php?comm=free\" style=\"background-color:rgb(242,93,46);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;border-right:1px solid #f2f4f7; box-sizing:border-box;\">자유게시판</a>";
                            echo "<a href=\"./index.php?comm=qna\" style=\"background-color:rgb(247,150,70);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;\">QnA</a>";
                            echo "";
                        }
                        else {
                            echo "<a href=\"./index.php?comm=notice\" style=\"background-color:rgb(247,150,70);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;border-right:1px solid #f2f4f7; box-sizing:border-box;\">공지사항</a>";
                            echo "<a href=\"./index.php?comm=free\" style=\"background-color:rgb(247,150,70);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;border-right:1px solid #f2f4f7; box-sizing:border-box;\">자유게시판</a>";
                            echo "<a href=\"./index.php?comm=qna\" style=\"background-color:rgb(242,93,46);color:white;width:33%;height:70px;float:left;text-decoration:none; text-align:center;font-size:2em;line-height:70px;font-style:bold;\">QnA</a>";
                        }
                        ?>
                    </div>
                    <?php
                        if($_GET['comm']==="notice"){
                            $sql="select * from notice order by num desc limit 5;";
                        }
                        else if($_GET['comm']==="free"){
                            $sql="select * from free order by num desc limit 5;";
                        }
                        else {
                            $sql="select * from qna order by num desc limit 5;";
                        }
                        $result = mysql_query($sql, $connect);
                     ?>
                    <div class="comm_content" >

                        <table class = 'table table-hover' style="background-color:white;">
                            <thead>
                                <tr>
                                    <th colspan="5">
                                        <h3>
                                            <?php
                                            if($_GET['comm']==="notice") echo "공지사항";
                                            else if($_GET['comm']==="free") echo "자유게시판";
                                            else echo "Q & A";
                                            ?>
                                        </h3>
                                    </th>
                                    <th style="text-align:right; font-size:1.3em;">
                                        <a href="./<?php echo "$_GET[comm]"; ?>/index.php">+더보기</a>
                                    </th>
                                </tr>
                                <tr style="text-align:center;">
                                    <th style="width:10%;"> 글번호</th>
                                    <th style="width:30%;"> 제목</th>
                                    <th style="width:20%;"> 작성자</th>
                                    <th style="width:20%;"> 작성일 </th>
                                    <th style="width:10%;"> 추천수 </th>
                                    <th style="width:10%;"> 조회수 </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysql_fetch_array($result))
                                    {   echo "<tr>";
                                        echo "<td style=\"text-align:center;\">$row[num]</td>";
                                        echo "<td><a href = \"./".$_GET['comm']."/show.php?num=".$row['num']."\"> $row[subject]</a></td>";
                                        echo "<td style=\"text-align:center;\">$row[name]</td>";
                                        echo "<td style=\"text-align:center;\">$row[regist_day]</td>";
                                        echo "<td style=\"text-align:center;\">$row[recommended]</td>";
                                        echo "<td style=\"text-align:center;\">$row[hit]</td>";
                                        echo " </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer">
            <div class="logo">
                <img src="./img/dongseoklogo.png" alt="">
            </div>
            <div class="content">

                <p>- 동석문고 - 온라인 도서 문화 스토어 | 충청남도 천안시 동남구 병천면</p>
                <p>- 전화 : 041-123-1234 | E-Mail : admin@gmail.com</p>
                <p>- 개발자 : 강동균 | 이석준</p>
                <p></br> Copyright @ 2018 by dong seok</p>
            </div>
        </div>
    </body>
</html>
<!--
<?if(($_GET['page']-1)!=0 && ($_GET['page']-1)<$max_page){?>
   <a href="./index.php?page=<?=$_GET['page']-1?>">[이전]</a>
<?}
for($i=1;$i<=$max_page;$i++){?>
   <a href="./index.php?page=<?=$i?>">[<?=$i?>]</a>
<?}
if(($_GET['page']+1)<=$max_page){?>
   <a href="./index.php?page=<?=$_GET['page']+1?>">[다음]</a>
<?}?> -->
