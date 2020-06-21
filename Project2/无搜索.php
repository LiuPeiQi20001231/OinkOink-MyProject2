<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oink Princess search</title>
    <link rel="stylesheet" type="text/css" href="无搜索.css">

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
<form method="post" action="搜索.php">
    <div class="searchfilter">
        <input type="radio" value="agree" name="agree"  >通过标题检索
        <p><input type="text" name="keyword"></p>
        <input type="radio" value="agree" name="agree" >通过描述检索
        <p><input type="text" name="keywords"></p>

        <input type="submit" value="搜索！">
    </div>
</form>

</body>
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