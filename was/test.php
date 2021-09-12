<?php
// Connect to FTP server
$ftp_server = "211.183.3.100";
$ftpuser = "bsd";
$ftppasswd = "bsd";       	

// Establish ftp connection
$ftp_connection = ftp_connect($ftp_server, 21)
    or die("Could not connect to $ftp_server");
// FTP login 
$login_result = ftp_login($ftp_connection,$ftpuser,$ftppasswd);

// FTP Upload & Download TEST
$filename = $_FILES['userfile']['name'];
$localfile = $_FILES['userfile']['tmp_name'];

$uploaddir = './files/';
$serverfile = $uploaddir . $filename;
if(ftp_put($ftp_connection,$serverfile,$localfile,FTP_BINARY)){
	echo "Successfully upload $filename <br>";
}else{
	echo "Faile.....<br>";
}

if( $login_result ) {
    echo "Successfully FTP Login";    
    // Closing  connection
    ftp_close( $ftp_connection );
} 

echo "<br>";
echo "<hr>";
// Mariadb Connect TEST
echo "MySql 연결 test<br>";
$host = "211.183.3.100";
$id = "root";
$passwd = "test123";
$dbname = "test";

#$db = mysqli_connect( $host, "root", "test123", "test");
$db = new mysqli($host, $id, $passwd, $dbname);

if($db){
    echo "connect : 성공<br>";
}
else{
    echo "disconnect : 실패<br>";
}

#$result = mysqli_query($db, 'SELECT VERSION() as VERSION');
#$data = mysqli_fetch_assoc($result);
#echo $data['VERSION'];
echo "quey test: ";
$sql = "desc member";
$result = mysqli_query($db,$sql);
var_dump($result->num_rows);

//===================== select test
echo "<br><hr>";
echo "select login test <br>";
$value = $_POST['name1'];
$sql = "select * from member where id='$value'";
$result = mysqli_query($db,$sql);
echo "<br>";
if(mysqli_num_rows($result)==1){
	echo "hellow ",$value;
}else{
	echo "your not ADMIN!<br>";
}
echo "<br>";
echo " this member table select result<br>";
$sql = "select * from member";
$result = mysqli_query($db, $sql);
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
   echo "아이디: " . $row["id"]. " 닉네임:".$row["name"]."<br>";
   }
   }else{
   echo "테이블에 데이터가 없습니다.";
   }

//=================== html post get now
echo "<br><hr>";
$value = $_POST["name1"];
echo $value,"<- This One??";
echo "<hr>";
echo "<br>";

// =================== insert test~

$insert_id = $_POST['dbid'];
$insert_name = $_POST['dbname'];
echo "";
echo "";
$sql = "insert into member values ('$insert_id','$insert_name')";
if(mysqli_query($db,$sql)){
	echo "Success Insert!";
}else{
	echo "Faile Insert!";
}

?>
