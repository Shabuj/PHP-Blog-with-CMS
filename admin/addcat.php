﻿<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?>

<div class="grid_10">

    <div class="box round first grid">
      <h2>Add New Category</h2>
       <div class="block copyblock"> 

  <?php 
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
         $name = $_POST['name'];  
         $name = mysqli_real_escape_string($db->link,$name);
         if (empty($name)) {
           echo "<span style='color:red;'>Enter Category Name then click the Save Button!!</span>";
         }
         else{
            $sql = "INSERT INTO tbl_catagory(name) VALUES('$name')";
            $category_insert = $db->insert($sql);
             if ($category_insert) {
             echo "<span style='color:green;'>Category Inserted Successfully!!</span>";
             }else{
                echo "<span style='color:red;'>Category Not Inserted!!</span>";
             }
         }

   }
  ?>
     <form action="" method="POST">
            <table class="form">                    
                <tr>
                    <td>
                        <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                    </td>
                </tr>
                <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
      </form>

        </div>
    </div>
</div>
<?php include"inc/footer.php"; ?>