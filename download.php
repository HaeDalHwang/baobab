<?php
ob_start();
header("Content-type: text/html; charset=utf-8");
// Connect to FTP server
$ftp_server = "10.100.0.40";
$ftpuser = "tkdals";
$ftppasswd = "tkdals";       	

if(!$_GET['type']){
    echo "<script>alert('이상하게 접근하셨습니다;;');";
    echo "history.back();</script>";
}
$filename = $_GET['type'];

// Establish ftp connection
$ftp_connection = ftp_connect($ftp_server, 21)
    or die("Could not connect to $ftp_server");
// FTP login 
$login_result = ftp_login($ftp_connection,$ftpuser,$ftppasswd);


$server_file = $filename;
$local_file = '/tmp/'.$filename;

echo "$server_file<br>$local_file<br>";
if(ftp_get($ftp_connection,$local_file,$server_file,FTP_BINARY)){
	echo "<br>Successfully written to $local_file <br>";
}else{
	echo "<br>Fail!!! Debuging Gogo~~";
}

if( $login_result ) {
    echo "<br>Successfully FTP Login";    
    // Closing  connection
    ftp_close( $ftp_connection );
}

//fopen~~ web browser download
 
if (is_file($local_file)) {
    if (preg_match("MSIE", $_SERVER['HTTP_USER_AGENT'])) { 
        header("Content-type: application/octet-stream"); 
        header("Content-Length: ".filesize("$local_file"));
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Transfer-Encoding: binary"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: public"); 
        header("Expires: 0"); 
    }
    else { 
        header("Content-type: file/unknown"); 
        header("Content-Length: ".filesize("$local_file")); 
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Description: PHP3 Generated Data"); 
        header("Pragma: no-cache"); 
        header("Expires: 0"); 
    }
 
    $fp = fopen($local_file, "rb"); 
    fpassthru($fp);
    fclose($fp);
}
else {
    echo "해당 파일이 없습니다.";
}
?>
