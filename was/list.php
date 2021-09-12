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

$file_list = ftp_nlist($ftp_connection,"./files");
foreach($file_list as $key=>$dat){
	echo $key." ".$dat."<br>";
}


ftp_close($ftp_connection);
?>
