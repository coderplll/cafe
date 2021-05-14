<?php
  include_once '../0php_mysql.php';

  //接收
  $id = isset($_GET['id']) ? trim($_GET['id']) : '';

  //组织sql
  $sql = "delete from drink where drink_id=$id";
  pll_query($sql);

  //提示同时去到列表页
  header('Location:drink.php'); 
  






?>