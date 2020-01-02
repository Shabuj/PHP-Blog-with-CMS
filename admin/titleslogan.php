<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <?php
                if($_SERVER['REQUEST_METHOD']=="POST")
                {
                    $title=$_POST['title'];
                    $slogan=$_POST['slogan'];
                    $query="UPDATE tbl_title SET title='$title', slogan = '$slogan' WHERE id=1";
                    $Update_title=$db->update($query);
                    if($Update_title)
                    {
                        echo "Updated Successfully..!!";
                    }
                    else
                    {
                        echo "Not Updated Successfully ,Try Again..";
                    }

                }


                ?>

                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">               
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Title..."  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
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