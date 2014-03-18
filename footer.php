				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>
    
    <script>
		  jQuery(document).ready(function ($) {
				// Smooth scroll on main nav links
				$(".main-nav ul li a[href^='#']").on('click', function(e) {
			 // prevent default anchor click behavior
			 e.preventDefault();	
			 // store hash
			 var hash = this.hash;
			 // animate
			 $('html, body').animate({
					 scrollTop: $(this.hash).offset().top
				 }, 300, function(){
					 // when done, add hash to url
					 window.location.hash = hash;
				 });
		    });
			});
		</script>

	</body>

</html>