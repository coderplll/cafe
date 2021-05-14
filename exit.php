<?php
	//开启session
	session_start();
  unset($_SESSION['name']);
  if(isset($_GET['category'])&&isset($_GET['id'])){
    $a = $_GET['category'];
    $b = $_GET['id'];
    header("Location:category.php?category=$a&id=$b");
    exit();
  }
  if(isset($_GET['drink_detail_id'])){
    $a = $_GET['drink_detail_id'];
    header("Location:detail.php?drink_detail_id=$a");
    exit();
  }
  if(isset($_GET['food_detail_id'])){
    $a = $_GET['food_detail_id'];
    header("Location:detail.php?food_detail_id=$a");
    exit();
  }
  if(isset($_GET['about'])&&$_GET['about']==1){
    header("Location:about_index.php");
    exit();
  }
  if(isset($_GET['about'])&&$_GET['about']==2){
    header("Location:about_duty.php");
    exit();
  }
  if(isset($_GET['tree_id'])){
    $a = $_GET['tree_id'];
    header("Location:origin.php?id=$a");
    exit();
  }
  header('Location:index.php');
?>
