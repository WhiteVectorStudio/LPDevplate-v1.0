<?php
	require_once "initialize.php";
	$id = $_REQUEST['id'];
	$status = $_REQUEST['status'];
	echo "Удалено";
	Database::ChangeStatus($id, $status);
?>