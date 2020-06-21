
<?php
//  防止全局变量造成安全隐患
$admin = false;
//  启动会话，这步必不可少
session_start();
//  判断是否登陆
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
    echo "<script>alert('登录成功')</script>";
} else {
    //  验证失败，将 $_SESSION["admin"] 置为 false
    $_SESSION["admin"] = false;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oink Princess's Travelling channel</title>
    <link rel="stylesheet" type="text/css" href="index.css">

    <script>


        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>



</head>
<body bgcolor="#778899" >


<div id="menu">
    <ul>
        <img src="../images/旅游.png" class="pic" width="60" height="44">
        <li> <a href="INDEX.php" class="home">首页</a></li>
        <li><a href="liulan.php" class="browse">浏览页</a></li>
        <li><a href="搜索.php" class="search">搜索页</a></li>
        <!--检查登录-->

<?php
if (isset($_SESSION['UserName'])) {
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


<article>
    <img src="../images/景点.jpg"  id="hot">
</article>

<?php
$servername = "localhost";
$username = "liuqiqi";
$password = "liupeiqi1231";
$dbname = "new travel";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT Title, Description,PATH FROM travelimage 
            where UID > 27";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo   '<div class = "responsive">';
        echo '<div class="img">';

        $img = '<img src="travel-images/square-medium/' .$row['PATH'] .'">';

        echo $img;

        echo '<div class="desc">' . $row["Title"] .  "<br>";
        echo ''  . $row["Description"] .  "<br>";
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }
} else {
    echo "0 结果";
}

$conn->close();
?>
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
<div class="shuaxin">
    <form method="post" action="shuaxin.php">
     <input type="submit" onclick="myFunction()" value="SHUAXIN">
    </form>
    <button onclick="topFunction()" id="button-t" title="回顶部"><b>返回顶部</b></button>

</div>
</body>
</html>




