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
       $to = $_POST['toEmail'];
       $from = $_POST['from'];
       $subject = $_POST['subject'];
       $message = $_POST['message'];

       $sendemail=mail($to, $subject, $message,$from);
       if ($sendemail) {
           echo "<span style='color:green; font-size:25px;'> Message sent Successfully done!!!</span>";
       }
       else
       {
           echo "<span style='color:red; font-size:25px;'> Message  not sent Successfully done!!!</span>";
       }


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
            <label>To </label>
        </td>
        <td>
            <input type="text" name="toEmail" readonly value="<?php echo $result['email']; ?>" class="medium" />
        </td>
    </tr>


 <tr>
        <td>
            <label>From</label>
        </td>
        <td>
            <input type="text" name="from" placeholder="Enter your email.." class="medium" />
        </td>
    </tr>

<tr>
        <td>
            <label>Subject</label>
        </td>
        <td>
            <input type="text" name="subject" placeholder="Enter your Subject.." class="medium" />
        </td>
    </tr>


    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea  name="message"  >
             
            </textarea>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Send" />
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

     
    
     
    
    