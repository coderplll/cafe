<?php
  include_once '0php_mysql.php';
    //开启session
	session_start();

  //获取所有
  $sql = "select * from drink_detail";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $drink_details = array();
  while($row = mysqli_fetch_assoc($res)){
    $drink_details[] = $row;
  }

  //获取所有
  $sql = "select * from food_detail";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $food_details = array();
  while($row = mysqli_fetch_assoc($res)){
    $food_details[] = $row;
  }


  if (isset($_GET['drink_detail_id'])){
    $drink_detail_id=$_GET['drink_detail_id'];
    $sql = "select * from drink_detail where drink_detail_id=$drink_detail_id";
    $res = pll_query($sql);
    $drink_detail = mysqli_fetch_assoc($res);
    $drink_detail_name = $drink_detail['name'];
    $drink_detail_detail = $drink_detail['detail'];
    $drink_detail_drink_id = $drink_detail['drink_id'];
    
    $sql = "select name from drink where drink_id=$drink_detail[drink_id]";
    $res = pll_query($sql);
    $drink_name = mysqli_fetch_assoc($res)['name'];
    $drink_detail_isShow='';

    $title=$drink_detail_name;
  }else{
    $drink_detail_id='';
    $drink_detail_name = '';
    $drink_detail_detail = '';
    
    $drink_name = '';
    $drink_detail_isShow='d-none';
  }
  
  // var_dump($drink_detail);
  

  // var_dump($drink_name['name']) ;


  if (isset($_GET['food_detail_id'])){
    $food_detail_id=$_GET['food_detail_id'];
    $sql = "select * from food_detail where food_detail_id=$food_detail_id";
    $res = pll_query($sql);
    $food_detail = mysqli_fetch_assoc($res);
    $food_detail_name = $food_detail['name'];
    $food_detail_detail = $food_detail['detail'];
    $food_detail_food_id = $food_detail['food_id'];


    $sql = "select name from food where food_id=$food_detail[food_id]";
    $res = pll_query($sql);
    $food_name = mysqli_fetch_assoc($res)['name'];
    $food_detail_isShow='';
    $title=$food_detail_name;
  }else{
    $food_detail_isShow='d-none';
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



  // echo '<pre/>';
  // var_dump($drink_details);
  // echo count($drinks);

  // foreach($drink_details as $k =>$drink_detail){
  //   if(isset($_GET['category'])&&isset($_GET['id'])&&$_GET['category']==0&&$_GET['id']==0){
  //     var_dump($drink_detail);
  //   }
  // }
  // foreach($drink_details as $k =>$drink_detail){
  //   if(isset($_GET['category'])&&isset($_GET['id'])&&$_GET['category']==0&&$drink_detail['drink_id']==$drink['drink_id']){
  //     var_dump($drink_detail);
  //   }
  // }





    // if(isset($_GET['category'])&&isset($_GET['id'])&&$_GET['category']==0&&$drink_detail['drink_id']==$_GET['id']){
    //   var_dump($drink_detail);
    // }

  // }

  
  include_once "detail.html"
?>