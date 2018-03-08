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

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    border: 1px solid #000 !important;
    text-align: center;
}

#add, #edit, #delete {
  border: 1px solid #fe8c21;
    font-size: 14px;
    background: #322b36;
    padding: 1%;
}
</style>
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
            
            
            <li><a href="./rate.php">Rate</a></li>
  
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
          <h3>Movie Mangements</h3>
          <?php
    if (isset($_POST["submit"]))
  {
    $nameErr = "";
    $emailErr = "";
    $passwordErr = "";
    $flag = true;

    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
  
    if (empty($name)) {
      $nameErr = "The name field is required!";
      $flag = false;
    }

    if (empty($password)) {
      $phoneErr = "The password field is required!";
      $flag = false;
    }

    if (empty($email)) {
      $emailErr = "The email field is required!";
      $flag = false;
    }

    if ($flag == true) {
        $sql = "INSERT INTO users (name, email, password) values('".$name."', '".$email."', '".md5($password)."')";
        $result = mysqli_query($connection, $sql);

        if ($result) {
          echo "<p style='color: green;'>$name created successfully.</p>";
        } else {
          echo "<p style='color: red;'>Something went wrong!</p>";
        }
    } else {
      if ($nameErr != "") {
        echo "<p style='color: red;'>$nameErr</p>";
      }

      if ($passwordErr != "") {
        echo "<p style='color: red;'>$passwordErr</p>";
      }

      if ($emailErr != "") {
        echo "<p style='color: red;'>$emailErr</p>";
      }
    }
  }
?>

<a href="./add.php" id="add">Add</a><br>
<table style="width:100%">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Description</th> 
    <th>Box Office</th>
    <th>Release Date</th>
    <th>Cover</th>
    <th>Actions</th>
  </tr>
  <?php
    $sql = "SELECT * FROM movies";
    $result = mysqli_query($connection, $sql);

      if ($result->num_rows > 0) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          $date = DateTime::createFromFormat('Y-m-d', $row['release_date']);
          echo "<tr>";
            echo "<td>". $i ."</td>";
            echo "<td>". $row['name']. "</td>";
            echo "<td>". $row['description']. "</td>";
            echo "<td>". $row['box_office']. "</td>";
            echo "<td>". $date->format('Y'). "</td>";
            echo "<td><img src='../images/". $row['cover']."'></td>";
            echo "<td><a href='delete.php?id=". $row['movie_id'] ."' id='delete'>Delete</a></td>";
          echo "</tr>";
          $i++;
        }
      }
  ?>
</table>
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


</body>
</html>