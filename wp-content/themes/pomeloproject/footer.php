		</div>
		<footer>
			<div class="row">
				<div class="small-12 columns">
					Pomelo Project &copy; <?php echo date("Y") ?>
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

		</script>
	<?php wp_footer(); ?>
	
	
	</body>
</html>