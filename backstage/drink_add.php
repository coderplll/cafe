<?php
  include_once '../0php_mysql.php';

  //接收
  $name = isset($_POST['name']) ? trim($_POST['name']) : '';

  //合法验证 标题,内容不为空
  if(empty($name)){
    header('Refresh:1;url=news_add.html');  //header前不能有输出,header refresh不会影响后面脚本执行
    exit('不能为空!') ;
  }

  $drink_names = array();
  foreach($drinks as $k =>$drink){
    $drink_names[]=$drink['name'];
  }

  if(in_array($name,$drink_names)){
    header('Refresh:1;url=drink_add.html');  //header前不能有输出,header refresh不会影响后面脚本执行
    exit('饮品类名已存在!') ;
  }

  //组织sql
  $sql = "insert into drink values(null,'{$name}')";
  $insert_id = pll_query($sql);

  //提示同时去到列表页
  header('Refresh:2;url=drink.php'); 
  echo $name . ':增加成功!' ;






?>