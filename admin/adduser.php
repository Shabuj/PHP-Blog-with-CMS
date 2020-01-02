<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?>

<div class="grid_10">

    <div class="box round first grid">
      <h2>Add New User</h2>
       <div class="block copyblock"> 

  <?php 
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
         $name      = $_POST['username'];  
         $password  = md5($_POST['password']); 
         $user_Role = $_POST['role']; 
         if (empty($name) || empty($password) || empty($user_Role) ) {
           echo "<span style='color:red;'>Enter user information then click the Save Button!!</span>";
         }
         else{
            $sql = "INSERT INTO tbl_user(username,password,role) VALUES('$name','$password','$user_Role')";
             $user_insert = $db->insert($sql);
             if ($user_insert) {
             echo "<span style='color:green;'>User Inserted Successfully!!</span>";
             }else{
                echo "<span style='color:red;'>User Not Inserted!!</span>";
             }
         }

   }
  ?>
     <form action="" method="POST">
            <table class="form">                    
           
         <tr>
            <td>
               <label>Add new username</label>
           </td>
        <td>
             <input type="text" name="username" placeholder="Enter username." class="medium" />
        </td>
       </tr>

        <tr>
            <td>
               <label>Add User password</label>
           </td>
        <td>
             <input type="password" name="password" placeholder="Enter password." class="medium" />
        </td>
       </tr>

       <tr>
            <td>
               <label>Add user role</label>
           </td>
        <td>
             <select id="select" name="role">
                 <option > Select User Role</option>
                 <option value="0"> Admin</option>
                 <option value="1"> Author</option>
                 <option value="2"> Moderator</option>
             </select>
             
        </td>
       </tr>
                <tr> 
                  <td> </td>
                    <td>
    
                        <input type="submit" name="submit" Value="Create" />
                    </td>
                </tr>
            </table>
      </form>

        </div>
    </div>
</div>
<?php include"inc/footer.php"; ?>