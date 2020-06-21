<?php

include "config.php";





function outputGenres() {
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $num_rec_per_page=6;   // 每页显示数量
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
        $start_from = ($page-1) * $num_rec_per_page;
        $sql = "SELECT Title, Description,PATH ,ImageID FROM travelimage 
WHERE  Content = 'Building'
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

    echo '<div class="responsive" style="margin-left: -40px">';
    echo ' <div class="picture " >';
    echo '<li>';
    $img = '<img src="travel-images/square-medium/' . $row['PATH'] . '">';
    echo constructPicLink($row['ImageID'], $img);
    echo '</li>';
    echo '</div>';
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
    <title>Oink Princess Browser</title>
    <link rel="stylesheet" type="text/css" href="d.css">
    <script type="text/javascript">
        var countryList=["中国","意大利","日本","美国"];
        var CityList=[
            ["上海","北京"],
            ["罗马","米兰"],
            ["东京","大阪"],
            ["纽约","华盛顿"]
        ];

        function f1(){
            var pro=document.getElementById("country");
            pro.length=countryList.length+1;
            for(var i=1;i<country.length;i++){
                pro[i].innerHTML=countryList[i-1];
                pro[i].value=i;
            }
        }

        function f2(){
            var city=document.getElementById("city");
            var country=document.getElementById("country");
            city.value=0;
            var cityList=CityList[country.value-1];
            city.length=cityList.length+1;
            for(var i=1;i<city.length;i++){
                city[i].innerText=cityList[i-1];
                city[i].value=i;
            }
        }
    </script>

</head>
<body bgcolor="#ebecd4">
<div>
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
    <div style=" width:200px ;float:left; margin-left: -450px" >
        <form method="post" action="liulan2.php">
            <div id="box">
                <input type="text" name="search" id="searchbox" placeholder="请输入标题">
                <div id="searcher">
                    <input type="submit" onclick="myFunction()" value="搜索" >
                </div>

            </div>
        </form>


    </div>
    <div>
        <hr width="430" align="left" height="10" color="black">
        <ul class="city">
            <h2>热门国家快速浏览</h2>
            <li><a href="United%20Kindom.php" onclick="myFunction()" >United Kingdom</a></li>
            <li><a href="Italy.php"  onclick="myFunction()" >Italy</a></li>
            <li><a href="Canada.php" onclick="myFunction()">Canada</a></li>
            <li><a href="Gahana.php" onclick="myFunction()" >Ghana</a></li>
            <li><a href="Bahamas" onclick="myFunction()" >Bahamas</a></li>
        </ul>
    </div>
    <div>
        <hr width="430" align="left" height="10" color="black">
        <ul class="country">
            <h2 >热门城市快速浏览</h2>
            <li><a href="Nassau.php" onclick="myFunction()">Nassau</a></li>
            <li><a href="Darmstadt.php" onclick="myFunction()">Darmstadt</a></li>
            <li><a href="Athens.php" onclick="myFunction()">Athens</a></li>
            <li><a href="Venezia.php" onclick="myFunction()" >Venezia</a></li>
            <li><a href="Calgary.php" onclick="myFunction()">Calgary</a></li>
        </ul>
    </div>
    <div>
        <hr width="430" align="left" height="10" color="black">
        <ul class="theme">
            <h2 >热门主题快速浏览</h2>
            <li><a href="" onclick="myFunction()"style="color: #ec971f">Building</a></li>
            <li><a href="" onclick="myFunction()">Animal</a></li>
            <li><a href="" onclick="myFunction()">People</a></li>
            <li><a href="" onclick="myFunction()">Wonder</a></li>
            <li><a href="" onclick="myFunction()">Other</a></li>
        </ul>
    </div>

    <div class="filter" style=" width:700px ;float:left; margin-left: 500px">
        <form action="#" method="post">
            <select name="country" id="country" onfocus="f1()" onchange="f2()">
                <option value="0">选择国家</option>
            </select>
            <select name="city" id="city">
                <option value="0">选择城市</option>
            </select>
            <select name="title" >选择主题
                <option value="0">选择主题</option>
                <option value="1">度假</option>
                <option value="2">冒险</option>
                <option value="3">名胜古迹</option>
                <option value="4">购物</option>
            </select>
            <select name="title" >选择标题
                <option value="0">选择标题</option>
                <option value="1">热情沙漠风光</option>
                <option value="2">悠闲沙滩度假</option>
                <option value="3">探索古迹历史</option>
            </select>
            <input type="submit" onclick="myFunction()" value="筛选">
        </form>


        <div class="responsive" style="margin-left: -40px">
            <div class="picture " >
                <li>
                    <?php  outputGenres();?>

                </li>
            </div>
        </div>

    </div>
</div>
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
            $sql = "SELECT * FROM travelimage WHERE Content = 'Building'";
            $result1 =   $conn->query($sql);; //查询数据
            $total_records = mysqli_num_rows($result1);  // 统计总共的记录条数
            $total_pages = floor($total_records / $num_rec_per_page);  // 计算总页数

            echo "<a href='Building.php?page=1' >".'|<'."</a> "; // 第一页

            for ($i=1; $i<=$total_pages; $i++) {
                echo "<a   href='Building.php?page=".$i."' id='current' >".$i."</a> ";
            };
            echo "<a href='Building.php?page=$total_pages' >".'>|'."</a> "; // 最后一页

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
