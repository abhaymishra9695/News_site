<?php include "header.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_POST['submit'])){
    include "config.php";
  $user_id=mysqli_real_escape_string($conn,$_POST['user_id']);
  $fname=mysqli_real_escape_string($conn,$_POST['fname']);
  $lname=mysqli_real_escape_string($conn,$_POST['lname']);
  $user=mysqli_real_escape_string($conn,$_POST['user']);
  $role=mysqli_real_escape_string($conn,$_POST['role']);
  $SQL1= "UPDATE user SET first_name='{$fname}', last_name='{$lname}', username='{$user}', role='{$role}' where user_id ='{$user_id}'";
  

  $result1=mySQLi_query($conn,$SQL1);

  
   
 
    if(mysqli_query($conn, $SQL1)){
      header("Location:{$hostname}/admin/users.php");
    }
    
  }

   


?>



  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
              <?php 
                include "config.php";
                $user_id=$_GET['id'];
                $sql="SELECT *FROM user where user_id={$user_id}";
               $result=mysqli_query($conn,$sql);
               if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){

               
              

                ?>
           
               
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id" class="form-control" value=" <?php echo $row['user_id']?>">
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']?>" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name']?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" value="<?php echo $row['username'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role'];?>">
                            <?php
                             if($row['role']==1){
                              echo "<option value='0'>normal User</option>
                              <option value='1' selected>Admin</option>";
                             }else{
                              echo "<option value='0' selected>normal User</option>
                              <option value='1' >Admin</option>";
                             }
                            ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php 
                }
               } ?>
                  <!-- /Form -->
                  
            
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
