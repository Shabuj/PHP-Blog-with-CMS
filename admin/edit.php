<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?>



<div class="grid_10">

    <div class="box round first grid">
      <h2>Update Category</h2>
       <div class="block copyblock"> 
<?php 
  if (!isset($_GET["editid"]) || $_GET["editid"] == NULL ){
    echo "Catagory Is NULL";
}else{
  $id = $_GET["editid"];
}
?>
  <?php 
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
         $name = $_POST['name'];  
         $name = mysqli_real_escape_string($db->link,$name);
         if (empty($name)) {
           echo "<span style='color:red;'>Enter Category Name!!</span>";
         }
         else{
            $sql = "UPDATE  tbl_catagory
                    SET name = '$name'
                    WHERE id = '$id'";
             $category_updated = $db->update($sql);
             if ($category_updated) {
             echo "<span style='color:green;'>Category Updated Successfully!!</span>";
             }else{
                echo "<span style='color:red;'>Category Not Updated!!</span>";
             }
         }
   }
  ?>

<?php    
    $query = "SELECT * FROM tbl_catagory WHERE id = '$id' /*ORDER BY id DESC*/";
    $category = $db->select($query);
    while ( $result = $category->fetch_assoc()){   
  ?>
 <form action="" method="post">
    <table class="form">          
        <tr>
            <td>
                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
            </td>
        </tr>
        <tr> 
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
         </tr>
      </table>
 </form>
 <?php }  ?>
        </div>
    </div>
</div>

<?php include"inc/footer.php"; ?>
