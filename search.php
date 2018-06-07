<style>
	/*背景图片*/
	.showlist{
		position: absolute;
		word-break: break-all;
		background: url('./public/img/face.gif') no-repeat;
		width:240px;
		height: 190px;
	}
	/*显示部分头部样式*/
	.showlist .l-tit{
		margin:0;
		padding-bottom: 4px;
		border-bottom: 1px solid #ccc;
	}
	/*显示部分内容区样式*/
	.showlist p{
		font-size: 12px;
	}
	.showlist .l-send{
		color:#f12282;
	}
	.showlist .l-time,.showlist .l-pick{
		text-align: right;
	}
	.showlist .l-time{
		color:#ccc;
	}
	.showlist .l-pick{
		color:#5aa;
	}
	.showlist .l-info{
		height: 50px;
	}
</style>
<?php 
	include 'public/common/config.php';
	$id = $_GET[id];
	// 准备SQL语句
	$sql = "select * from wishtab where id={$id}";
	$smt = $pdo -> prepare($sql);
	// 执行
	$smt->execute();
	// 获取数据的索引数组
	$rows = $smt->fetchAll();
	foreach ($rows as $row) {
		echo '<div class="showlist">';
		echo "<h5 class='l-tit'>愿望编号：{$row[id]}</h5>";
		echo "<p class='l-send'>To:{$row[send]}<p>";
		echo "<p class='l-info'>{$row[info]}<p>";
		echo "<p class='l-pick'>{$row[pick]}</p>";
		echo "<p class='l-time'>".date('Y-m-d H:i:s',$row[time])."</p>";
		echo '</div>';
	}
 ?>