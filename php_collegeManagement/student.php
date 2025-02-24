<?php
  include("dbConnect.php");
  $sql="SELECT * from students";
  $result=$conn->query($sql);

  if(isset($_GET['action']) && isset($_GET['id'])){
   if($_GET['action']=="delete"){
    $del_query="DELETE from students where id=".$_GET['id'];
       if($conn->query($del_query)){
          echo "<script>alert('Data deleted !!!')</script>";
          $sql="SELECT * FROM students";
          $result=$conn->query($sql);
       }
   }elseif($_GET['action']=="edit"){
      $read_data="SELECT * FROM students where id=".$_GET['id'];
      $data=$conn->query($read_data);
      if(isset($data) && $data->num_rows>0){
        $data_row=$data->fetch_assoc();
      }  
   }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h4>Student registration</h4>
   <div class="container-fluid p-3">
    <div class="row">
        <div class="col-4 p-1">
            <form action="submit2.php" method="POST">
               <legend>Add new Teacher</legend>

                    <?php
                      if(isset($_GET['action']) && $_GET['action']=="edit"){?>
                      <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                      <input type="text" name="action" value="update" hidden>
                     <?php }?>

               <div class="mb-3">
                  <label for="name" class="form-label">Enter your Name</label>
                  <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter your fullname" value="<?php echo $data_row["name"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="someone@example.com" value="<?php echo $data_row["email_id"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">Mobile number</label>
                  <input type="number" name="mobile_number" class="form-control" id="exampleFormControlInput1" placeholder="xxxxxxxxxx" value="<?php echo $data_row["mobile_number"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">Course</label>
                  <input type="Name" name="course" class="form-control" id="exampleFormControlInput1" placeholder="Course" value="<?php echo $data_row["course"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">Registration Date</label>
                  <input type="date" name="registration_date" class="form-control" id="exampleFormControlInput1" placeholder="mm/dd/yyyy" value="<?php echo $data_row["registration_date"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <input type="Submit" class="btn btn-info text-light float-end w-25" id="exampleFormControlInput1">
               </div>
            </form>
        </div>
        <div class="col-8 p-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile number</th>
                            <th>Course name</th>
                            <th>Registration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                      
                    <tbody>
                        <?php
                           if($result && $result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                        ?>

                        <tr>
                            <td> <?php echo 1 ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo $row['email_id'] ?> </td>
                            <td> <?php echo $row['mobile_number'] ?> </td>
                            <td> <?php echo $row['course'] ?> </td>
                            <td> <?php echo $row['registration_date'] ?> </td>
                            <td> <?php echo '<a href="student.php?action=delete&id='.$row['id'].'">DELETE</a> 
                                <a href="student.php?action=edit&id='.$row['id'].'">EDIT</a>'?></td>
                        </tr>

                        <?php        
                            }
                           }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   </div> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>
</html>