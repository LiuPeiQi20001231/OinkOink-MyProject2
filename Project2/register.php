<?php
include "config.php";
session_start();
try{
    $pdo =new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $uid = $_POST['name'];
$_SESSION['UserName'] = $_POST['name'];
    $pwd = $_POST['password'];
    $_SESSION['Password'] = $_POST['password'];

    if($uid == "" || $pwd == ""){
        echo "<script>alert('用户名或密码不能为空');history.go(-1);</script>";
    }
    else{
        $sql_name= "select Pass from traveluser where UserName = '$uid'";
    $result1 = $pdo->query($sql_name);

    $row1 = $result1->fetch();
    if($pwd == $row1[0] ){
        echo "<script> location = 'INDEX.php';</script>";
        session_start();
        //  注册登陆成功的 admin 变量，并赋值 true
        $_SESSION["admin"] = true;
    }else{
       echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
    }
}
$pdo = null;
}catch (PDOException $e){
    die($e->getMessage());
}
?>