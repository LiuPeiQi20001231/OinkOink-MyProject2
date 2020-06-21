<?php
include "config.php";
session_start();
try{
    $pdo =new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $uid = $_POST['name'];

    $pwd=$_POST['password'];
    $repwd =$_POST['repassword'];
    $email = $_POST['email'];
    $sql = "select * from traveluser where UserName = '$uid'";
    $rs= $pdo->query($sql);
    if($rs->fetch() > 0){
        echo "<script>alert('用户名已存在');history.go(-1);</script>";
    }
    else if($repwd != $pwd) {
        echo "<script>alert('密码不一致');history.go(-1);</script>";
    }
        else{
            $sql = "insert into traveluser(Pass,UserName,Email) value ('$pwd','$uid','$email')";
            $res = $pdo->query($sql);
            var_dump($res);
            echo "<script>alert('注册成功');window.location.href = ('register.html');</script>";
        }


    $pdo = null;
}catch (PDOException $e){
    die($e->getMessage());
}
?>