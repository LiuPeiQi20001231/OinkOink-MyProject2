<?php
session_start();
require_once('config.php');

function outputFavorPics() {
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = 'select travelimage.ImageID,Title,Description,PATH from travelimage JOIN travelimagefavor ON travelimagefavor.UID = :id WHERE travelimage.ImageID = travelimagefavor.ImageID ';
        $id =  $_SESSION['UserName'];
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        echo '<ul id="FavoritesList">';

    }catch (PDOException $e) {
        die( $e->getMessage() );
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oink Princess Favourite</title>
    <link rel="stylesheet" type="text/css" href="收藏.css">
    <script>
        function myFunction1() {
            var x = document.getElementById("aaa");
            var odiv = document.getElementById("whole");
            if (x.innerHTML == "取消收藏") {
                x.innerHTML = "收藏";
                x.onclick = function () {
                    odiv.parentNode.removeChild(odiv)
                }


            }
            else if(x.innerHTML=="收藏"){
                x.innerHTML="取消收藏";
            }
        }
        function myFunction2() {
            var y = document.getElementById("bbb");
            if (y.innerHTML == "取消收藏") {
                y.innerHTML = "收藏";
            } else if (y.innerHTML == "收藏") {
                y.innerHTML = "取消收藏";
            }
        }
        function myFunction3() {
            var z = document.getElementById("ccc");
            if (z.innerHTML == "取消收藏") {
                z.innerHTML = "收藏";
            } else if (z.innerHTML == "收藏") {
                z.innerHTML = "取消收藏";
            }
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
        <?php



        if (isset($_SESSION['UserName'])){

        echo '<li><a href="" class="person">个人中心</a>';
           echo '<div class="dropdown_1column">';
                echo '<div class="col_1">';
                   echo '<ul class="simple">';
                       echo '<div style="position:absolute; left:40px; top:14px; width:100px; height:100px;">';
                           echo '<img src="../images/上传.png" width="20" height="20">';
                       echo '</div>';
                       echo '<div style="position:absolute; left:75px; top:39px; width:100px; height:100px;">';
                            echo ' <img src="../images/照片.png" width="20" height="20">';
                         echo '</div>';
                         echo '<div style="position:absolute; left:75px; top:64px; width:100px; height:100px;">';
                          echo ' <img src="../images/收藏.png" width="20" height="20">';
                       echo '</div>';
                     echo '  <div style="position:absolute; left:40px; top:91px; width:100px; height:100px;">';
                          echo ' <img src="../images/登录.png" width="20" height="20">';
                      echo ' </div>';
                       echo '<li><a href="上传.php">上传</a></li>';
                      echo ' <li><a href="我的照片.php">我的照片</a></li>';
                        echo '<li><a href="我的收藏.php">我的收藏</a></li>';
                       echo '<li><a href="exit.php">登出</a></li>';
                    echo '</ul>';
               echo '</div>';
           echo '</div>';
      echo ' </li>';
}else{
            echo '<li><a href="register.html">登录</a></li>';

}
        ?>
    </ul>
</div>
<div class="result">
    <h2>我的照片</h2>
    <?php
    $img = '<img src="travel-images/square-medium/' .$row['PATH'] .'">';

    echo $img;
    ?>
</div>



</body>
<footer>
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

