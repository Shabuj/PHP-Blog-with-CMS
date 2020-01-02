<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
    
 <?php
 $category = mysqli_real_escape_string($db->link,$_GET['category']);
 // zodi mysqli use kori tahole obossoi mysqli_real_escape_string() diye validation korte hobe. it's good practice
 if (!isset($category) || $category == NULL ){
 	header("location:404.php");
 }
 else{
 	$categoryId = $category;
 }
 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
   
  <?php
	$query = "select * from tbl_post where cat=$categoryId";
	$cat_post = $db->select($query);
	if ($cat_post){
		while ($result = $cat_post->fetch_assoc()) {							
	?>

  <div class="samepost clear">
	<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
		<h4><?php echo $fm->formatDate($result['date']); ?> 
		<a href="#"><?php echo $result['author']; ?></a></h4>
		 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
		<?php echo $fm->textShorten($result['body']); ?>
		<div class="readmore clear">
			<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
		</div>
	</div>   
	<?php }  } else{ ?>
	<h1> No Post Available in This Category Right Now.<h1>
   <?php } ?>   
</div>
<?php include "inc/sidebar.php"; ?>	
<?php include "inc/footer.php"; ?>