<?php include "../lib/Session.php"; 
 //Session::checkSession();
?>

<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php include "../helpers/Format.php"; ?>
<?php
$db = new Database();
?>
<?php 
  if (!isset($_GET["deletepostId"]) || $_GET["deletepostId"] == NULL ){
    echo "Catagory Is NULL";
}else{
  $id = $_GET["deletepostId"];

  $sql = "SELECT * FROM tbl_post WHERE id='$id'";
  $delpost= $db->select($sql);
  if ($delpost){
     while ( $delimg = $delpost->fetch_assoc()){
     	$del_link = $delimg['image'];
     	unlink($del_link);
     }
  }
  $del_query = "DELETE FROM tbl_post WHERE id='$id'";
  $deldata = $db->delete($del_query);
  if ($deldata) {
  	echo "<script> alert('Post Deleted Successfully!!!'); </script>";
  	echo "<script> window.location='postlist.php'; </script>";
  }
  else{
    	
      echo "<script> alert('Post Not Deleted Successfully!!!'); </script>";
    	echo "<script> window.location='postlist.php'; </script>";
    }
}
?>