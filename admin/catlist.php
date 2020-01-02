<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$i=0;
						$query = "SELECT * FROM tbl_catagory";
						$cat=$db->select($query);
					   
						while($result=$cat->fetch_assoc())
						{
							
							$i++;

						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="edit.php?editid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are u sure to Delete?');" href="delete.php?delid=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>
						<?php  }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>

<?php include 'inc/footer.php';?>
 