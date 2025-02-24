<?php
  include("dbConnect.php");
  $sql="SELECT * from course";
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
      $read_data="SELECT * FROM course where id=".$_GET['id'];
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
    <title>Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h4>Course Details</h4>
   <div class="container-fluid p-3">
    <div class="row">
        <div class="col-4 p-1">
            <form action="courseSubmit.php" method="POST">
               <legend>Add new Teacher</legend>

                    <?php
                      if(isset($_GET['action']) && $_GET['action']=="edit"){?>
                      <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                      <input type="text" name="action" value="update" hidden>
                     <?php }?>

               <div class="mb-3">
                  <label for="name" class="form-label">Enter Name of Course</label>
                  <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter course name" value="<?php echo $data_row["name"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">Select Category</label>
                  <input type="text" name="category" class="form-control" id="exampleFormControlInput1" placeholder="Enter category" value="<?php echo $data_row["category"] ?? "";?>">
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
                            <th>Name of Course</th>
                            <th>Category</th>
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
                            <td> <?php echo $row['category'] ?> </td>
                            <td> <?php echo '<a href="course.php?action=delete&id='.$row['id'].'">DELETE</a> 
                                <a href="course.php?action=edit&id='.$row['id'].'">EDIT</a>'?></td>
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