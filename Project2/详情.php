<?php
include "config.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oink Princess Photo Details</title>
    <link rel="stylesheet" type="text/css" href="详情.css">
    <script>
        function myFunction1() {
          document.getElementById("favorbutton").innerHTML="取消收藏";

            }
    </script>
</head>
<body bgcolor="#ebecd4">
<div id="menu">
    <ul>
        <img src="../images/旅游.png" class="pic" width="60" height="44">
        <li> <a href="home.html" class="home">首页</a></li>
        <li><a href="browser.html" class="browse">浏览页</a></li>
        <li><a href="search.html" class="search">搜索页</a></li>
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
                        <li><a href="upload.html">上传</a></li>
                        <li><a href="myphoto.html">我的照片</a></li>
                        <li><a href="Favor.html">我的收藏</a></li>
                        <li><a href="../index.html">登入</a></li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="detail-photo">
<?php
    $pdo =new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $ImageID = $_GET['id'];
    $sql = "SELECT * FROM travelimage where ImageID = $ImageID";
     $result = $pdo->query($sql);
     $row = $result ->fetch();
      $img = '<img src="travel-images/large/' .$row['PATH'] .'">';
        $sql2 = "SELECT * FROM geocountries_regions where ISO = '{$row['Country_RegionCodeISO']}'";
     $result2 = $pdo->query($sql2);
       $row2 = $result2 ->fetch();
         $sql3 = "SELECT * FROM geocities where GeoNameID = '{$row['CityCode']}'";
     $result3 = $pdo->query($sql3);
       $row3 = $result3 ->fetch();
   echo $img;
   ?>
</div>
<div class="detail-description">
    <?php

    echo '<p><strong>标题：</strong></p>';
  echo ''  . $row["Description"] .  "<br>";
    echo '<p><strong>主题：</strong></p>';
    echo ''  . $row["Content"] .  "<br>";
    echo '<p><strong>拍摄城市：</strong></p>';
    echo ''  . $row3["AsciiName"] .  "<br>";
   echo '<p><strong>拍摄国家：</strong></p>';
     echo ''  . $row2["Country_RegionName"] .  "<br>";
    echo '<p><strong>拍摄者：</strong></p>';
    echo '<p>猪圈公主</p>';
   echo '<p><strong>已被收藏：</strong></p>';
    echo '<p>99次</p>';
    ?>
</div>

<div>
    <form method="post" action="addfavor.php">
    <a class="button" id="favorbutton" onclick="myFunction()">收藏</a>
    </form>
</div>
</body>
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