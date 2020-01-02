	<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php 
						$query="SELECT * FROM  tbl_catagory "; 
						$Category=$db->select($query);
						if($Category){
						while($result=$Category->fetch_assoc()){

						 ?>

						<li><a href="posts.php?Category=<?php echo $result['id']?>"><?php echo $result['name']?></a></li>
							
							<?php } } else{?>
							<li>No Catagory available..!! </li>	
							<?php } ?>	
					</ul>
			</div>
			
			<div class="samesidebar clear">
             	<h2>Latest articles</h2>
				<?php 
               $query="SELECT * FROM tbl_post ORDER BY id DESC limit 3 ";
               $post=$db->SELECT($query);
               if($post)
               {

               	while ($result=$post->fetch_assoc()) {

				?>
				
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result['id']?>"><?php echo $result['title'] ;?></a></h3>
						<a href="post.php?id=<?php echo $result['id'];  ?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
						<p><?php echo $fm->textShorten($result['body'],120);?></p>	
					</div>
					
					
	       <?php } } else { header("Location:404.php");}?>
			</div>
			
		</div>
	