		</div>
		<footer>
			<div class="row">
				<div class="small-12 columns">
					<p>This is where the footer is going</p>
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

				var t2 = document.getElementById("nav-container")
				if (t2.classList)
					t2.classList.add("nav-extend");
				else
					t2.className += ' ' + "nav-extend";
			}

			function removeClasstoDrop(){
				var t1 = document.getElementById("nav-container")
				if (t1.classList)
					t1.classList.remove("nav-extend");
				else
					t1.className = t1.className.replace(new RegExp('(^|\\b)' + "nav-extend".split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
			}

			var el = document.getElementById("nav-toggle");
			el.addEventListener("click", ClasstoDrop, false);
			el.addEventListener("touchend", ClasstoDrop, false);
		</script>
	<?php wp_footer(); ?>
	
	
	</body>
</html>