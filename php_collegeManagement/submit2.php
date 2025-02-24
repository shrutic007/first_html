<?php 
   require("dbConnect.php");
   $name=$_POST ['name'];
   $email=$_POST ['email'];
   $mobile_number=$_POST ['mobile_number'];
   $courseName=$_POST ['course'];
   $registrationDate=$_POST['registration_date'];

   if(empty($name)||empty($email)||empty($mobile_number)||empty($courseName)||empty($registrationDate)){
     die("Something went wrong");
   }
   
   $sql= " INSERT INTO `students`(`name`,  `email_id`, `mobile_number`, `course`, `registration_date`) VALUES ('".$name."','".$email."','".$mobile_number."','".$courseName."','".$registrationDate."')";

   if($conn->query($sql)){
     echo "registration successfull !!";
   }else{
     echo $conn->error;
   }
?>