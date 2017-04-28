<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
  if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<a href="addstudent.php">Add stuents here</a>
<a href="main_forum.php"> Forum</a>
</body>
</html>
<?php ob_end_flush(); ?>
