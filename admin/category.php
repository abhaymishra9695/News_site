<?php include "header.php"; 
include "config.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(!isset($_SESSION['user_id'])){

    header("Location:{$hostname}/admin/index.php");
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
             
               
               <table class="content-table">
                <thead>
                                  <th>S.No.</th>
                                  <th>Category Name</th>
                                  <th>No. of Posts</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </thead>
                              <tbody>
                            <?php 
                          
                            $sql="SELECT * FROM category";
                            $result=mysqli_query($conn,$sql);

                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    // echo $row['post'];
                              
                           
                            ?>
                         <tr>
                            <td class='id'><?php echo $row['category_id']?></td>
                            <td><?php echo $row['category_name']?></td>
                            <td><?php echo $row['post']?></td>
                            <td class='edit'><a href='update-category.php?id={$row['category_id']}' ><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?id={$row['category_id']}'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                                <?php }
                              
                                }else{
                                    echo '<h3>No Results Found.</h3>';
                                }
                                
                                ?>
                  
                  </tbody></table>
                  
                  
              
                <?php
                $limit=3;
                $sql1="SELECT*FROM category";
                $result1= mysqli_query($conn,$sql1);
                $total_record=mysqli_num_rows($result1);
                $page=ceil($total_record/$limit);
              

             
              echo '<ul class="pagination admin-pagination">';

                  
                    //   echo '<li><a href="category.php?page=".'1'.>Prev</a></li>';
                
            //            echo '<li><a href="category.php?page=".'$i'. class='{$cls}'>1</a></li>';
                   
                  

                 
            //         echo '<li> <a href="category.php?page=".'($page+1)'.>Next</a></li>';
                  
             echo '</ul>';
             ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
