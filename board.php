<?php  
session_start();
header("Content-Type:text/html;charset=utf-8");
$link = mysqli_connect("localhost","root","root");
$db = mysqli_select_db($link,"workon");  
mysqli_query($link,"set names 'gdk'");
?>
<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>主板</title>
	<link rel="stylesheet" href="./css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" type="text/css" href="./css/default.css">
	<link rel="stylesheet" href="./css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" type="text/css" href="./css/compo.css"><!--组件样式-->
	<script src="./js/modernizr.js"></script> <!-- Modernizr -->
	<script src="./js/jquery-2.1.1.min.js"></script>
	<script src="./js/jquery.menu-aim.js"></script>
	<script src="./js/main.js"></script>
	<script src="./js/jquery.hDialog.js"></script>
	<script>
	$(document).ready(function()
{
	//注销
	$("#logout1").bind('click',function()
	{
		$.ajax
		({
			url:"./js_php_db.php",
			type:"POST",
			data:"{'action':'logout'}",
			async:false,
			success:function(){window.location.href = './index.html';},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
 					alert(XMLHttpRequest.status);
 					alert(XMLHttpRequest.readyState);
 					alert(textStatus);},
 		});
	});
	//新建项目功能(1,2)
	$("#porject_add_btn").bind('click',function()
	{
		add_pro_list();		
	}
	);
	//1,添加项目导航列表
	function add_pro_list()
		{
		$("#project-add>li:eq(0)").clone(true).addClass("pro_me_new").find("a").text("新增项目").end().appendTo("#project-add");
		}
		
	//加载默认首页
	htmlobj=$.ajax(
    		{
    			url:"./components/pro_me.php",
    			async:false
    		});
     $("#comp-box").html(htmlobj.responseText);
      
	// 加载我创建的项目组件
      $(".pro_me").bind('click',function()
      {
    	htmlobj=$.ajax(
    		{
    			url:"./components/pro_me.php",
    			async:false
    		});
        $("#comp-box").html(htmlobj.responseText);
      });
      // 加载其他人创建的项目组建
      $(".pro_other").bind('click',function()
      {
    	htmlobj=$.ajax(
    		{
    			url:"./components/pro_other.php",
    			async:false
    		});
        $("#comp-box").html(htmlobj.responseText);
      });
      // 加载相册组件
      $("#gallery").bind('click',function()
      {
    	htmlobj=$.ajax(
    		{
    			url:"./components/gallery.php",
    			async:false
    		});
        $("#comp-box").html(htmlobj.responseText);
      });
      //加载内部资料文件上传
   		$("#file").bind('click',function()
      {
    	htmlobj=$.ajax(
    		{
    			url:"./components/file.php",
    			async:false
    		});
        $("#comp-box").html(htmlobj.responseText);
      });

      // 加载团队组件
      $("#team_detail").bind('click',function()
      {
    	htmlobj=$.ajax(
    		{
    			url:"./components/team_detail.php",
    			async:false
    		});
        $("#comp-box").html(htmlobj.responseText);
      });
     //头像上传组件
     $("#user_settings").bind('click',function()
      {
    	htmlobj=$.ajax(
    		{
    			url:"./components/user_settings.html",
    			async:false
    		});
        $("#comp-box").html(htmlobj.responseText);
      });
      //加载文件上传下载，文件库 组件
      $('#workdiary').bind('click',function()
      {
      	htmlobj=$.ajax
      	({
      		url:"./components/workdiary.php",
      		async:false
      	});
      	$("#comp-box").html(htmlobj.responseText);
      });
});
	</script>
</head>
<body onload="setInterval('chat.update()', 3000)">
	<header class="cd-main-header">
		<a class="cd-logo" href="./board.php">workon</a>
		
		<div class="cd-search is-hidden">
			<form action="#0">
				<input type="search" placeholder="搜索...">
			</form>
		</div> <!-- cd-search -->

		<a class="cd-nav-trigger">引<span></span></a>

		<nav class="cd-nav">
			<ul class="cd-top-nav">
				<li><a href="#team-progress">团队成长</a></li>
				<li><a href="#proect-report">项目报告</a></li>
				<li class="has-children account">
					<a>
						<img src="./img/por_fox.png" alt="头像">
						<?php
						echo $_SESSION['user_name'];
						?>
					</a>

					<ul>

						<li id="user_settings">
						<a href="#settings">账户设置</a>
						</li>
						<li><a href="/help.html" target="_blank">帮助</a></li>
						<li id="logout1"><a href="#logout">注销</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header> <!-- .cd-main-header -->

	<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
				<li class="has-children overview active">
					<a id="porject_add_btn" href="#my-project">新建项目 + </a>					
					<ul id="project-add">
						<li class="pro_me" id="pro_me_test"><a href="#my-project">项目示例</a></li>
						<li class="pro_other"><a href="#team-project">团队项目</a></li>
					</ul>
	
				<li class="has-children bookmarks active">
					<a href="#">资源管理</a>
					
					<ul>
						<li class="file" id="workdiary"><a href="#workdiary">工作日记</a></li>
					</ul>
				</li>
				<li class="images" id="gallery">
					<a href="#photo">图片库</a>
				</li>

				<li class="has-children users" id="team_detail">
					<a href="#team">团队</a>
				</li>
			</ul>
		</nav>
		<div class="content-wrapper" id="comp-box">
			
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
</body>
</html>