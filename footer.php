<footer>
  <div class="container_12">
    <div class="grid_12">
      <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
      <div class="copy">Shahed Movies &copy; 2045 | <a href="#TOP">Top</a> | Design by: Maram-Lama-Alla-Amjad-Samhaa</a></div>
    </div>
  </div>
</footer>

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
</body>
</html>