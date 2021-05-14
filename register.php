<?php
  include_once '0php_mysql.php';


  //获取所有
  $sql = "select * from user";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $users = array();
  while($row = mysqli_fetch_assoc($res)){
    $users[] = $row;
  }
  
  $user_names = array();
  $phone = array();
  foreach($users as $k =>$user){
    $user_names[]=$user['username'];
    $phone[]=$user['phone'];

  }

  $phone_error_isShow="none";
  $username_error_isShow="none";
  $phone_value='';
  $username_value='';
  if(isset($_POST['phone'])&&isset($_POST['username'])){
    $phone_value=$_POST['phone'];
    $username_value=$_POST['username'];

    $phone_isExist=in_array($_POST['phone'],$phone);
    $username_isExist=in_array($_POST['username'],$user_names);
    if($phone_isExist){
      // header('Refresh:2;url=login.html'); 
      $phone_error="手机号已注册!";
      $phone_error_isShow="";
      // exit($_POST['phone']." 该手机号已注册!正在跳往登录页面...");
    }
    
    if($username_isExist){
      $username_error="用户名已存在!";
      $username_error_isShow="";
      // header('Refresh:2;url=register.html'); 
      // exit($_POST['username']." 用户名已存在!正在返回注册页面...");
    }

    if(!$phone_isExist&&!$username_isExist){
      $sql = "insert into user values('{$_POST['username']}',{$_POST['phone']},'{$_POST['password']}')";
      $res = pll_query($sql);
      header('Location:register_success.php');
    }


  }

  $password_value=isset($_POST['password'])?$_POST['password']:'';




  include_once 'register.html';

?>