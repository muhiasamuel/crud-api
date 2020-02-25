<?php
require_once ('connection.php');

if (isset($_POST["first_name"])&&isset($_POST["last_name"])){
    $stmt=$connect->prepare("INSERT INTO tbl_student(first_name,last_name)VALUES(?,?)");
    $stmt->bind_param("ss",$_POST["first_name"],$_POST["last_name"]);
    if (!$stmt->execute()){
        echo"data could not be inserted";
    }else{
        echo'<p>Data Inserted</p>';
    }

}

?>