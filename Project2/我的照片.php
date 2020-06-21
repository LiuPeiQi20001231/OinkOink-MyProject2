<?php
session_start();
include "config.php";


function outputGenres() {
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $num_rec_per_page=6;   // 每页显示数量
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
        $start_from = ($page-1) * $num_rec_per_page;
        $id =  $_SESSION['UserName'];
        $sql = "select ImageID,Title, Description,PATH from travelimage WHERE UID = '$id' LIMIT $start_from, $num_rec_per_page";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $result1 = $pdo->query($sql);

        while ($row = $result1->fetch()) {
            outputSinglePic($row);
        }
        $pdo = null;
    }catch (PDOException $e) {
        die( $e->getMessage() );
    }
}

/*
 Displays a single genre
*/
function outputSinglePic($row) {

    $img = '<img src="travel-images/medium/' . $row['PATH'] . '">';
    echo constructPicLink($row['ImageID'], $img);
    echo '<div>';
    echo '<h1>';
    echo ''. $row["Title"] .  "<br>";
    echo '</h1>';
    echo '<h3>';
    echo  '' . $row["Description"] .  "<br>";
    echo '</h3>';
    echo '</div>';


}
/*
  Constructs a link given the genre id and a label (which could
  be a name or even an image tag
*/
function constructPicLink($id, $label) {
    $link = '<a href="详情.php?id=' . $id . '">';
    $link .= $label;
    $link .= '</a>';
    return $link;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oink Princess My photo</title>
    <link rel="stylesheet" type="text/css" href="我的照片.css">
    <script>
        function myFunction(){
            alert("图片已删除");
        }
    </script>
</head>
<body bgcolor="#ebecd4">
<div id="menu">
    <ul>
        <img src="../images/旅游.png" class="pic" width="60" height="44">
        <li> <a href="INDEX.php" class="home">首页</a></li>
        <li><a href="liulan.php" class="browse">浏览页</a></li>
        <li><a href="搜索.php" class="search">搜索页</a></li>
        <li><a href="" class="person">个人中心</a>
            <div class="dropdown_1column">
                <div class="col_1">
                    <ul class="simple">
                        <div style="position:absolute; left:40px; top:14px; width:100px; height:100px;">
                            <img src="../images/上传.png" width="20" height="20">
                        </div>
                        <div style="position:absolute; left:75px; top:39px; width:100px; height:100px;">
                            <img src="../images/照片.png" width="20" height="20">
                        </div>
                        <div style="position:absolute; left:75px; top:64px; width:100px; height:100px;">
                            <img src="../images/收藏.png" width="20" height="20">
                        </div>
                        <div style="position:absolute; left:40px; top:91px; width:100px; height:100px;">
                            <img src="../images/登录.png" width="20" height="20">
                        </div>
                        <li><a href="上传.php">上传</a></li>
                        <li><a href="我的照片.php">我的照片</a></li>
                        <li><a href="我的收藏.php">我的收藏</a></li>
                        <li><a href="exit.php">登出</a></li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="result">
    <h2>我的照片</h2>
        <div class="photo">
            <?php outputGenres(); ?>


        </div>
    <a href="upload.html" class="button">修改</a>
    <a  class="button" onclick="myFunction()">删除</a>
        <hr width="100%" align="center" height="10" color="black">

</div>



</body>
<footer>
    <div >
        <ul class="page">
            <?php

            $servername = "localhost";
            $username = "liuqiqi";
            $password = "liupeiqi1231";
            $dbname = "new travel";

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }


            $num_rec_per_page=4;   // 每页显示数量
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
            $start_from = ($page-1) * $num_rec_per_page;
            $sql = "SELECT * FROM travelimage WHERE Country_RegionCodeISO = 'GB'";
            $result1 =   $conn->query($sql);; //查询数据
            $total_records = mysqli_num_rows($result1);  // 统计总共的记录条数
            $total_pages = floor($total_records / $num_rec_per_page);  // 计算总页数

            echo "<a href='我的照片.php?page=1' >".'|<'."</a> "; // 第一页

            for ($i=1; $i<=$total_pages; $i++) {
                echo "<a   href='我的照片.php?page=".$i."' id='current' >".$i."</a> ";
            };
            echo "<a href='我的照片.php?page=$total_pages' >".'>|'."</a> "; // 最后一页

            ?>

        </ul>
    </div>
    <div id="foot">
        <ul>
            <li> <a>猪圈公主</a></li>
            <li><a>19302010062</a></li>
            <li><a>良心制作</a></li>
            <li><a>点开这个网页即可收获一份快乐！</a></li>
            <img src="../images/猪.png" class="scan" width="60" height="55">
            <img src="../images/猪.png" class="scan" width="60" height="55">
            <img src="../images/猪.png" class="scan" width="60" height="55">

        </ul>
    </div>
</footer>
</html>