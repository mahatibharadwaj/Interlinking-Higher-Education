<?php
ob_start();
session_start();
require_once 'dbconnect.php';
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mahati"; // Mysql password
$db_name="dbtest"; // Database name
$tbl_name="coursecontent"; // Table name
  ob_start();
  session_start();
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $description = trim($_POST['description']);
  $description = strip_tags($description);
  $description = htmlspecialchars($description);

  $res1=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow1=mysql_fetch_array($res1);
  $branchid=$userRow1['branchid'];
    /*echo $branchid;*/
  $res2=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $clg=mysql_fetch_array($res2);
  $collegeid=$clg['collegeid'];

 
  /*echo $collegeid;*/

  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);

  $scope = trim($_POST['scope']);
  $scope = strip_tags($scope);
  $scope = htmlspecialchars($scope);

  $likes = trim($_POST['likes']);
  $likes = strip_tags($likes);
  $likes = htmlspecialchars($likes);


  $content = $_POST['content'];
  
  
  
  $query = "INSERT INTO `coursecontent` (name, description, branchid, collegeid, type, scope, content) VALUES ('$name', '$description', '$branchid', '$collegeid', '$type', '$scope', '$content')";
   $res = mysql_query($query);
 //echo var_dump($query);
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully added ";
    
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong"; 
   } 
    
  
  
 
?>
<!DOCTYPE html>
<html>
<head>
<head> <link rel="stylesheet" href="https://www.w3schools.com/html/styles.css"> 

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">


            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="name" class="form-control" placeholder="Enter the name of the topic" maxlength="50" value="<?php echo $name ?>" />
                
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="description" class="form-control" placeholder="Description" maxlength="100" value="<?php echo $description ?>" />
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <select name="type" class="form-control">
                <option value="notes">Notes</option>
                <option value="videos">Videos</option>
                <option value="tutorials">Tutorials</option>
                <option value="events">Events</option>
              </select> <?php $type=$_POST['type']; ?>

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <select name="scope" class="form-control">
                <option value="public">Visible to all colleges</option>
                <option value="private">Visible within our college only</option>
              </select> <?php $scope=$_POST['scope']; ?>

            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="file" name="Content" class="form-control" placeholder="Content" maxlength="50" value="<?php echo $content ?>" />
            <a href="uploadfile.php"></a>

            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-add">Add course material</button>
             <!--<a href="uploadfile.php"></a>-->
            </div>
           
          
        
        </div>
   
    </form>
    </div> 
</div>

<div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="file" name="Content" class="form-control" maxlength="50" value="<?php echo $content ?>" >

             <div><a href="home.php">Back</a></div>





<?php
if(isset($_POST['content']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$contents = fread($fp, filesize($tmpName));
$contents = addslashes($contents);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


$query = "INSERT INTO coursecontent ('content' ) VALUES('$content') ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

mysql_query($query) or die('Error, query failed');
include 'library/closedb.php';

echo "<br>File $fileName uploaded<br>";
}
?>