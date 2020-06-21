<?php
include "config.php";




function outputGenres() {
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $num_rec_per_page=4;   // 每页显示数量
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
        $start_from = ($page-1) * $num_rec_per_page;
        $keywords = isset($_POST['keywords'])?$_POST['keywords']:'';
        $keyword = isset($_POST['keyword'])?$_POST['keyword']:'';
        $sql = "SELECT Title, Description,PATH ,ImageID FROM travelimage 
WHERE Title LIKE '%{$keyword}%' 
AND Description LIKE '%{$keywords}%'
LIMIT $start_from, $num_rec_per_page";
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
    <title>Oink Princess search</title>
    <link rel="stylesheet" type="text/css" href="ee.css">

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
<form method="post" action="#">
    <div class="searchfilter">
        <input type="radio" value="agree" name="agree"  >通过标题检索
        <p><input type="text" name="keyword"></p>
        <input type="radio" value="agree" name="agree" >通过描述检索
        <p><input type="text" name="keywords"></p>

        <input type="submit" value="搜索！">
    </div>
</form>
<div class="result">
    <div class="photo">
        <?php outputGenres(); ?>


    </div>
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

            $keywords = isset($_POST['keywords'])?$_POST['keywords']:'';
            $keyword = isset($_POST['keyword'])?$_POST['keyword']:'';
            $sql = "SELECT Title, Description,PATH FROM travelimage 
WHERE Title LIKE '%{$keyword}%' 
AND Description LIKE '%{$keywords}%'";

            $result1 = $conn->query($sql);
            $total_records = mysqli_num_rows($result1);  // 统计总共的记录条数
            $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数

            echo "<a href='Canada.php?page=1' >".'|<'."</a> "; // 第一页

            for ($i=1; $i<=$total_pages; $i++) {
                echo "<a   href='Canada.php?page=".$i."' id='current' >".$i."</a> ";
            };
            echo "<a href='Canada.php?page=$total_pages' >".'>|'."</a> "; // 最后一页

            ?>


        </ul>
    </div>
</footer>
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
</html>