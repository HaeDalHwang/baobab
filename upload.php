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


// FTP Upload 
$filename = $_FILES['userfile']['name'];
$localfile = $_FILES['userfile']['tmp_name'];

$uploaddir = '.';
$serverfile = $uploaddir . $filename;
if(ftp_put($ftp_connection,$serverfile,$localfile,FTP_BINARY)){
	echo '<script>';
    echo 'alert("Success File Upload!");';
    echo "location.replace('list.php');";
    echo '</script>';
}else{
	echo '<script>';
    echo 'alert("Fail! FTP Error");';
    echo "location.replace('index.php');";
    echo '</script>';}

?>