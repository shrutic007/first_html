<?php
    include('db_coonect.php');
    $sql="SELECT * FROM teachers";
    $result=$conn->query($sql);

    if(isset($_GET['action']) && isset($_GET['id'])){   // check  if action and id is there 
        if($_GET['action']=="delete"){      // check action is delete or not
            $del_query="DELETE from teachers where id=".$_GET['id'];    // delete query
            if($conn->query($del_query)){     // fire delete query
                echo "<script>alert('Data Deleted SuccessFully')</script>";   //alerted 
                $sql="SELECT * FROM teachers";   // read from teachers
                $result=$conn->query($sql); // get results 
            }
        }elseif($_GET['action']=="edit"){
            $read_data="SELECT * FROM teachers where id =".$_GET['id'];
            $data=$conn->query($read_data);
            if(isset($data) && $data->num_rows>0){
                $data_row=$data->fetch_assoc();
            }
        }
    }
?>


<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>College Management</title>
  </head>
  <body>
    
    <div class="container p-5">
        <h4>Welcome Admin !!</h4>    
        <div class="row">
            <div class="col-4 p-5 ">
                    <form action="submit.php" method="POST">
                        <?php 
                            if(isset($_SESSION['msg'])){
                                echo "<script>alert(".$_SESSION['msg'].")</script>";
                            }
                        ?>                        
                        <legend>Add new Teacher</legend>
                        <?php  if(isset($_GET['action']) && $_GET['action']=="edit"){?>   
                                <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                                <input type="text" name="action" value="update" hidden>
                        <?php } ?>


                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name here" value="<?php echo $data_row["name"] ?? "";?>" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="someone@gmail.com" value="<?php echo $data_row["email_id"] ?? "";?>">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Mobile Number</label>
                            <input type="number" name="mobile_number" class="form-control" id="exampleFormControlInput1" placeholder="9876543210" value="<?php echo $data_row["mobile_number"] ?? "";?>">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Joining Date</label>
                            <input type="date" name="joiningDate" class="form-control" id="exampleFormControlInput1" placeholder="Joining Date" value="<?php echo $data_row["joining_date"] ??"";?>">
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-success w-50 float-end" id="exampleFormControlInput1" placeholder="Enter your name here">
                        </div>
                        
                    </form>
            </div>
            <div class="col-8 p-1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sr NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Joining Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                if($result && $result->num_rows>0){
                                    while($row=$result->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td> <?php echo 1 ?></td>
                                            <td> <?php echo $row["name"] ?></td>
                                            <td> <?php echo $row["email_id"] ?></td>
                                            <td> <?php echo $row["mobile_number"] ?></td>
                                            <td> <?php echo $row["joining_date"] ?></td>
                                            <td> <?php echo '<a href="index.php?action=delete&id='.$row['id'].'">D</a>
                                                            <a href="index.php?action=edit&id='.$row['id'].'">e</a> '?></td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>