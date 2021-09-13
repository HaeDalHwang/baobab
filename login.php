<?php
echo '<script>';
echo 'console.log("TEST")';
echo '</script>';
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
	$sql = "select * from member where id='$dbid' and name='$dbpwd'";

	$result = mysqli_query($db,$sql);
	if(mysqli_num_rows($result)==1){
		//로그인 성공
		echo '<script>';
		echo 'console.log("Login Success")';
        echo '</script>';
	}else{
		// 로그인 정보틀림
		echo '<script>';
		echo 'console.log("Login Error")';
		echo '</script>';	
	}
}
else{
    // 실패부분
    echo '<script>';
    echo 'console.log("DB Connection Error")';
    echo '</script>';
}


?>