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
    $insert_pwd = $_POST['password_1'];
    $sql = "insert into member values ('$insert_id','$insert_pwd')";
    if(mysqli_query($db,$sql)){
        echo '<script>';
        echo 'alert("Success register");';
        echo "location.replace('index.php');";
        echo '</script>';}
    }else{
        echo '<script>';
        echo 'alert("Fail.. register");';
        echo "location.replace('index.php');";
        echo '</script>';}
    }
}
else{
    echo '<script>';
    echo 'alert("DB connection Error");';
    echo "location.replace('index.php');";
    echo '</script>';}
}


?>