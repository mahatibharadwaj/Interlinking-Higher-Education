
<?php
ob_start();
session_start();

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mahati"; // Mysql password
$db_name="dbtest"; // Database name
$tbl_name="coursecontent"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


//$result="SELECT * FROM `coursecontent` WHERE scope='$scope' AND type='$type'";
$result=mysql_query("SELECT * FROM `coursecontent` WHERE type='event'");
// OREDER BY id DESC is order result by descending

//$res=mysql_query($result);


?>
<head> <link rel="stylesheet" href="https://www.w3schools.com/html/styles.css"> 

<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>Name of the topic</strong></td>
<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Description</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Content</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Likes</strong></td>
</tr>

<div><a href="home.php">Back</a></div>


<?php
// Start looping table row
while($rows=mysql_fetch_array($result)){
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['name']; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['description']; ?></td>
<td align="center" bgcolor="#FFFFFF"><a href="view">Download</a><?php echo $rows['content']; ?></td>
<td align="center" bgcolor="#FFFFFF"><a href="likes.php">Upvote</a></td>
</tr>
<?php
// Exit looping and close connection
}
mysql_close();
?>
</table>

