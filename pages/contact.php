<!DOCTYPE html>
<html lang="en">
<head>
<title>Shahed Movies | Contact</title>
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
            <li class="current"><a href="contact.php">Contact</a></li>
            <li><a href="pages/register.php">Register</a></li>
            <?php
              if (!is_login()) { ?>
                <li><a href="pages/login.php">Login</a></li>
            <?php } else { ?>
              <?php if (is_admin()) { ?>
                <li><a href="pages/admin.php">Admin</a></li>
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
        <div class="grid_6 alpha">
          <div class="pl1">
            <h3>Find Us</h3>
            <div class="map">
              <figure class="">
                <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
              </figure>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>
        <div class="grid_5 prefix_1 omega">
          <h3>Contact Us</h3>
          <?php
    if (isset($_POST["submit"]))
  {
    $nameErr = "";
    $phoneErr = "";
    $emailErr = "";
    $messageErr = "";
    $flag = true;

    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $phone = mysqli_real_escape_string($connection,$_POST['phone']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $message = mysqli_real_escape_string($connection,$_POST['message']);

    if (empty($name)) {
      $nameErr = "The name field is required!";
      $flag = false;
    }

    if (empty($phone)) {
      $phoneErr = "The phone field is required!";
      $flag = false;
    }

    if (empty($email)) {
      $emailErr = "The email field is required!";
      $flag = false;
    }

    if (empty($message)) {
      $messageErr = "The message field is required!";
      $flag = false;
    }

    if ($flag == true) {

        $txt = $name . "\n" . $message;
        file_put_contents("../files/".$name.".txt", $txt);

        $sql = "INSERT INTO contacts (name, email, phone, message) values('".$name."',  '".$email."', '".$phone."', '".$message."')";
        $result = mysqli_query($connection, $sql);

        if ($result) {
          echo "<p style='color: green;'>Your message has been sent successfully.</p>";
        } else {
          echo "<p style='color: red;'>Something went wrong, please resend your message again!</p>";
        }
    } else {
      if ($nameErr != "") {
        echo "<p style='color: red;'>$nameErr</p>";
      }

      if ($phoneErr != "") {
        echo "<p style='color: red;'>$phoneErr</p>";
      }

      if ($emailErr != "") {
        echo "<p style='color: red;'>$emailErr</p>";
      }

      if ($messageErr != "") {
        echo "<p style='color: red;'>$messageErr</p>";
      }
    }
  }
?>
          <form id="form" action="contact.php" method="post" name="myForm" onsubmit="return validateForm()">
            <div class="success_wrapper">
              <div class="success">Contact form submitted!<br>
                <strong>We will be in touch soon.</strong> </div>
            </div>
            <fieldset>
              <label class="name">
                <input type="text" placeholder="Name:" name="name">
                <br class="clear">
                <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
              <label class="email">
                <input type="text" placeholder="E-mail:" name="email">
                <br class="clear">
                <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>
              <label class="phone">
                <input type="tel" placeholder="Phone:" name="phone">
                <br class="clear">
                <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>
              <label class="message">
                <textarea name="message" placeholder="Message:"></textarea>
                <br class="clear">
                <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span> </label>
              <div class="clear"></div>
              <div class="btns">
                <input type="submit" class="col1" name="submit" value="Send">
                <input type="reset" value="Reset" class="col1">
                <div class="clear"></div>
              </div>
            </fieldset>
          </form>
          Development Department: <br>
          E-mail:<a href="mailto:movies2016@gmail.com">movies2016@gmail.com</a><br>
        Phone: +966555791716 </div>
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
    var email = document.forms["myForm"]["email"].value;
    var phone = document.forms["myForm"]["phone"].value;
    var message = document.forms["myForm"]["message"].value;
    
    if (name == "") {
        alert("Name must be filled out");
        return false;
    }

    if (email == "") {
        alert("Email must be filled out");
        return false;
    }

    if (phone == "") {
      alert("Phone must be filled out");
      return false;
    }

    if (message == "") {
      alert("Message must be filled out");
      return false;
    }

    return true;
}
</script>

</body>
</html>