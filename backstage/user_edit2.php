<?php
  include_once '../0php_mysql.php';

  //接收
  $name = isset($_POST['name']) ? trim($_POST['name']) : '';
  $id = isset($_GET['id']) ? trim($_GET['id']) : '';

  //合法验证 标题,内容不为空
  if(empty($name)){
    header('Refresh:1;url=news_add.html');  //header前不能有输出,header refresh不会影响后面脚本执行
    exit('不能为空!') ;
  }

  $food_names = array();
  foreach($foods as $k =>$food){
    $food_names[]=$food['name'];
  }

  if(in_array($name,$food_names)){
    header('Refresh:1;url=food_edit.php?id='.$id);  //header前不能有输出,header refresh不会影响后面脚本执行
    exit('修改失败,美食类名已存在!') ;
  }

  //组织sql
  $sql = "update food set name = '$name' where food_id = $id";
  $insert_id = pll_query($sql);


  //提示同时去到列表页
  header('Refresh:2;url=food.php'); 
  echo $name . ':修改成功!' ;
  // header('Location:food.php'); 






?>