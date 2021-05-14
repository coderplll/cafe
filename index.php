<?php
  include_once '0php_mysql.php';
  //开启session
	session_start();

    //获取所有
  $sql = "select * from ad";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $ads = array();
  while($row = mysqli_fetch_assoc($res)){
    $ads[] = $row;
  }


  //获取所有
  $sql = "select * from tree";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $trees = array();
  while($row = mysqli_fetch_assoc($res)){
    $trees[] = $row;
  }

  //获取所有
  $sql = "select * from jumbotron";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $jumbotrons = array();
  while($row = mysqli_fetch_assoc($res)){
    $jumbotrons[] = $row;
  }

  //获取所有
  $sql = "select * from hot_drinks";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $hot_drinks = array();
  while($row = mysqli_fetch_assoc($res)){
    $hot_drinks[] = $row;
  }

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

  // foreach($trees as $k =>$tree):
  //   // echo ($k+1)%2==0?"t":"f";
  //   if(!(($k+1)%2==0)){
  //     echo "true";
  //   }else{
  //     echo "false";
  //   }

  // endforeach;




  
  //包含html模板
  include_once 'index.html';
?>