<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?>


<?php 
if(isset($_GET['delpageId']) )
{
  $delid=$_GET['delpageId'];
  $query="DELETE FROM tbl_pages where id = '$delid'";
  $del=$db->delete($query);
  if($del)
  {
    echo "<script> alert('Page Deleted Successfully!!!'); </script>";
    echo "<script> window.location='index.php'; </script>";
    
  }
  else
  {
     echo "<span style='color:red;'> Deleted  Page is not Successfully done!</span>";
  }
}

?>
<?php 
if(!isset($_GET['pageId']) || $_GET['pageId'] == "")
{
	echo "<span style='color:red;'> No Page Available !!</span>";
}
else
{
	$id=$_GET['pageId'];
}

?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Page</h2>
   <style type="text/css">
  .actiondel{margin-left: 10px;}
  .actiondel a{
   border:1px solid #ddd;
   color: #444;
   cursor: pointer;
   font-size: 20px;
   padding: 4px 10px;
   font-weight: normal;
   background:gray;
  }
  </style>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
      
      $name  = mysqli_real_escape_string($db->link,$_POST['name']);
      $body   = mysqli_real_escape_string($db->link,$_POST['body']);
     
       
        if ($name == "" || $body == "" ){
        echo "<span style='color:red;'> Field Must Not Be Empty!!</span>";
        }

   else{
     
     $query = "UPDATE tbl_pages 
              SET name='$name',
                  body='$body'
                  where id = '$id'";
     $updated_rows = $db->update($query);
        if ($updated_rows) {
         echo "<span style='color:green; font-size:25px;'>Updated Page Successfully!!!.</span>";
        
        }
        else {
         echo "<span style='color:red; font-size:25px;'>Not Update Page Successfully done!!!</span>";
        }
      }

   }
?>
     <div class="block">               
  <form action="" method="post">
  	<?php
     $query = "SELECT * FROM tbl_pages where id ='$id'";
     $updatequery = $db->select($query);
     if($updatequery)
     {
     	while($result = $updatequery->fetch_assoc())
     	{

  	?>
<table class="form">                      
    <tr>
        <td>
            <label>Name </label>
        </td>
        <td>
            <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
        </td>
    </tr>
 
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="body">
            	value="<?php echo $result['body']; ?>" 
            </textarea>
        </td>
    </tr>

	<tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Update" />
            <span class="actiondel"><a href="?delpageId=<?php echo $result['id']; ?>" onclick ="return confirm('Are you sure to Delete Page?')">Delete</a></span>
        </td>
    </tr>

                    </table>
                    <?php } } ?>
                    </form>
                </div>
            </div>
        </div>
     
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
     <?php include"inc/footer.php"; ?>

     
    
     
    
    