<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>동석문고 - 온라인 도서문화 스토어</title>
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
                    <a href="../year/index.php">연도별도서</a>
                    <a href="../recommended/index.php">추천도서</a>
                    <a href="../genre/index.php">장르별</a>
                    <a href="../notice/index.php">커뮤니티</a>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="">
                <div class="">
                    <h2>연대별</h2>
                    <ul>
                        <a href="./index.php?years=2010"><li>2010년대</li></a>
                        <a href="./index.php?years=2000"><li>2000년대</li></a>
                        <a href="./index.php?years=1900"><li>00년대 이전</li></a>
                    </ul>
                </div>
                <div class="">
                    <h2> 도서 목록</h2>
                    <?php
                    include "../dbconn.php";
                    if(!isset($_GET['years']))$_GET['years']="2010";
                    if($_GET['years']==="2010") $sql="select * from book where publish_day like '201%';";
                    else if($_GET['years']==="2000") $sql="select * from book where publish_day like '200%';";
                    else $sql="select * from book where publish_day like '19%';";
                    $result = mysql_query($sql, $connect);

                    while($row = mysql_fetch_array($result))
                    {   echo " <tr>";
                        echo "<td>$row[name]</td>";
                        echo " </tr>";
                    }
                    ?>
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
