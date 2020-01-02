<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?>
<?php
  $userid = Session::get('userId');
  $role = Session::get('userRole');

?>



        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Update User</h2>

        <?php
      if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $username  = mysqli_real_escape_string($db->link,$_POST['username']);
        $email    = mysqli_real_escape_string($db->link,$_POST['email']);
        $details   = mysqli_real_escape_string($db->link,$_POST['details']);
       
        
        $query = "UPDATE tbl_user
                  SET 
                  username='$username',
                  email='$email',
                  details='$details',
                  WHERE id='$userid'";
                 


         $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span style='color:green; font-size:25px;'>User Updated Successfully!!!.</span>";
            
        }
        else {
         echo "<span style='color:red; font-size:25px;'>User Not Updated !!!</span>";
        }
      
  }
 
 
   
?>


     <div class="block">
     <?php 
     $query = "SELECT * FROM tbl_user where id='$userid'";
     $getuser = $db->select($query);
        
        while($result = $getuser->fetch_assoc())
        {


     ?>               
  <form action="" method="POST" >
<table class="form">                      
    <tr>
        <td>
            <label>Username</label>
        </td>
        <td>
            <input type="text" name="username" value="<?php echo $result['username']; ?>"  class="medium" />
        </td>
    </tr>
 
    <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input type="text" name="email" value="<?php echo $result['email']; ?>"  class="medium" />
        </td>
    </tr>
 
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Details</label>
        </td>
        <td>
            <textarea class="tinymce" name="details">
             <?php echo $result['details']; ?> 

            </textarea>
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

                    <?php } ?>
                </div>
            </div>
        </div>
     
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
     <?php include"inc/footer.php"; ?>

     
    
     
    
    