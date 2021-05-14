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
  if(isset($_GET['id'])&&$_GET['id']!=0){

    $id=$_GET['id'];
    $sql = "select * from tree where tree_id=$id";
    $res = pll_query($sql);
  
    //遍历结果集放入数组
    $trees = array();
    while($row = mysqli_fetch_assoc($res)){
      $trees[] = $row;
    }
    $tree=$trees[0];
    $isShow='';
    $index_isShow='d-none';
    
  }else{
    $id=0;
    //获取所有
    $sql = "select * from tree";
    $res = pll_query($sql);

    //遍历结果集放入数组
    $trees = array();
    while($row = mysqli_fetch_assoc($res)){
      $trees[] = $row;
    }
    $isShow='d-none';
    $index_isShow='';
  }


  
  //包含html模板
  include_once 'origin.html';
?>