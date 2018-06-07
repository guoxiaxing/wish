<style>
	/*显示表格样式*/
	.list{
		border-collapse:collapse;
		width:100%;
		color:#555;
	}

	.list td,.list th{
		border:1px solid #ccc;
		background: #fff;
		height:35px;
		font-size:14px;
	}

	.list th{
		background: #eee;
	}
	.list .sender{
		color:#f12282;
	}
	.list .picker{
		color:#5aa;
	}
</style>
<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include './public/common/config.php';
	// 准备SQL语句
	$sql = 'select * from wishtab order by id desc';
	$smt = $pdo -> prepare($sql);
	// 执行
	$smt->execute();
	// 获取数据
	$rows = $smt->fetchAll();
	//显示数据
	echo "<table class='list' align='center'>";
	echo '<tr>';
	echo '<th>编号</th>';
	echo '<th>内容</th>';
	echo '<th>发送者</th>';
	echo '<th>接收者</th>';
	echo '<th>时间</th>';
	echo '</tr>';
	foreach ($rows as $row) {
		echo '<tr>';
		echo "<td>{$row['id']}</td>";
		echo "<td>{$row['info']}</td>";
		echo "<td class='sender'>{$row['send']}</td>";
		echo "<td class='picker'>{$row['pick']}</td>";
		echo "<td>".date('Y-m-d H:i:s',$row[time])."</td>";
		echo '</tr>';
	}
	echo '</table>';
 ?>