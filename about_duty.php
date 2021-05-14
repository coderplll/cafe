<?php
  include_once '0php_mysql.php';
  //开启session
	session_start();


  //跨脚本访问
  if(isset($_SESSION['name'])){
    $username_isShow="";
    $login_isShow="d-none";
    $username = $_SESSION['name'];
  }else{
    $username_isShow="d-none";
    $login_isShow="";
    $username = '登录';
  }

    //获取所有
    $sql = "select * from about_duty";
    $res = pll_query($sql);
  
    //遍历结果集放入数组
    $duties = array();
    while($row = mysqli_fetch_assoc($res)){
      $duties[] = $row;
    }




  
  //包含html模板
  include_once 'about_duty.html';
?>