<?php
ob_start();
// Mariadb Connect TEST
$host = "211.183.3.100";
$id = "root";
$passwd = "test123";
$dbname = "test";

// 커넥션
$db = new mysqli($host, $id, $passwd, $dbname);

if($db){
// 성공부분
	// 로그인 SQL
	$dbid = $_POST['id'];
	$dbpwd = $_POST['pwd'];
	$sql = "select pwd from member where id='$dbid'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$hash = $row['pwd'];
	echo "$dbpwd.<br>";
	echo "$hash.<br>";
	echo "$row.<br>";

	if(password_verify("$dbpwd","$hash")){
		//로그인 성공
		echo '<script>';
		echo 'console.log("Login Success");';
		echo "location.replace('list.php');";
     	echo '</script>';
	}else{
		// 로그인 정보틀림
		echo '<script>';
		echo 'console.log("Login Error");';
		echo 'alert("Login Error! 비밀번호나 아이디를 확인하세요!");';
		//echo "location.replace('index.html');";
		echo '</script>';	
	}
}
else{
    // 실패부분
    echo '<script>';
    echo 'console.log("DB Connection Error");';
    echo 'alert("DB Connection Error!");';
    echo "location.replace('index.html');";
    echo '</script>';
}


?>
