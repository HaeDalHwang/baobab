<?php
ob_start();
header("Content-type: text/html; charset=utf-8");
// Connect to FTP server
$ftp_server = "192.168.0.100";
$ftpuser = "user1";
$ftppasswd = "user1";       	

// Establish ftp connection
$ftp_connection = ftp_connect($ftp_server, 21)
    or die("Could not connect to $ftp_server");
// FTP login 
$login_result = ftp_login($ftp_connection,$ftpuser,$ftppasswd);
ftp_pasv($ftp_connection, true) or die("Cannot switch to passive mode");

// FTP Upload 
$filename = $_FILES['userfile']['name'];
$localfile = $_FILES['userfile']['tmp_name'];

$uploaddir = '';
$serverfile = $uploaddir . $filename;
if(ftp_put($ftp_connection,$serverfile,$localfile,FTP_BINARY)){
	echo '<script>';
    echo 'alert("Success File Upload!");';
    echo "location.replace('list.php');";
    echo '</script>';
}else{
	echo '<script>';
    echo 'alert("Fail! FTP Error");';
    echo "location.replace('list.php');";
    echo '</script>';}

?>