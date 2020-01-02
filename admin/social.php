<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php';?>



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block"> 
                <?php 

if($_SERVER['REQUEST_METHOD']=="POST")
{

    if($_POST['facebook']=="" || $_POST['twitter']=="" || $_POST['linkedin']=="" || $_POST['googleplus']=="")
    {
       echo "<span style='color:red; font-size:30px'>Field must not be empty.</span>";
    }
    else
    {
        
        $fb=$_POST['facebook'];
        $tw=$_POST['twitter'];
        $ld=$_POST['linkedin'];
        $gp=$_POST['googleplus'];
        $query="UPDATE tbl_social set fb='$fb',tw='$tw',ld='$ld',gp='$gp' WHERE id=1;";
        $update_row=$db->update($query);
        if($update_row){
        echo "<span style='color:green; font-size:30px'>Update Successfully done.</span>";}

    }
}



?>              
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" placeholder="Facebook link.." class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" placeholder="Twitter link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" placeholder="LinkedIn link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" placeholder="Google Plus link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include "inc/footer.php"; ?>