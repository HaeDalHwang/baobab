<?php
// Mariadb Connect TEST
$host = "211.183.3.100";
$id = "root";
$passwd = "test123";
$dbname = "test";
// DBconnection
$db = new mysqli($host, $id, $passwd, $dbname);

if($db){
    $insert_id = $_POST['name'];
    $insert_pwd = $_POST['password1'];
    $insert_email = $POST['email'];
    $hash = password_hash($insert_pwd, PASSWORD_DEFAULT);
    $sql = "insert into member values ('$insert_id','$hash','$insert_email')";
    if(mysqli_query($db,$sql)){
        echo '<script>';
        echo 'alert("Success register");';
        echo "location.replace('index.html');";
        echo '</script>';
    }else{
        echo '<script>';
        echo 'alert("Fail.. register");';
        echo "location.replace('index.html');";
        echo '</script>';
    }
}else{
    echo '<script>';
    echo 'alert("DB connection Error");';
    echo "location.replace('index.html');";
    echo '</script>';
}


?>