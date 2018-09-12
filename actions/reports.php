<?php
include('../template-parts/session.php');
require '../config.php';
$action    = $_GET['action'];
$userid    = $_GET['userid'];
$type      = mysqli_real_escape_string($link, $_GET['type']);
$timestamp = strtotime('now');
$byadmin   = $_GET['byadmin'];
$comment   = mysqli_real_escape_string($link, $_GET['comment']);

if($action == 'warning'){
  $sql = "INSERT INTO user_warnings ( userid , type, byadmin, warning, time_added) VALUES ( '{$userid}', '{$type}', '{$byadmin}', '{$comment}', '{$timestamp}') ";
}

if($action == 'report'){
  $sql = "INSERT INTO user_reports ( reported_by , report_type, report_comment, report_time , userid  ) VALUES ( '{$byadmin}', '{$type}', '{$comment}', '{$timestamp}' , '{$userid}') ";
}

if($link->query($sql) === TRUE){
 header('location: /admin/view-user.php?userid=' . $userid);
}else{
  echo 'Something went wrong <br>';
  echo $sql;
  echo '<br>';
  echo $comment;
}
