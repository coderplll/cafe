<?php
  include_once '../../0php_mysql.php';

  //获取所有
  $sql = "select * from user";
  $res = pll_query($sql);

  //遍历结果集放入数组
  $users = array();
  while($row = mysqli_fetch_assoc($res)){
    $users[] = $row;
  }
  
  $user_names = array();
  $phones = array();
  foreach($users as $k =>$user){
    $user_names[]=$user['username'];
    $phones[]=$user['phone'];

  }
  

  header('Content-type: text/json');
  // echo $drinks;
  echo json_encode(array("code"=>0,"data"=>$users));

?>