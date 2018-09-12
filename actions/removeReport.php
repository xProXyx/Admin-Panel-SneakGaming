<?php
include('../template-parts/session.php');
require '../config.php';
$action = $_GET['action'];
$reportId = $_GET['reportId'];

$sql = "DELETE FROM `{$action}` WHERE id = '{$reportId}' ";

if ($link->query($sql) === TRUE) {
    echo "Report deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
