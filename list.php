<!DOCTYPE html>
<html>
<head>
	<title>File List</title>
	
	<!-- MY funtion -->
	<script>
	function filedownload(filename){
		window.location.href = 'download.php?type='+filename;
	}
	</script>

   <!--bootstrap 영역-->
	<script src="my/jquery.js">
	</script>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="bootstrap/js/bootstrap.min.js"></script>

    <!--Fontawesome-->
	<link rel="stylesheet" href="fontawesome/css/all.css">
	
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="./my/styles.css">

	<!-- register.html만 적용할것-->
	<style type="text/css">
		html,body{
		background-image:url('images/baobab3.jpg');
		background-size: cover;
		background-repeat: no-repeat;
		height: 100%;
		font-family: 'Numans', sans-serif;
		}
		.card{
			height: 650px;
			width: 800px;
		}
	</style>

</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>File List</h3>
			</div>		
			<div class="card-body">

			<!-- list start & php -->		
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
			?>
			
			<table class="table card-header">
				<thead style="color:white;">
				<tr>
					<th><h4>No.</h4></th>
					<th><h4>Files</h4></th>
				</tr>
				</thead>
				<tbody style="color:white;">
			<?php
			foreach($file_list as $key=>$dat){
				echo "<tr><td>".$key."</td><td><a id=myLink href=# onclick=filedownload("$dat");>".$dat."</a></td></tr>";
				}
			?>
				</tbody>
			</table>	

			<?php
			ftp_close($ftp_connection);
			?>
			<!-- list stop -->

			<!-- Form Start -->
			<div class="form-group">
				<form enctype="multipart/form-data" action="upload.php" method="post">
					<input type="hidden"name="MAX_FILE_SIZE"value="300000"/>
						<input class="float-left" type="file" name="userfile" id="file">						
					
						<input type="submit" value="Upload" class="btn float-left login_btn">
				</form>
			</div>
			<!-- form END -->
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					another account?<a href="index.html">Home</a>
				</div>	
			</div>
		</div>
	</div>
</div>
</body>
</html>
