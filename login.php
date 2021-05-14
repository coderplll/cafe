<?php
  include_once '0php_mysql.php';

  //开启session
	session_start();

  $id_error_isShow="none";
  $pwd_error_isShow="none";
  $id_value="";
  $pwd_value='';
  if(isset($_POST['id'])){
    $sql = "select password from user where username='{$_POST['id']}' or phone='{$_POST['id']}'";
    $res = pll_query($sql);
    $pwds = array();
    while($row = mysqli_fetch_assoc($res)){
      $pwds[] = $row;
    }
    // echo $pwds[0]['password'];
    
    $id_value=$_POST['id'];
    $pwd_value=$_POST['pwd'];
    if(!isset($pwds[0]['password'])){
      $id_error="用户名或手机号不存在!";
      $id_error_isShow="";
    }else if($pwds[0]['password']!=$_POST['pwd']){
      $pwd_error="密码错误!";
      $pwd_error_isShow="";
    }else{
      $sql = "select username from user where username='{$_POST['id']}' or phone='{$_POST['id']}'";
      $res = pll_query($sql);
      $row = mysqli_fetch_assoc($res);
      $_SESSION['name'] = $row['username'];
      header('Location:index.php'); 
    }


  }


  include_once 'login.html';
?>