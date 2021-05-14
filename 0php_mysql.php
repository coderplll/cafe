<?php
  header('Content-type:text/html;charset=utf-8');
  // echo '<pre>';

  //端口默认连接3306,可以修改localhost:3333
  $link = mysqli_connect('localhost','root','123456') or die('数据库连接失败');

  function pll_query($sql){
    global $link;
    $res = mysqli_query($link,$sql);
    if(!$res){
      echo 'sql指令出错,错误编号:'.mysqli_errno($link)."<br/>";
      echo 'sql指令出错,错误信息:'.mysqli_error($link);
      //终止代码执行
      exit();
    }
    return $res;
  }

  pll_query("set names utf8");

  pll_query("use cafe");

  //获取公共数据
  $sql = "select * from drink";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $drinks = array();
  while($row = mysqli_fetch_assoc($res)){
    $drinks[] = $row;
  }
  // var_dump($drinks);

  //获取所有
  $sql = "select * from food";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $foods = array();
  while($row = mysqli_fetch_assoc($res)){
    $foods[] = $row;
  }

?>