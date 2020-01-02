<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 

                    <?php 
                    if($_SERVER['REQUEST_METHOD']=="POST")
                    {
                        $Copyright=$_POST['copyright'];
                        $query="UPDATE tbl_copyright SET copyright='$Copyright' where id=1";
                        $update_row=$db->update($query);
                        if($update_row)
                        {
                            echo "<span style='color:green; font-size:25px'>Update Successfully done.</span>";}
                        }
                

                    ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Copyright Text." name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
       
<?php include 'inc/footer.php'?>
