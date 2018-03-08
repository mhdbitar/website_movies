<!DOCTYPE html>
<html lang="en">
<head>
<title>Shahed Movies | Admin</title>
<meta charset="utf-8">
<link rel="icon" href="../images/favicon.ico">
<link rel="shortcut icon" href="../images/favicon.ico">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/form.css">
<link rel="stylesheet" href="../css/jquery.countdown.css">
<script src="../js/jquery.js"></script>


<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/script.js"></script>
<script src="../js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="../js/jquery.touchSwipe.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<?php
  require('../config.php');
?>
<body>
<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><img src="../images/the-movies-logo-1 (1).gif" width="250" height="300"></h1>
      <div id="countdown"></div>
      <div class="clear"></div>
      <div class="menu_block">
        <nav>
          <ul class="sf-menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="pages/register.php">Register</a></li>
            <?php
              if (!is_login()) { ?>
                <li><a href="pages/login.php">Login</a></li>
            <?php } else { ?>
              <?php if (is_admin()) { ?>
                <li class="current"><a href="pages/admin.php">Admin</a></li>
              <?php } ?>
                <li><a href="pages/logout.php">Logout</a></li>
            <?php } ?>
          </ul>
        </nav>
       <br/'>_____________________________________________<label>DateTime :<input type="datetime-local"/>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
<div class="content">
  <div class="container_12">
    <div class="grid_12 cont1">
      <div class="box bx2 pb1">
        <div class="grid_12 ">
          <h3>Add New Movie</h3>
          <?php
    if (isset($_POST["submit"]))
    {
      $nameErr = "";
      $descriptionErr = "";
      $box_officeErr = "";
      $release_dateErr = "";
      $imageErr = "";
      $flag = true;

      $name = mysqli_real_escape_string($connection,$_POST['name']);
      $description = mysqli_real_escape_string($connection,$_POST['description']);
      $box_office = mysqli_real_escape_string($connection,$_POST['box_office']);
      $release_date = mysqli_real_escape_string($connection,$_POST['release_date']);
    
      if (empty($name)) {
        $nameErr = "The name field is required!";
        $flag = false;
      }

      if (empty($description)) {
        $phoneErr = "The Description field is required!";
        $flag = false;
      }

      if (empty($box_office)) {
        $emailErr = "The Box Office field is required!";
        $flag = false;
      }

      if (empty($release_date)) {
        $emailErr = "The Release Date field is required!";
        $flag = false;
      }

      if (empty($_FILES["cover"])) {
          $imageErr =  "The Cover field is required!";
          $flag = false;
        }

      if ($flag == true) {
        $errors = array();
        $errors = upload($_FILES["cover"], $errors);

        if (count($errors) == 0) {
          $sql = "INSERT INTO movies (name, description, box_office, release_date, cover) values('".$name."',  '".$description."', '".$box_office."', '".$release_date."', '".$_FILES["cover"]['name']."')";
              $result = mysqli_query($connection, $sql);
              if ($result) {
                echo '<p style="color: green;">Added successfully</p>';
              } else {
                echo '<p style="color: red;">Something went wrong!</p>';
              }
        } else {
              for ($i = 0; $i < count($errors); $i++) {
              echo '<p style="color: red;">'. $errors[$i].'</p>';
            }
        } 
      } else {
          if ($nameErr != "") {
            echo '<p style="color: red;">' .$nameErr. '</p>';
          } 

          if ($descriptionErr != "") {
            echo '<p style="color: red;">' .$descriptionErr. '</p>';
          }

          if ($box_officeErr != "") {
            echo '<p style="color: red;">' .$box_officeErr. '</p>';
          }

          if ($release_dateErr != "") {
            echo '<p style="color: red;">' .$release_dateErr. '</p>';
          }
      }
    }
  

  function upload($file, $errors) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        $check = getimagesize($file["tmp_name"]);
        if($check == false) {
          array_push($errors, "File is not an image.");
        }

        // Check if file already exists
        if (file_exists($target_file)) {
          array_push($errors, "Sorry, file already exists.");
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            
        } else {
            array_push($errors, "Sorry, there was an error uploading your file.");
        }

        return $errors;
      }
?>
          <form id="form" action="add.php" method="post" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
            <fieldset>
              <label class="name">
                <input type="text" placeholder="Name:" name="name">
                <br class="clear">
                <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
              <label class="box_office">
                <input type="text" placeholder="Box Office:" name="box_office">
                <br class="clear">
                <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>
              <label class="cover">
                <input type="file" placeholder="Cover:" name="cover">
                <br class="clear">
                                <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>

                <label class="release_date">
                <input type="date" placeholder="Release Date:" name="release_date">
                <br class="clear">
                <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>
                <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>  
              <label class="description">
                <textarea placeholder="Description:" name="description"></textarea>
                <br class="clear">
                <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>
               <div class="clear"></div>
              <div class="btns">
                <input type="submit" class="col1" name="submit" value="Add">
                <input type="reset" value="Reset" class="col1">
                <div class="clear"></div>
              </div>
            </fieldset>
          </form>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>
<footer>
  <div class="container_12">
    <div class="grid_12">
      <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
      <div class="copy">Shahed Movies &copy; 2045 | <a href="#">Top</a> | Design by: Maram-Lama-Alaa-Amjad-Samhaa</a></div>
    </div>
  </div>
</footer>

<script>

function validateForm() {
    var name = document.forms["myForm"]["name"].value;
    var description = document.forms["myForm"]["description"].value;
    var box_office = document.forms["myForm"]["box_office"].value;
    var release_date = document.forms["myForm"]["release_date"].value;
    
    if (name == "") {
        alert("Name must be filled out");
        return false;
    }

    if (description == "") {
        alert("Description must be filled out");
        return false;
    }

    if (box_office == "") {
      alert("Box Office must be filled out");
      return false;
    }

    if (release_date == "") {
      alert("Release Date must be filled out");
      return false;
    }
    return true;
}
</script>

</body>
</html>