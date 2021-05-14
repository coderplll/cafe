<?php
  include_once '../../0php_mysql.php';



  

  header('Content-type: text/json');
  // echo $drinks;
  echo json_encode(array("code"=>0,"data"=>$foods));

?>