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
            <div class="base">
                <div class="selectbar" style="">
                    <ul>
                        <li><a href="./index.php">장바구니</a></li>
                        <li><a href="../purchase/index.php">구매내역</a></li>
                    </ul>
                </div>

                <div class="notice">
                    <div class="list">

                        <h1 style="font-weight:bold; position:relative; left:5%; margin-top:20px;">장바구니</h1>
                        <table class = 'table table-hover' style="width:80%;">
                            <thead>
                                <tr>
                                    <td style="text-align:center;">상품정보</td>
                                    <td style="text-align:center;">판매가</td>
                                    <td style="text-align:center;">수량</td>
                                    <td style="text-align:center;">합계</td>
                                    <td>구매</td>
                                </tr>
                            </thead>
                            <form action ="../purchase/insert_book1.php?quan=1"method="post">
                            <tbody>
                                <?php
                                    include "../dbconn.php";
                                    $sql2 = "select book.num AS num, book.name AS bookName, book.price AS price, basket.quantity AS quantity,book.path_img AS Img from book, basket where book.num=basket.book_num and basket.user_id = '".$_SESSION['id']."';";
                                    $result = mysql_query($sql2, $connect);
                                    while($row = mysql_fetch_array($result))
                                    {   echo " <tr>";
                                        echo "<td class=\"data\">
                                             <img src=\".$row[Img]\" style=\"width:20%;\"> $row[bookName]
                                            </td>";
                                        echo "<td class=\"data\">$row[price]</td>";
                                        echo "<td class=\"data\">$row[quantity]</td>";
                                        echo "<td class=\"data\">".$row['price']*$row['quantity']."원</td>";
                                        echo "<td class=\"data\"><input type=\"checkbox\" name = \"book_no[]\" value=\"$row[num]\"></td>";
                                        echo " </tr>";
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="submit" value="체크한 도서 구매"></form></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
            // echo "주문내역 보여주는 sql";
            // $sql= 'select purchase_num, book.name AS bookName, member.name AS userName, book.price AS bookPrice, path_img, quantity,ship_num from purchase, member, book where book_num=book.num and user_id = member.id;';
            // echo "$sql";
         ?>
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
