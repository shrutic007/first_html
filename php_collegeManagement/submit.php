<?php
    require("dbConnect.php");
    $name=$_POST ['name'];
    $email_id=$_POST ['email_id'];
    $mobileNumber=$_POST ['mobile_number'];
    $joining_date=$_POST ['joining_date'];

    if (empty($name)|| empty($email_id)||empty($mobileNumber)||empty($joining_date)){
            die("Something wrong");
    }

    $sql="INSERT INTO `teachers`( `name`, `mobile_number`, `email_id`, `joining_date`) VALUES ('".$name."','".$mobileNumber."','".$email_id."','".$joining_date."')";

    if($conn->query($sql)){
        echo "successfull !!";
    }else{
        echo $conn->error;
    }
?>