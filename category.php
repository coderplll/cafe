<?php
  include_once '0php_mysql.php';
    //开启session
	session_start();

  
  if(isset($_GET['category'])&&$_GET['category']==0){
    $cup_name = 'cup-fill';
    $cup_color= 'text-danger';
    $cup_isShow= 'show';
    $cup_isRotate= 'rotate(90deg)';
    $cup_border= '3px solid #f13757';
    $title="饮品";
  }else{
    $cup_name = 'cup';
    $cup_color= '';
    $cup_isShow= '';
    $cup_isRotate= '';
    $cup_border= '0px';
  }



  if(isset($_GET['category'])&&$_GET['category']==1){
    $food_name= 'cake-fill';
    $food_color='text-danger';
    $food_isShow= 'show';
    $food_isRotate= 'rotate(90deg)';
    $food_border= '3px solid #f13757';
    $title="美食";
  }else{
    $food_name= 'cake';
    $food_color='';
    $food_isShow= '';
    $food_isRotate= '';
    $food_border= '0px';
  }

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

  
  include_once "category.html"
?>