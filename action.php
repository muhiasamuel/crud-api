<?php
require_once ('connection.php');

if(isset($_POST['action'])){
    if($_POST["action"] == "insert"){
        $query = "INSERT INTO tbl_student(first_name,last_name) 
        VALUES('".$_POST["first_name"]."','".$_POST["last_name"]."')";
        $statement = $connect->prepare($query);
        $statement->execute();

        echo'<p>Data Inserted</p>';
    }else{
        echo"data could not be inserted";
    }
}

?>