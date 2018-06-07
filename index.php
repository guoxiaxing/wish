<!-- 引入连接数据库的文件 -->
<?php 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include './public/common/config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>wish</title>
	<link rel="stylesheet" href="./public/css/index.css">
	<script src='public/js/jquery.min.js'></script>
	<script src='public/js/jquery.drag.js'></script>
</head>
<body>
	<!-- 页面区域 -->
	<div class='main'>
		<!-- 头部 -->
		<div class='header'>开心了，就来许愿吧！</div>
		<!-- 导航 -->
		<div class='nav'>
			<div class='logo'>
				<a href="index.php"><img src="public/img/logo.jpg" alt="logo"></a>
			</div>
			<div class='send'>
				<a href="index.php?a=add"><img src="public/img/nava.gif" alt="send"></a>
			</div>
			<div class='read'>
				<a href="index.php?a=list"><img src="public/img/navc.gif" alt="read"></a>
			</div>
			<div class='search'>
				<input type="text" class='sub-search' maxlength='15' placeholder='请输入愿望编号'>
				<input type="image" src='public/img/sub.gif' class='search-icon'>
			</div>
		</div>
		<!-- 内容 -->
		<div class='content'>
		<!-- 将数据库中的记录显示在页面中 -->
			<?php 
				switch ($_GET['a']) {
					case 'list':
						include 'list.php';
						break;
					case 'add':
						include 'add.php';
						break;
					case 'search':
						include 'search.php';
						break;
					default:
						include 'show.php';
				}
			 ?>
		</div>
		<!-- 页尾 -->
		<div class='footer'>www.wish.com</div>
	</div>
</body>
<script>
// 许愿图片鼠标悬停时改变
	$('.send img').hover(
			function(){
				$(this).attr('src','public/img/navb.gif');
			},function(){
				$(this).attr('src','public/img/nava.gif');
			}
		);
	$('.read img').hover(
			function(){
				$(this).attr('src','public/img/navd.gif');
			},function(){
				$(this).attr('src','public/img/navc.gif');
			}
		);
 	//获取内容区域总的宽高
 	var contentW = $('.content').width();
 	var contentH = $('.content').height();
 	// 许愿清单的可活动范围
 	// 许愿清单的大小
 	var w = 240;
 	var h = 190;
 	$('.content').css('position','relative');
 	//对每一个愿望清单的位置进行随机安排
 	$('.showlist').each(function(){
 		var x = Math.ceil((contentW-w)*Math.random());
 		var y = Math.ceil((contentH-h)*Math.random());
 		$(this).css({
	 		'top':y+'px',
	 		'left':x+'px'
 		});
 	}).drag();
 	//搜索处理
 	$('.search-icon').click(function(){
 		var val = $('.sub-search').val();
 		// 地址栏拼接实现页面跳转
 		window.location.search = '?a=search&id='+val;
 	});
</script>
</html>