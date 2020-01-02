<?php include"inc/header.php"; ?>
<?php include"inc/sidebar.php"; ?>


<?php 
if(!isset($_GET['id']) || $_GET['id'] == NULL)
{
   echo "Message is empty";
}
else
{
  $id=$_GET['id'];
}

?>

<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
        echo "<script> window.location='inbox.php'; </script>";
}

?>
  <div class="grid_10">
        
  <div class="box round first grid">
  <h2>View Message</h2>

  <div class="block">  
  <?php 
   $query = "SELECT * FROM tbl_contact where id='$id'";
        $sql   = $db->select($query);
        if($sql){
        while($result = $sql->fetch_assoc())
        {

    ?>             
  <form action="" method="post">
<table class="form">                      
    <tr>
        <td>
            <label>Name </label>
        </td>
        <td>
            <input type="text" name="title" readonly value="<?php echo $result['firstname']." ".$result['lastname']; ?>" class="medium" />
        </td>
    </tr>
        <tr>
        <td>
            <label>Email </label>
        </td>
        <td>
            <input type="text" name="email" readonly value="<?php echo $result['email']; ?>" class="medium" />
        </td>
    </tr>


 <tr>
        <td>
            <label>Date </label>
        </td>
        <td>
            <input type="text" name="date" readonly value="<?php echo  $fm->formatDate($result['date']); ?>" class="medium" />
        </td>
    </tr>


    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea  name="body" >
             <?php echo $result['body']; ?>
            </textarea>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="OK" />
        </td>
    </tr>

     
                    </table>
                    </form>

                    <?php } } ?>
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

     
    
     
    
    