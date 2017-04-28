<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
if( isset($_POST['btn-add']) ) {
 
  $number = trim($_POST['number']);
  $number = strip_tags($number);
  $number = htmlspecialchars($number);
  
  $collegeid = trim($_POST['collegeid']);
  $collegeid = strip_tags($collegeid);
  $collegeid = htmlspecialchars($collegeid);
  
  $branchid = trim($_POST['branchid']);
  $branchid = strip_tags($branchid);
  $branchid = htmlspecialchars($branchid);
  echo $number;
  for( $i = 0; $i<$number; $i++ )
  {
   $tag = "@app.com";
   $studentemail = $collegeid.$branchid.$i.$tag;
   echo $studentemail;
   $name = "Student";
   $password = "thanks123";
   $password = hash('sha256', $password);
   $query = "INSERT INTO users(userName,userEmail,userPass,flag) VALUES('$name','$studentemail','$password',3)";
   $res = mysql_query($query);
 
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully added the students";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, students not ..."; 
   } 
    
  }
  }
  
  
 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     
    
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="integer" name="number" class="form-control" placeholder="Enter the number of students to whom you want to generate IDs" maxlength="50" value="<?php echo $number ?>" />
                
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="text" name="collegeid" class="form-control" placeholder="Enter college ID" maxlength="40" value="<?php echo $collegeid ?>" />
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="text" name="branchid" class="form-control" placeholder="Enter branch ID" maxlength="40" value="<?php echo $branchid ?>" />
        
                
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-add">Add Student</button>
            </div>
           
          
        
        </div>
   
    </form>
    </div> 
</div>
</body>
</html>
<?php ob_end_flush();?>
