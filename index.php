<!DOCTYPE html>
<html>
	<head>
		<title>Hi！我是一个演示！</title>
		<?php 
error_reporting(0);
@header('content-Type: text/html; charset=utf-8');
ob_start();
date_default_timezone_set('Asia/Shanghai');

// 检测函数支持
function isfun($funName) {
	return (false !== function_exists($funName))?'支持':'<font color="red">不支持</font>';
}
// 根据不同系统取得CPU相关信息
switch(PHP_OS) {
	case "Linux":
	$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
	break;
	case "FreeBSD":
	$sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
	break;
	default:
	break;
}
//linux系统探测
function sys_linux() {

	// UPTIME
	if (false === ($str = @file("/proc/uptime"))) return false;
	$str = explode(" ", implode("", $str));
	$str = trim($str[0]);
	$min = $str / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."天";
	if ($hours !== 0) $res['uptime'] .= $hours."小时";
	$res['uptime'] .= $min."分钟";
	return $res;
}

//FreeBSD系统探测
function sys_freebsd() {
	//UPTIME
	if (false === ($buf = get_key("kern.boottime"))) return false;
	$buf = explode(' ', $buf);
	$sys_ticks = time() - intval($buf[3]);
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."天";
	if ($hours !== 0) $res['uptime'] .= $hours."小时";
	$res['uptime'] .= $min."分钟";
	return $res;
}	
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
				var t1 = Date.UTC(2015,03,24,10,02,10)
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
				<div align="center"><span id="sitetime"></span>				</div></th></tr>
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
					?>				</td>
			</tr>
			<tr>
				<td width="15%">服务器时间</td>
				<td width="30%"><?php echo gmdate("Y年n月j日 H:i:s",time()+8*3600);?></td>
				<td>开机时间</td>
				<td><?php if ($sysInfo['uptime']!=""){ echo $sysInfo['uptime'];} else  echo "系统不支持"; ?></td>
			</tr>
			<tr>
				<td>解译引擎</td>
				<td><?php 
echo $_SERVER['SERVER_SOFTWARE'];
					?>			  </td>
				<td>端口</td>
				<td><?php 
echo $_SERVER['SERVER_PORT'];
					?>				</td>
			</tr>
			<tr>
				<td>用户</td>
				<td><?php echo @get_current_user();?></td>
				<td>绝对路径</td>
				<td><?php 
echo $_SERVER['DOCUMENT_ROOT'] ? str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']) : str_replace('\\', '/', dirname(__FILE__));
					?>				</td>
			</tr>
			<tr>
				<td width="15%">可用空间</td>
				<td width="30%"><?php echo round(disk_free_space(".")/(1024*1024),2);?>&nbsp;M</td>
				<td width="15%">PHP版本</td>
				<td width="40%"><?php 
echo PHP_VERSION;
					?>				</td>
			</tr>
			<tr>
			<tr>
				<td width="15%">FTP支持</td>
				<td width="30%"><?php echo isfun("ftp_login");?></td>
				<td width="15%">MySQL数据库</td>
				<td width="40%"><?php echo isfun("mysql_close");?></td>
			</tr>

		</table>

		<div id="cboxdiv" style="position: relative; margin: 0 auto; width: 800px; font-size: 0; line-height: 0;">
			<div style="position: relative; height: 193px; overflow: auto; overflow-y: auto; -webkit-overflow-scrolling: touch; border:#000000 1px solid;"><iframe src="//www4.cbox.ws/box/?boxid=4254685&boxtag=pbn22x&sec=main" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="auto" allowtransparency="yes" name="cboxmain4-4254685" id="cboxmain4-4254685"></iframe></div>
			<div style="position: relative; height: 107px; overflow: hidden; border:#000000 1px solid; border-top: 0px;"><iframe src="//www4.cbox.ws/box/?boxid=4254685&boxtag=pbn22x&sec=form" marginheight="0" marginwidth="0" frameborder="0" width="100%" height="100%" scrolling="no" allowtransparency="yes" name="cboxform4-4254685" id="cboxform4-4254685"></iframe>
			</div>
		</div>
	</body>
</html>
