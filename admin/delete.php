<?php include "inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?>

 <div class="grid_10">		
            <div class="box round first grid">
                
                <div class="block">  
                <?php 
if(isset($_GET['delid']))
{
	$id=$_GET['delid'];
	$query="DELETE FROM tbl_catagory WHERE id='$id'";
	$del=$db->delete($query);
	if($del)
	{
		echo "<span style='color:green; font-size:30px'>Delete Catagory Successfully Done.</span>";
	}
	else
	{
		 echo "<span style='color:green; font-size:30px'>Delete Catagory Not Successfully Done.</span>";
	}
}
?>             
                        
                </div>
            
        </div>


<?php include"inc/footer.php"; ?>