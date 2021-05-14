<?php
  include_once '../0php_mysql.php';

  //接收
  $name = isset($_GET['name']) ? trim($_GET['name']) : '';

  //组织sql
  $sql = "delete from user where username='$name'";
  pll_query($sql);

  //提示同时去到列表页
  header('Location:user.php'); 
  






?>