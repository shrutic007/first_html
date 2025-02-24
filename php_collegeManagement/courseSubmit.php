<?php
    require("dbConnect.php");
    $name=$_POST ['name'];
    $category=$_POST ['category'];

    if (empty($name)|| empty($category)){
            die("Something wrong");
    }

    $sql="INSERT INTO `course`(`name`, `category`) VALUES ('".$name."','".$category."')";

    if($conn->query($sql)){
        echo "successfull !!";
    }else{
        echo $conn->error;
    }
?>