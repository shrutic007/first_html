<?php
  include("dbConnect.php");
  $sql="SELECT * from teachers";
  $result=$conn->query($sql);

  if(isset($_GET['action']) && isset($_GET['id'])){
    if($_GET['action']=="delete"){
    $del_query="DELETE from teachers where id=".$_GET['id'];
        if($conn->query($del_query)){
        echo "<script>alert('Data Deleted successfully')</script>";
        $sql="SELECT * from teachers";
        $result=$conn->query($sql);
        }
    }elseif($_GET['action']=="edit"){
        $read_data="SELECT * from teachers where id =".$_GET['id'];
        $data=$conn->query($read_data);
        if(isset($data) && $data->num_rows>0){
            $data_row=$data->fetch_assoc();
        }
    }
    
    // echo "<script>alert('Data ".$_GET['id']."is".$_GET['action']."')</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>College Management</title>
</head>
<body>
    <h3>WelCome Admin</h3>
    <div class="container-fluid p-3 ">
        <div class="row">
            <div class="col-4 p-1">
            <form action="submit.php" method="POST">
               <legend>Add new Teacher</legend>

                        <?php  if(isset($_GET['action']) && $_GET['action']=="edit"){?>   
                                <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                                <input type="text" name="action" value="update" hidden>
                        <?php } ?>

               <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name" value="<?php echo $data_row["name"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email_id" class="form-control" id="exampleFormControlInput1" placeholder="someone@example.com" value="<?php echo $data_row["email_id"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">Mobile number</label>
                  <input type="number" name="mobile_number" class="form-control" id="exampleFormControlInput1" placeholder="xxxxxxxxxx" value="<?php echo $data_row["mobile_number"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">Joining Date</label>
                  <input type="date" name="joining_date" class="form-control" id="exampleFormControlInput1" placeholder="mm/dd/yyyy" value="<?php echo $data_row["joining_date"] ?? "";?>">
               </div>
               <div class="mb-3">
                  <input type="Submit" class="btn btn-success float-end w-25" id="exampleFormControlInput1" placeholder="name@example.com" >
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
                            <th>joining Date</th>
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
                            <td> <?php echo $row['joining_date'] ?> </td>
                            <td> <?php echo'<a href="index.php?action=delete&id='.$row['id'].'">Delete</a>
                                            <a href="index.php?action=edit&id='.$row['id'].'">Edit</a> '?></td>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>
</html>