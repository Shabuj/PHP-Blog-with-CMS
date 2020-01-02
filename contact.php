<?php include 'inc/header.php';?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
		<?php 
        if($_SERVER['REQUEST_METHOD']=="POST")
        {

        	$firstname =  $fm->Validation($_POST['firstname']);
        	$lastname  =  $fm->Validation($_POST['lastname']);
        	$email     =  $fm->Validation($_POST['email']);
        	$body      =  $fm->Validation($_POST['body']);

        	$firstname =  mysqli_real_escape_string($db->link,$firstname);
        	$lastname  =  mysqli_real_escape_string($db->link,$lastname);
        	$email     =  mysqli_real_escape_string($db->link,$email);
        	$body      =  mysqli_real_escape_string($db->link,$body);

        	if($firstname=="" && $lastname=="" && $email=="" && $body=="" && (!filter_var($email,FILTER_VALIDATE_EMAIL)))
        	{
        		echo "Enter Field First OR VALID email";
        	}
        	else
        	{
        		$query="INSERT INTO tbl_contact(firstname,lastname,email,body) VALUES('$firstname','$lastname','$email','$body')";
        		$inserted_rows = $db->insert($query);
        		if($inserted_rows)
        		{
        			echo "<span style='color:green; font-size:25px;'>Message Sent Successfully!!!.</span>";  
        		}
        		else
        		{
        			echo $msg ="<span style='color:red; font-size:25px;'>Message Not Sent!!!</span>";
        		}
        	}

        }

		?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" required="1"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		<?php  include "inc/sidebar.php"; ?>
         <?php  include "inc/footer.php"; ?>