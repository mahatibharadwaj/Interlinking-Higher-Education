<?php
ob_start();
 session_start();
require_once 'dbconnect.php';
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="dbtest"; // Database name
$tbl_name="forum_answer"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
ob_start();
 session_start();
 $question_id=$_GET['question_id'];
 $a_id = $_GET['a_id'];
 $admin = $userRow['flag'];
 

$sql=$res=mysql_query("SELECT * FROM forum_answer WHERE question_id='$question_id'");
$edited_user=mysql_fetch_array($sql);
$edited = $edited_user['studentemail'];
 
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 $current_user = $userRow['userEmail'];
 
if($current_user == $edited || $admin == 1)
{

	$delete=mysql_query("DELETE FROM forum_answer WHERE a_id='$a_id' AND question_id='$question_id'");	
		//$delete = mysql_query("DELETE ")
	echo "Your Answer has been deleted";
	}
else
{
	echo "You cannot delete this Answer because you have not written the answer.";	
}
?>
<!DOCTYPE html>
<html>
<a href="main_forum.php">Go back to Forum...</a>
</html>
