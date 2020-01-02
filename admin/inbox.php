<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php';?>

<?php
if(isset($_GET['delmsg']))
{
	$delmsg=$_GET['delmsg'];
	$query = "DELETE  FROM  tbl_contact
	           where id='$delmsg'";
	 $deletemsg=$db->delete($query);

	 if($deletemsg)
	 {
	 	echo "<span style = 'color:green; font-size:20px'>Message Delete from Seen Box</span>";
	 }
	 else
	 {
	 	echo "Message not Delete From Seen Box";
	 }
}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>



         <?php 
if(isset($_GET['seenid']))
{
	$seenid=$_GET['seenid'];
	$query = "UPDATE tbl_contact
	           SET stutus='1'
	           where id='$seenid'";
	 $updatestutus=$db->update($query);

	 if($updatestutus)
	 {
	 	echo "<span style = 'color:green; font-size:20px'>Message Sent to Seen Box</span>";
	 }
	 else
	 {
	 	echo "Message not Sent to Seen Box";
	 }
}

?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sl No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			
		<?php 
          $i=1;              
        $query = "SELECT * FROM tbl_contact where stutus='0' order by id desc";
        $sql   = $db->select($query);
        if($sql){
        while($result = $sql->fetch_assoc())
        {

		?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['firstname']." ".$result['lastname'];?></td>
							<td><?php echo $result['email'] ;?> </td>
							<td><?php echo $fm->textShorten($result['body']);?></td>
							<td><?php echo $fm->formatDate($result['date']) ;?></td>
							<td><a href="view.php?id=<?php echo $result['id'];?>">View</a> || 
								<a href="reply.php?id=<?php echo $result['id'];?>">Reply</a> ||
							    <a href="?seenid=<?php echo $result['id'];?>">Seen</a>
							</td>
						</tr>
		 <?php $i++; } } ?>
						
					</tbody>
				</table>
               </div>

               <h2>Seen Message </h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sl No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			
		<?php 
          $i=1;              
        $query = "SELECT * FROM tbl_contact where stutus='1' order by id desc";
        $sql   = $db->select($query);
        if($sql){
        while($result = $sql->fetch_assoc())
        {

		?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['firstname']." ".$result['lastname'];?></td>
							<td><?php echo $result['email'] ;?> </td>
							<td><?php echo $fm->textShorten($result['body']);?></td>
							<td><?php echo $fm->formatDate($result['date']) ;?></td>
							<td><a onclick="return confirm('Are u sure to Delete?');" href="?delmsg=<?php echo $result['id'];?>">Delete</a> 
								
							</td>
						</tr>
		 <?php $i++; } } ?>
						
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
<?php include "inc/footer.php"; ?>

 