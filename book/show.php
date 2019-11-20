<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <?php
        include "../dbconn.php";
        ?>
        <div class="section">
            <br><br>
            <div class="bo" style="width: 65%;margin: 0 auto; border:2px solid rgb(242,93,46); background-color:white;">
                <div class="info"  style="overflow:hidden;">
                        <?php
                        $sql="select * from book where num = $_GET[book_num];";
                        $result = mysql_query($sql, $connect);
                        $row = mysql_fetch_array($result);
                         ?>
                        <div class="book_img">
                            <img src="<?php echo ".".$row['path_img'];?>" style="float: left;margin: 2% 2%; width: 20%;" >

                        </div>
                        <div class="book_info" style="margin-top:2%; ">
                            <table style="width :55%; border-bottom: 4px solid rgb(242,93,46); margin-bottom:10px;">
                                <tr>
                                    <td><h1 style="font-size:3em; color:#3a60df; border-bottom:3px solid rgb(242,93,46);"><?php echo "$row[name]"; ?></h1></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="like" style="font-size : 1.4em; font-weight:bold">
                                            <img src="../img/like.jpg" alt="">
                                            <?php
                                            echo "$row[recommended]";
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 1.5em;padding : 10px 0;"> 작가 : <?php echo "$row[author]";?> </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 1.5em;padding : 10px 0;"> 장르 : <?php echo "$row[genre]";?> </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 1.5em;padding : 10px 0;"> 출판사 :  <?php echo "$row[publisher]";?> </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 1.5em;padding : 10px 0;"> 출판일 :<?php echo "$row[publish_day]";?> </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 2em;padding : 10px 0; color:#f84450;text-align:right;"> <?php echo number_format($row['price'])."원";?> </td>
                                </tr>
                            </table>
                        </div>

                        <div class="button" id='app'  style="width :55%; overflow:hidden;">
                            <table style="float:right;">
                                <tr>
                                    <td>
                                        <div class="recommend">
                                                <a href="./like.php?num=<?php echo $_GET['book_num']; ?>"><img src="../img/recommend.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="barket">
                                            <a href="../basket/insert_book.php?num=<?php echo $_GET['book_num']; ?>"><img src="../img/barket.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="buy">
                                            <a href="../purchase/insert_book.php?book=<?php echo "$_GET[book_num]"; ?>&quan=1"><img src="../img/buy.jpg" alt=""></a>
                                        </div>
                                    </td>
                                </tr>

                            </table>

                        </form>



                    </div>
                </div>

                <div class="review" style="margin: 2% 2%;width : 75%;">
                    <h1>도서 리뷰</h1>
                    <div class="form">
                        <form class="" action="insert_review.php?book_num=<?php echo "$_GET[book_num]"; ?>" method="post">
                            <div class="form-group">
                                <?php if(!isset($_SESSION['id'])){ echo "review를 등록하려면 로그인을 해주세요.";}
                                else{?>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="review_content" rows="3" style=" width:100%;"></textarea>
                                <button type="submit" class="btn btn-primary btn-lg" style="background-color: rgb(242,93,46); border:1px solid rgb(242,93,46);">등록</button>
                            <?php } ?>
                            </div>
                        </form>
                    </div>
                    <?php
                    $sql= 'select book.name AS bookname, review.name AS username, content, regist_day from review,book where book.num=review.parent and parent = '.$_GET['book_num'].';';
                    $result = mysql_query($sql, $connect);
                     ?>
                    <div class="content" style="">
                        <?php
                        while($row = mysql_fetch_array($result)){
                            ?>
                            <div class="temp" style=" border: 1px solid  rgb(242,93,46);">
                            <?php
                            echo "작성자 : $row[username]<br>";
                            echo "책 이름 : $row[bookname]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            echo "$row[regist_day]<br>";
                            echo "내용 : $row[content]<br><br>";
                            ?>
                        </div><br>
                            <?php
                        }
                         ?>

                    </div>
                </div>
            </div>
            <br><br>
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
