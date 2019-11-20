<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo("
          <script>
            window.alert('로그인 후 이용하세요.')
            history.go(-1)
          </script>
        ");
        exit;

    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../main.css">
        <title>동석문고 - 온라인 도서문화 스토어</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                height: inherit;
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
                    <a href="./index.php">커뮤니티</a>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="base">
                <div class="selectbar">
                    <h2>커뮤니티</h2>
                    <ul>
                        <li><a href="./index.php">공지사항</a></li>
                        <li><a href="../free/index.php">자유게시판</a></li>
                        <li><a href="../qna/index.php">Q & A</a></li>
                    </ul>

                </div>


        		<div class="boardWrite"  style=" padding-left: 3%;width : 80%; border-left: 2px solid rgb(242,93,46);  position:relative; float:left;">
                    <h2 style="text-decoration:underline rgb(242,93,46); font-weight: bold;">공지사항 글쓰기</h2>
        			<form action="./create.php" method="post">
                        <div class="" style="border-bottom: 2px solid rgb(242,93,46);">
                            <label for="title" style="margin-top:1%; font-size:1.5em; margin-bottom:1%;">제목 : </label>
                            <input type="text" name="title" id="title"style="width:95%; ">
                        </div>
                        <div class="" style="border-bottom: 2px solid rgb(242,93,46);">
                            <label for="content"style="margin:1% 0; font-size : 1.5em;">내용</label><br>
                            <textarea name="content" rows="20" style="width : 100%;"></textarea>
                        </div>
        				<div class="btnSet" style="margin:1% 0;">
        					<button type="submit" class="btnSubmit btn">작성</button>
        					<a href="./index.php" class="btnList btn">목록</a>
        				</div>

        			</form>
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
