<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>동석문고 - 온라인 도서문화 스토어</title>
        <style media="screen">
            .section{
                background-color: #f2f4f7;
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
                            echo "<a href=\"../login/login.php\" alt=\"\">로그인 |</a>";
                            echo "<a href=\"../member/member.php\" alt=\"\">회원가입 |</a>";
                            echo "<a href=\"#\" alt=\"\">Mypage |</a>";
                        }
                        else {
                            $user_id = $_SESSION['id'];
                            $user_name = $_SESSION['name'];
                            echo "<a>$user_name($user_id) |</a>";
                            echo "<a href=\"../login/logout.php\">[로그아웃] |</a>";
                            echo "<a href=\"../member/member_update.php\" alt=\"\">Mypage |</a>";

                        }?>
                        <a href="../purchase/index.php">구매내역 |</a>
                        <a href="../basket/index.php">장바구니 </a>
                    </div>
                </div>
            </div>
            <div class="lns">
                <div class="logo">
                    <a href="../index.php"  ><img class = "logoimg" src="../img/dongseoklogo.png" alt="" ></a>
                </div>
                <div class="search">
                    <form class="" action="../search/search.php" method="get">
                        <input type="text" class = "searchbar" name="query" value = "" size="60" placeholder="검색어를 입력하세요">
                        <button type="submit" class="btn btn-primary" style="background-color:orange;border:1px solid orange;height:48px;width :80px;">검색</button>
                    </form>
                </div>
            </div>
            <div class="lnb">
                <div class="lnbmenu">
                    <a href="../book/index.php?years=2010">연도별도서</a>
                    <a href="../recommended/index.php">추천도서</a>
                    <a href="../genre/index.php">장르별</a>
                    <a href="../notice/index.php">커뮤니티</a>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="base">
                <div class="selectbar">
                    <h2>커뮤니티</h2>
                    <ul>
                        <li><a href="../notice/index.php">공지사항</a></li>
                        <li><a href="../free/index.php">자유게시판</a></li>
                        <li><a href="./index.php">Q & A</a></li>
                    </ul>

                </div>
                <?php
                    include "../dbconn.php";

                    $sql='update qna set hit=hit+1 where num = '.$_GET['num'].';';
                    mysql_query($sql, $connect);

                    $sql= 'select * from qna where num = '.$_GET['num'].';';
                    $result = mysql_query($sql, $connect);
                    $row = mysql_fetch_array($result);

                ?>

                <div class="post" style=" padding-left: 3%;width : 80%; border-left: 2px solid rgb(242,93,46);  position:relative; float:left;">
                    <div class="title_line" style="height: 40px; line-height: 40px; border-top: 2px solid rgb(242,93,46);border-bottom:  2px solid rgb(242,93,46); overflow: hidden; margin-top:1%;">
                        <div class="title_name" style="width : 50%; float : left; font-size: 1.8em;">
                            <?php
                                echo "$row[subject]";
                                ?>
                        </div>
                        <div class="writer_name" style="width : 20%; float : left;  font-size: 1.3em;">
                            <?php
                            echo "$row[name]";
                             ?>
                        </div>
                        <div class="regist_day" style="width : 30%; float : left;  font-size: 1.3em;">
                            <?php
                            echo "$row[regist_day]";
                             ?>
                        </div>
                    </div>

                    <div class="content_line" style="height: 40px; line-height: 40px; border-bottom:  2px solid rgb(242,93,46);  overflow: hidden;">
                        <div class="content_info" style="width : 10%;float:left;">
                            <h2>내 용</h2>
                        </div>
                        <div class="like" style="width : 75%;float:left;">

                            <a href="./like.php?num=<?php echo $_GET['num']; ?>"><img style="height:45px;" src="../img/like.jpg" alt=""></a>
                            <?php
                            echo "$row[recommended]"; ?>
                        </div>
                        <div class="delete_post" style="width : 10%;float:left;">
                            <?php
                                echo "<a href=\"./destroy.php?num=".$_GET['num']."\" style=\"font-size: 0.9em\">[삭제]</a><br>";
                            ?>
                        </div>
                    </div>

                    <div class="content_text" style="border-bottom:  2px solid rgb(242,93,46);">
                        <br>
                        <?php
                            echo nl2br($row['content']);
                         ?>
                    </div>
                    <div class="reply">
                        <h3 style="text-decoration:underline rgb(242,93,46); font-weight:bold;margin-top:10px;">댓글 작성</h3>
                        <div class="create_reply">
                            <form class="reply" action="./insert_reply.php?num=<?php
                            echo $_GET['num']; ?>" method="post">
                                <input type="text" name="reply_content" style="width : 93%;height:50px;" placeholder="댓글을 입력해주세요.">
                                <button type="submit">입력</button>
                            </form>
                            <?php
                            $sql= 'select * from qna_reply where parent = '.$_GET['num'].';';
                            $result = mysql_query($sql, $connect);
                            $counter=0;
                            while($row = mysql_fetch_array($result)){
                                $counter+=1;?>
                            <div class="content_reply" style="margin:10px 0;border:2px solid rgb(242, 93,46);">

                                <?php
                                echo "$row[name]&nbsp;&nbsp;:&nbsp;&nbsp; ";
                                echo "$row[content]&nbsp;&nbsp;";
                                echo "$row[regist_day]";
                                echo "&nbsp;&nbsp;&nbsp;<a href='./delete_reply.php?num=".$row['num']."' style='font-size:0.8em'>[삭제]</a> <br>";
                                ?>
                            </div>
                            <?php
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer">
            <div class="logo">
                <img src="../img/dongseoklogo.png" alt="">
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
