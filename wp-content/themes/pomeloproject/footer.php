		</div>
		<footer>
			<div class="row">
				<div class="small-12 medium-4 columns">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu', 'container_id' => 'footer-container' ) ); ?>
				</div>
				<div class="small-12 medium-4 columns copy">
					Pomelo Project &copy; <?php echo date("Y") ?>
				</div>
				<div class="small-12 medium-4 columns social-media">
					<a href="#"></a>
					
					<?php 

					$products = new WP_Query( 'post_type=social_media' );
					get_page_by_title( 'Facebook' );
					if( $products->have_posts() ) {
					while( $products->have_posts() ) {
						$products->the_post();
						$url = get_post_meta( get_the_ID(), 'meta-text', true );
						if ( get_the_title() == 'Twitter'){
							echo '<a href="http://'.$url.'"><span class="twitter"></span></a>';
						}
						else if ( get_the_title() == 'Facebook'){
							echo '<a href="http://'.$url.'"><span class="facebook"></span></a>';
						}
						else if ( get_the_title() == 'Instagram'){
							echo '<a href="http://'.$url.'"><span class="instagram"></span></a>';
						}
						else {
							echo '<a href="http://'.$url.'"><span class="social-unknown"></span></a>';
						}
						
					}
					}
					?>
				</div>
			</div>
			
		</footer>
		<script>

			function ClasstoDrop() {
				var t2 = document.getElementById("nav-container");
				if(t2.classList[1] === "nav-extend") {
					removeClasstoDrop();
				}
				else {
					addClasstoDrop();
				}
			}

			function addClasstoDrop() {
				var t3 = document.getElementById("nav-toggle")
				if (t3.classList)
					t3.classList.add("nav-toggle-active");

				var t2 = document.getElementById("nav-container")
				if (t2.classList)
					t2.classList.add("nav-extend");
				else
					t2.className += ' ' + "nav-extend";
			}

			function removeClasstoDrop(){
				var t4 = document.getElementById("nav-toggle")
				if (t4.classList)
					t4.classList.remove("nav-toggle-active");

				var t1 = document.getElementById("nav-container")
				if (t1.classList)
					t1.classList.remove("nav-extend");
				else
					t1.className = t1.className.replace(new RegExp('(^|\\b)' + "nav-extend".split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
			}

			var el = document.getElementById("nav-toggle");
			el.addEventListener("click", ClasstoDrop, false);
			el.addEventListener("touchleave", ClasstoDrop, false);

			var resp = document.getElementsByClassName('attachment-shop_catalog');
			console.log(resp.length + "is the length");
			for (var i=0; i<resp.length; i++) {
				resp[i].removeAttribute('width');
				resp[i].removeAttribute('height');
			}
		</script>
	<?php wp_footer(); ?>
	
	
	</body>
</html>