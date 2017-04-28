<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP File Uploader</title>
 
    <!-- Bootstrap core CSS -->
    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
    
  </head>
 
  <body>
 
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="uploadfile.php">PHP File Uploader</a>
        </div>
      </div>
    </div>
 
 
    <div class="container">
 
          <div class="row">
            <div class="col-lg-12">
               <form class="well" action="uploadfile.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="file">Select a file to upload</label>
                    <input type="file" name="file">
                    <p class="help-block">Only pdf and mp4 file with maximum size of 1 MB is allowed.</p>
                  </div>
                  <input type="submit" class="btn btn-lg btn-primary" value="Upload">
                </form>
            </div>
          </div>
    </div> <!-- /container -->
 
  </body>
</html>