<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../main.css">
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
                        <a href="#">주문배송 |</a>
                        <a href="#">장바구니 </a>
                    </div>
                </div>
            </div>
            <div class="lns">
                <div class="logo">
                    <a href="../index.php"  ><img class = "logoimg" src="../img/dongseoklogo.png" alt="" ></a>
                </div>
                <div class="search">
                    <input type="text" class = "searchbar" name="search" size="60" placeholder="검색어를 입력하세요">
                    <a href="#" onclick=""><img src="../img/searchbutton.png" class="searchbutton"alt=""></a>
                </div>
            </div>
            <div class="lnb">
                <div class="lnbmenu">
                    <a href="#">연도별도서</a>
                    <a href="#">베스트셀러</a>
                    <a href="#">추천도서</a>
                    <a href="#">장르별</a>
                    <a href="#">커뮤니티</a>
                    <a href="#">사이트맵</a>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="">
                <div class="">
                    베스트셀러
                </div>
                <div class="">
                    추천도서
                </div>
            </div>
            <div class="">
                <div class="">
                    공지사항
                </div>
                <div class="">
                    자유게시판
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
