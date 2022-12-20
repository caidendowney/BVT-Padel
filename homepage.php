<!-- Homepage that allows users to become a member, look at pictures and learn how to play -->
<?php
	$page_title='BVT Padel Homepage';
	include('header.php');
	session_start();
	session_destroy();
?>
<br>
<a href="newMembers.php">
	<input type="submit" id="member" name="submit" value="Become a Member!"/> 
</a>
<a href="bvtLogin.php">
	<input type="submit" id="login" name="submit" value="Sign In" />
</a>
<div> 
	<h2> About </h2>
	<p> BVT Padel is a padel ball club located on 50 Tennis Ct, South Burlington, VT. We are open 7 days a week from 8:00 AM to 10:00 PM. BVT Padel was founded in 2001 by local padel legend Darius Rinkle and business guru Chad Marchweather. Padel (also known as paddle tennis or paddle ball) was invented in 1928 in Scarsdale, New York. It is played on a 30′ x 60′ aluminum court, surrounded by a 12′ screen. At BVT Padel we have a total of three courts all of which are surrounded by spotlights, perfect for night time paddle. Our courts are also heated making it the perfect wintertime activity. </p>
</div>
<div class="events"> 
</div>
<?php 
	include('slideshow.php');
?>
  			
<div class="video"> 
<h2> How to Play! </h2>
<iframe width="100%" height="411" src="https://www.youtube.com/embed/NX-68fxhL_4" title="How to play padel?" frameborder="allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<br>
<?php 
	include('footer.php');
?>