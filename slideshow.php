<!-- This page contains a slide show where users an flip through a few photos -->
<div class="slideshow">
  				<div class="slides">
    				<div class="numbertext">1 / 7</div>
    				<img src="https://eliteclubs.com/wp-content/uploads/2020/02/Paddle-Tennis-in-Waukesha-Brookfield.jpg" width="100%" height="750" alt="Friends playing padel" class="slide"/>
  				</div>
  				<div class="slides">
    				<div class="numbertext">2 / 7</div>
    				<img src="https://www.arabnews.com/sites/default/files/styles/n_670_395/public/2022/03/05/3103856-1539756502.jpg?itok=vqpZAzsQ" width="100%" height="750" alt="Locked in on padel" class="slide"/>
  				</div>

  				<div class="slides">
    				<div class="numbertext">3 / 7</div>
    				<img src="https://cdn.shopify.com/s/files/1/1749/5899/articles/Screen_Shot_2018-01-28_at_17.09.50_2048x.png?v=1559233259" width="100%" height="750" alt="Empty court" class="slide"/>
  				</div>

  				<div class="slides">
    				<div class="numbertext">4 / 7</div>
    				<img src="https://i0.wp.com/squashmad.com/wp-content/uploads/2019/06/yZcZ7YeRzSICPIxDfQAnw_thumb_3948.jpg?resize=1068%2C653&ssl=1" width="100%" height="750" alt="Devin and Cam doubles tournament champions" class="slide"/>
  				</div>

  				<div class="slides">
    				<div class="numbertext">5 / 7</div>
    				<img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Sanchez-Casal_Paddle_Tennis_Game.jpg" width="100%" height="750" alt="Side view of a court" class="slide"/>
  				</div>

  				<div class="slides">
    				<div class="numbertext">6 / 7</div>
    				<img src="https://whatson.ae/wp-content/uploads/2021/06/Padel-fb.jpg" width="100%" height="750" alt="Serving the ball" class="slide"/>
  				</div>

  				<div class="slides">
    				<div class="numbertext"> 7 / 7</div>
    				<img src="https://www.lta.org.uk/48ff75/siteassets/play/padel/image/padel-workforce-ntc.jpg?w=2000" width="100%" height="750" alt="Group photo!"class="slide"/>
  				</div>
  			</div>
  			<div class ="buttons">
  					<input type="button" value="Previous" onclick="next(-1)"/> 
  					<input type="button" value="Next" onclick="next(1)"/>
  			</div>
  	<script> 
	let slideIndex = 1;
	viewSlide(slideIndex);
	function next(n){
		slideIndex += n;
		viewSlide(slideIndex);
	}
	function viewSlide(n){
  		let slides = document.getElementsByClassName("slides");
  		if (n > slides.length) {
  			slideIndex = 1;
  		}
  		if (n < 1) {
  			slideIndex = slides.length;
  		}
  		for (let i = 0; i < slides.length; i++) {
    		slides[i].style.display = "none";
  		}
  		slides[slideIndex-1].style.display = "block";
	}
</script>