<?php
  include_once '../0php_mysql.php';

  //接收
  $id = isset($_GET['id']) ? trim($_GET['id']) : '';

  //组织sql
  $sql = "select name from food where food_id=$id";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $names = array();
  while($row = mysqli_fetch_assoc($res)){
    $names[] = $row;
  }
  $name=$names[0]['name'];



  //包含html模板
  include_once 'food_edit.html';


?>