<?php 
	include 'public/common/config.php';
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$send = $_POST['send'];
	$pick = $_POST['pick'];
	$info = $_POST['info'];
	$time = time()+28800;
	echo $send;
	echo '<br>';
	echo $info;
	echo '<br>';
	// 准备SQL语句
	$sql = "insert into wishtab(info,send,pick,time) values('{$info}','{$send}','{$pick}','{$time}')";
	$smt = $pdo->prepare($sql);
	// 执行
	if($smt->execute()){
		echo "<script>location='index.php?a=list'</script>";
	}

 ?>