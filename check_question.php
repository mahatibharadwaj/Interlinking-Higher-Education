<?php
ob_start();
 session_start();
require_once 'dbconnect.php';
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="dbtest"; // Database name
$tbl_name="forum_question"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
ob_start();
 session_start();
 $id=$_GET['id'];
 

$sql=mysql_query("SELECT * FROM forum_question WHERE id='$id'");
$edited_user=mysql_fetch_array($sql);
$edited = $edited_user['studentemail'];
 
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 $current_user = $userRow['userEmail'];
 $admin = $userRow['flag'];
 
if($current_user == $edited || $admin == 1)
{

	$delete=mysql_query("DELETE FROM forum_question WHERE id='$id'");	
	$delete1=mysql_query("DELETE FROM forum_answer WHERE question_id='$id'");	
	echo "Your Question has been deleted";
	}
else
{
	echo "You cannot delete this Question because you have not written the question.";	
}
?>
<!DOCTYPE html>
<html>
<a href="main_forum.php">Go back to Forum...</a>
</html>
