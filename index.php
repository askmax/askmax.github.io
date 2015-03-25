<!DOCTYPE html>
<html>
	<head>
	<title>Hi！我是一个演示！</title>
		<?php 
error_reporting(0);
@header('content-Type: text/html; charset=utf-8');
ob_start();
date_default_timezone_set('Asia/Shanghai');
		?>
		<script language=javascript>
			function siteTime(){
				window.setTimeout("siteTime()", 1000);
				var seconds = 1000
				var minutes = seconds * 60
				var hours = minutes * 60
				var days = hours * 24
				var years = days * 365
				var today = new Date()
				var todayYear = today.getFullYear()
				var todayMonth = today.getMonth()+1
				var todayDate = today.getDate()
				var todayHour = today.getHours()
				var todayMinute = today.getMinutes()
				var todaySecond = today.getSeconds()
				var t1 = Date.UTC(2015,3,24,10,02,10)
				var t2 = Date.UTC(todayYear,todayMonth,todayDate,todayHour,todayMinute,todaySecond)
				var diff = t2-t1
				var diffYears = Math.floor(diff/years)
				var diffDays = Math.floor((diff/days)-diffYears*365)
				var diffHours = Math.floor((diff-(diffYears*365+diffDays)*days)/hours)
				var diffMinutes = Math.floor((diff-(diffYears*365+diffDays)*days-diffHours*hours)/minutes)
				var diffSeconds = Math.floor((diff-(diffYears*365+diffDays)*days-diffHours*hours-diffMinutes*minutes)/seconds)
				document.getElementById("sitetime").innerHTML=" 我已经运行： <font color=red>"+diffYears+"</font> 年 <font color=red>"+diffDays 
				+"</font> 天 <font color=red>"+diffHours+"</font> 小时 <font color=red>"+diffMinutes+"</font> 分钟 <font color=red>"+diffSeconds 
				+"</font> 秒"}
			siteTime()
		</script>
		<style type="text/css">
			{font-family: Tahoma, "Microsoft Yahei", Arial; }
			body{margin: 0 auto; width: 800px; text-align: center; padding: 0; background-color:#FFFFFF;font-size:12px;font-family:Tahoma, Arial ;
				position:absolute;
				top:10%;
				left:20%;
			}
			table{clear:both;padding: 0; margin: 0 0 10px;border-collapse:collapse; border-spacing: 0;}
			th{padding: 3px 6px; font-weight:bold;background:#000000;color:#FFFFFF;border:1px solid #3066a6; text-align:left;}
			tr{padding: 0; background:#F7F7F7;}
			td{padding: 3px 6px; border:1px solid #CCCCCC;}
		</style>
	</head>
	<body>
		<table width="100%" cellpadding="3" cellspacing="0">
			<tr><th colspan="4">
				<div align="center"><span id="sitetime"></span>
				</div></th></tr>
			<tr>
				<td>域名/IP</td>
				<td colspan="3"><?php 
echo $_SERVER['SERVER_NAME'];
					?>
					(<?php 
if ('/' == DIRECTORY_SEPARATOR) {
	echo $_SERVER['SERVER_ADDR'];
} else {
	echo @gethostbyname($_SERVER['SERVER_NAME']);
}
					?>
					)</td>
			</tr>
			<tr>
				<td>服务器标识</td>
				<td colspan="3"><?php 
if ($sysInfo['win_n'] != '') {
	echo $sysInfo['win_n'];
} else {
	echo @php_uname();
}
					?>
				</td>
			</tr>
			<tr>
				<td width="12%">操作系统</td>
				<td width="25%"><?php 
$os = explode(' ', php_uname());
echo $os[0];
					?>
					&nbsp;内核版本：<?php 
if ('/' == DIRECTORY_SEPARATOR) {
	echo $os[2];
} else {
	echo $os[1];
}
					?>
				</td>
				<td width="10%">解译引擎</td>
				<td width="53%"><?php 
echo $_SERVER['SERVER_SOFTWARE'];
					?>
				</td>
			</tr>
			<tr>
				<td>服务器语言</td>
				<td><?php 
echo getenv('HTTP_ACCEPT_LANGUAGE');
					?>
				</td>
				<td>端口</td>
				<td><?php 
echo $_SERVER['SERVER_PORT'];
					?>
				</td>
			</tr>
			<tr>
				<td>主机名</td>
				<td><?php 
if ('/' == DIRECTORY_SEPARATOR) {
	echo $os[1];
} else {
	echo $os[2];
}
					?>
				</td>
				<td>绝对路径</td>
				<td><?php 
echo $_SERVER['DOCUMENT_ROOT'] ? str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']) : str_replace('\\', '/', dirname(__FILE__));
					?>
				</td>
			</tr>
			<tr>
				<td width="12%">PHP版本</td>
				<td width="25%"><?php 
echo PHP_VERSION;
					?>
				</td>
				<td>探针路径</td>
				<td><?php 
echo str_replace('\\', '/', __FILE__) ? str_replace('\\', '/', __FILE__) : $_SERVER['SCRIPT_FILENAME'];
					?>
				</td>
			</tr>
		</table>
		<div id="cboxdiv" style="position: relative; margin: 0 auto; width: 800px; font-size: 0; line-height: 0;">
			<div style="position: relative; height: 193px; overflow: auto; overflow-y: auto; -webkit-overflow-scrolling: touch; border:#000000 1px solid;"><iframe src="//www4.cbox.ws/box/?boxid=4254685&boxtag=pbn22x&sec=main" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="auto" allowtransparency="yes" name="cboxmain4-4254685" id="cboxmain4-4254685"></iframe></div>
			<div style="position: relative; height: 107px; overflow: hidden; border:#000000 1px solid; border-top: 0px;"><iframe src="//www4.cbox.ws/box/?boxid=4254685&boxtag=pbn22x&sec=form" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="no" allowtransparency="yes" name="cboxform4-4254685" id="cboxform4-4254685"></iframe></div>
		</div>
	</body>
</html>
