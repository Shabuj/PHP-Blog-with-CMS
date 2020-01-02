<?php include 'inc/header.php';?>


<?php 
if(!isset($_GET['pageid']) || $_GET['pageid']==NULL)
{
	echo "This page is not available for Showing";
}
else
{
	$id=$_GET['pageid'];
}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

			<?php
              $query ="SELECT * FROM tbl_pages where id='$id'";
              $pagequery=$db->select($query);
              if($pagequery)
              {
                 while( $result=$pagequery->fetch_assoc()){
				?>
				<h2><?php echo $result['name'];?></h2>
	
	         <p> <?php echo $result['body'];?> </p>
	         <?php } } ?>
				
	</div>

</div>
		
		<?php  include "inc/sidebar.php"; ?>
         <?php  include "inc/footer.php"; ?>