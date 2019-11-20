<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../main.css">
        <title>동석문고 - 온라인 도서문화 스토어</title><link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <style media="screen">
            .section .base{
                overflow: hidden;
                width: 80%;
                margin: 0 auto;
            }
            .selectbar{
                width:15%;
                float: left;
            }
            .free{
                width: 85%;
                float: left;

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
                    <form class="" action="./search.php" method="get">
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
            <div class="base">
                <div class="free">
                    <h1>검색 결과</h1>
                        <table class = 'table table-hover'  style="margin : 0 auto">
<!-- class = 'table table-hover' -->
                            <tbody>

                                <?php
                                    require_once "../dbconn.php";
                                    $sql= "select * from book where name like '%".$_GET['query']."%';";
                                    $result = mysql_query($sql, $connect);
                                    while($row = mysql_fetch_array($result))
                                    {   echo " <tr style=\"\">";
                                        echo "<td style=\"width : 25%;\"><img src=\".$row[path_img]\" style=\"height=300px; line-height: 300px; width:70%;\"> &nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>";

                                        echo "<td style=\"height=300px; text-align: center; line-height: 300px; \"><a href= \"../book/show.php?book_num=$row[num]\">$row[name]<a></td>";
                                        echo "<td style=\"height=300px; text-align: center; line-height: 300px; \">$row[author]</td>";
                                        echo "<td style=\"height=300px; text-align: center; line-height: 300px; \">$row[price]</td>";
                                        echo "<td style=\"height=300px; text-align: center; line-height: 300px; \">$row[genre]</td>";
                                        echo "<td style=\"height=300px; text-align: center; line-height: 300px; \">$row[publisher]</td>";
                                        echo "<td style=\"height=300px; text-align: center; line-height: 300px; \">$row[publish_day]</td>";
                                        echo "<td style=\"height=300px;  text-align: center; overflow: hidden; \">

                                        <div class=\"barket\" style=\"margin-top:100px;\">
                                            <a href=\"../basket/insert_book0.php?num=". $row['num']."\"><img src=\"../img/barket.jpg\" ></a>
                                        </div>
                                        <div class=\"buy\" style=\"\">
                                            <a href=\"../purchase/insert_book.php?book=". $row['num']." &quan=1\"><img src=\"../img/buy.jpg\" ></a>
                                        </div>$row[num]
                                        </td>";
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
