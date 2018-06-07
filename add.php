<style>
	.tot{
		display: flex;
	}
	.tot .see,.tot .write{
		padding:20px;
		flex:1;
	}
	.see .s-con{
		word-break: break-all;
		margin:0 auto;
		background: url('./public/img/face.gif') no-repeat;
		width:240px;
		height: 190px;
	}
	.write .w-con{
		background-color: white;
	}
	/*愿望清单样式*/
	.s-con .s-tit{
		padding-bottom: 5px;
		margin:0;
		border-bottom: 1px solid #999;
	}
	.s-con p{
		font-size: 12px;
	}
	.s-con .s-send{
		color:#f12282;
	}
	.s-con .s-pick{
		color:#5aa;
		text-align: right;
	}
	.s-con .s-time{
		color: #ccc;
		text-align: right;
	}
	.s-con .s-info{
		height:50px;
	}
</style>
<div class='tot'>
	<!-- 左侧愿望清单 -->
	<div class='see'>
		<h4>许愿字条预览</h4> 
		<div class='s-con'>
			<h5 class='s-tit'>愿望预览：</h5>
			<p class='s-send'></p>
			<p class='s-info'></p>
			<p class='s-pick'></p>
			<p class='s-time'><?php echo date('Y-m-d H:i:s',time()+28800); ?></p>
		</div>
	</div>
	<!-- 右侧填写愿望 -->
	<div class='write'>
		<h4>请填写愿望~~</h4>
		<form action="insert.php" method='post' class='w-con'>
			<p>
				<span>发送人：</span>
				<input type="text" name='send' class='w-send'>
			</p>
			<p>
				<span>接收人：</span>
				<input type="text" name='pick' class='w-pick'>
			</p>
			<p>
				<p>愿望内容：</p>
				<textarea name="info" cols="30" rows="10" class='w-info'></textarea>
			</p>
			<p>
				<input type="submit" value='提交'>
			</p>
		</form>
	</div>
</div>
<script>
	// 获取发送者
	$('.w-send').keyup(function(){
		$('.s-send').text($(this).val());
	});
	//获取接受者
	$('.w-pick').keyup(function(){
		$('.s-pick').text($(this).val());
	});
	//获取愿望内容
	$('.w-info').keyup(function(){
		$('.s-info').text($(this).val());
	});
</script>