<?php
include('../template-parts/session.php');
require '../config.php';
$steamid = $_GET['steamid'];
$reason = $_GET['reason'];
$sql = "INSERT INTO ".KICKS_TABLE." (".KICKS_COLUMN_STEAMID.",".KICKS_COLUMN_REASON.",".KICKS_COLUMN_KICKED.") VALUES  ( '{$steamid}' , '{$reason}' , '0')";
$link->query($sql) === TRUE;
