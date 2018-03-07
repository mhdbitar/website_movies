<!DOCTYPE html>
<html lang="en">
<head>
<title>Shahed movies</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/jquery.countdown.css">
<script src="js/jquery.js"></script>


<script src="js/jquery.easing.1.3.js"></script>
<script src="js/script.js"></script>
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>
<script>
$(window).load(
    function () {
        $('.carousel1').carouFredSel({
            auto: false,
            prev: '.prev',
            next: '.next',
            width: 220,
            items: {
                visible: {
                    min: 3,
                    max: 3
                },
                height: 'auto',
                width: 220,
            },
            responsive: true,
            scroll: 1,
            mousewheel: false,
            swipe: {
                onMouse: false,
                onTouch: true
            }
        });
        $('.typo').mouseenter(
            function () {
                var temp = $(".typo>img").attr("data-href");
                $(".typo>img").attr(
                    "src", temp
                );
            }
        );
    });
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body  class="page1">
<p class="typo">&nbsp;</p>
<p class="typo"><img src="images/the-movies-logo-1 (1).gif" width="440" height="323"></p>
  
<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="index.html"><img src="images/images.png" alt=""></a></h1>
      <div id="countdown"></div>
      <div class="clear"></div>
      <div class="menu_block">
        <nav>
          <ul class="sf-menu">
            <li class="current"><a href="index.html">Home</a></li>
            
            
			  <li><a href="Rate.html">Rate</a>
            <li><a href="contact.html">Contacts</a></li>
          </ul>
        </nav><br/'>__________________________________________<label>DateTime :<input type="datetime-local"/>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
<div class="content">
  <div class="container_12">
    <div class="grid_9">
      <div class="box">
        <div class="typo">
          <div class="ind"></div>
        </div>
        <p class="p1">Welcome To WebSit We Wish You Fun Watching </p>
         </div>
      <a href="#" class="next"></a><a href="#" class="prev"></a>
      <h3 class="pl1">Movies</h3>
      <div class="car_div">
        <ul class="carousel1">
          <li><img src="images/page1_img1.jpg" alt=""><a href="#">Drama Film</a></li>
          <li><img src="images/page1_img2.jpg" alt=""><a href="#">horror Film</a></li>
          <li><img src="images/page1_img3.jpg" alt=""><a href="#">Action Film </a></li>
          <li><img src="images/page1_img1.jpg" alt=""><a href="#">Drama Film</a></li>
          <li><img src="images/page1_img2.jpg" alt=""><a href="#">horror Film</a></li>
          <li><img src="images/page1_img3.jpg" alt=""><a href="#">Action Film </a></li>
        </ul>
      </div>
      <div class="clear"></div>
      <div class="grid_3 alpha">
        <div class="box bx1 blue maxheight">
          <h4>Bollywood</h4>
          <p>
          
     
          </p>
          The term is used broadly to refer to movies Hindi, Urdu languages in the city of Mumbai, India industry. This term is also used incorrectly at times to refer to the entire film industry in India, while in fact refers to the part of the industry. [1] Bollywood's biggest film producer in India and one of the largest headquarters of film production in the world.<br>
        </div>
      </div>
      <div class="grid_3">
        <div class="box bx1 maxheight">
          <h4>Hollywood</h4>
          <p>The cinema in the United States, which is famous for its often referred to as Hollywood profound effect on cinema across the world since the early 20th century are sometimes separated the history of cinema in the United States into four main periods: the era of silent film, and Cinema Hollywood classic, and the new Hollywood, contemporary and period . Thanks to the birth of modern cinema to Auguste and Louis Lumière, and quickly became the most prominent American cinema strength in emerging industries. Since the twenties of the last century, the industry's American films reap profits every year is superior to film industries worldwide.</p>
        </div>
      </div>
      <div class="grid_3 omega">
        <div class="box bx1 green maxheight">
          <h4>Documentary</h4>
          <p>For the documentary is a sex film or television show based on documentation and recording and display without actually entering or counterfeiting, which sets it apart from the feature film maker's parents have all the power to weave realism and fantasy events such as vision</p>
        </div>
      </div>
    </div>
    <div class="grid_3">
      <div class="block1 blue">
        <p> <img src="images/bollyposter.jpg" width="170" height="200"></a></p>
        <p> <a href="pages/Untitled-1.html">Indian Films</a>
      </div>
     
  </div>
</div>
<footer>
  <div class="container_12">
    <div class="grid_12">
      <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
      <div class="copy">Shahed Movies &copy; 2045 | <a href="#TOP">Top</a> | Design by: Maram-Lama-Alla-Amjad-Samhaa</a></div>
    </div>
  </div>
</footer>
</body>
</html>