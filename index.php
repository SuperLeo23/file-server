<?php
if(isset($_POST['cover_up']))
    {

    $imgFile = $_FILES['selFilename']['name'];
    $tmp_dir = $_FILES['selFilename']['tmp_name'];
    $imgSize = $_FILES['selFilename']['size'];
    $dirName = $_POST['dirName'];
    $date=date('Ymd');
    
    //echo count($_FILES['selFilename']['name']);

    if (!file_exists('uploads/'.$date.'/')) {
        mkdir('uploads/'.$date.'/', 0777, true);
    }
    if (!file_exists('uploads/'.$date.'/'.$dirName.'/')) {
        mkdir('uploads/'.$date.'/'.$dirName.'/', 0777, true);
    }
    if(!empty($imgFile))
        {
        $upload_dir = 'uploads/'.$date.'/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        // valid image extensions
        //$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  valid extensions
        // rename uploading image --> rand(1000,1000000).".".

        if ($dirName != ''){
            $upload_dir = 'uploads/'.$date.'/'.$dirName.'/'; // upload directory
        }

        move_uploaded_file($tmp_dir,$upload_dir.$imgFile);
        echo "<h3 style='color: rgb(0, 255, 0); text-align: center'>Succesfully uploaded</h3>";

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>LocalSave</title>
  </head>
  <body style="background-color: black; color: white">
  <a class="nav-link" href="uploads/">->Uploads<-</a>
    <form method="post" enctype="multipart/form-data" class="form">
      <br /><br /><br />
      <label class="btn btn-default btn-sm center-block btn-file">
        <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
        <input
          style="display: none"
          type="file"
          name="selFilename"
          required="required"
          multiple=""
          onchange="preview()"
        />
      </label>
      <br /><br />
      <img id="thumb" src="" width="150px" />
      <div class="dirName">
        <input type="checkbox" name="" id="checkBox" onClick="showDirName();" />
        Upload files to custom folder
      </div>
      <br /><br />
      <p id="dirName">
        <input
          type="text"
          placeholder="New folder name"
          name="dirName"
          class="dirname"
        />
      </p>
      <br /><br />
      <p>
        <input
          class="button"
          type="submit"
          name="cover_up"
          class="submit-btn"
          value="Upload"
        />
      </p>
    </form>
  </body>
  <script type="text/javascript">
    document.getElementById("dirName").style.visibility = "hidden";
    Document.getElementById("dirName").show = false;
    function preview() {
      thumb.src = URL.createObjectURL(event.target.files[0]);
    }
    function showDirName() {
      if (document.getElementById("checkBox").checked) {
        document.getElementById("dirName").style.visibility = "visible";
      } else {
        document.getElementById("dirName").style.visibility = "hidden";
      }
    }
  </script>
</html>