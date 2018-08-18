<footer class="footer">
	<div class="container-fluid">
		<nav class="float-left">
			<ul>
				<li>
					<a href="https://www.creative-tim.com">
						Creative Tim
					</a>
				</li>
			</ul>
		</nav>
		<div class="copyright float-right">
			&copy;
			<script>
				document.write(new Date().getFullYear())
			</script>, made with <i class="material-icons">favorite</i> by
			<a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
		</div>
		<!-- your footer here -->
	</div>
</footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/core/jquery.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/core/popper.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="<?php echo base_url('assets/js/plugins/chartist.min.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url('assets/js/material-dashboard.min.js') ?>" type="text/javascript"></script>

<!-- koma otomatis saat input number -->
<script>
	$('input.number').keyup(function(event) {

  // skip for arrow keys
	  if(event.which >= 37 && event.which <= 40) return;

	  // format number
	  $(this).val(function(index, value) {
	  	return value
	  	.replace(/\D/g, "")
	  	.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	  	;
	  });
	});
</script>

</body>

</html>
