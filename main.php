<?php
// 連結資料庫
$dbhost = "127.0.0.1"; //資料庫網址或IP
$dbusername = ""; //資料庫帳號
$dbuserpassword = ""; //資料庫密碼
$default_dbname = "";//資料庫名稱

$connection = mysql_connect($dbhost, $dbusername, $dbuserpassword) or die("無法連結資料庫！");
$db = mysql_select_db($default_dbname, $connection) or die("無法選擇資料庫");
mysql_query("SET NAMES UTF8;");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
//fetch userData from index.html
if (isset($_POST['state'])){
	$state = htmlspecialchars($_POST['state']);
	//Logined and Get Userdata
	if ($state === 'logined'){
		if (isset($_POST['UID'])) {$UID = $_POST['UID'];}
		if (isset($_POST['name'])) {$name = $_POST['name'];}
		if (isset($_POST['email'])) {$email = $_POST['email'];}
		//save UID Username and User email to Mysql
		$sql = "INSERT INTO user (uid,name,email) VALUES ('".$UID."','".$name."','".$email."')";
		$sql_result = mysql_query($sql);
	}
}

//disconnect with Mysql
//mysql_free_result($sql_result);
mysql_close($connection);
?>