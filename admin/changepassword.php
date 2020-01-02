<?php include "inc/header.php"; ?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <?php 
              if($_SERVER['REQUEST_METHOD']=="POST")
              {
                  $Old = md5($_POST['old']);
                  $new = md5($_POST['new']);

                  $query = "SELECT * FROM tbl_user";
                  $sql   = $db->select($query);
                  while( $result = $sql->fetch_assoc())
                  {
                     if( $Old==$result['password'])
                     {
                        $Changepass = "UPDATE tbl_user set password = '$new' where id='1'";
                        $updatepass=$db->update($Changepass);
                        if($updatepass)
                        {
                             echo "<span style='color :green; font-size=20px'> Password update successfully done.</span>";
                        }
                        else
                        {
                            echo "<span style='color :red; font-size=20px'> Password is not updated successfully done.</span>";
                        }


                     }
                     else

                     {
                        echo "<span style='color :red; font-size=20px'> Password can not be matched . please try again..</span>";
                     }
                  }
              }

                ?>
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password."  name="old" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password." name="new" class="medium" />
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
        <?php include 'inc/footer.php';?>
