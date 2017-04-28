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

  
  $res2=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $clg=mysql_fetch_array($res2);
  $contact=$clg['userEmail'];

 
  echo $contact;

  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);

  $scope = trim($_POST['scope']);
  $scope = strip_tags($scope);
  $scope = htmlspecialchars($scope);

  $likes = trim($_POST['likes']);
  $likes = strip_tags($likes);
  $likes = htmlspecialchars($likes);


 
  
  
  
  $query = "INSERT INTO project (name, description, scope, contact) VALUES ('$name', '$description', '$scope', '$contact')";
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

<link rel="stylesheet" href="style.css" type="text/css" />
<head> <link rel="stylesheet" href="https://www.w3schools.com/html/styles.css"> 

</head>
<body>
 <div id="login-form">

<div class="container">

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
              <select name="scope" class="form-control">
                <option value="public">Visible to all colleges</option>
                <option value="private">Visible within our college only</option>
              </select> <?php $scope=$_POST['scope']; ?>

               <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-add">Add my project</button>
             <!--<a href="uploadfile.php"></a>-->
            </div>
	
            
           <div><a href="home.php">Back</a></div>

          
        
        </div>
   
    </form>
    </div> 
</div>


