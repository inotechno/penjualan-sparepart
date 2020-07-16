<!--   Core JS Files   -->
  <script src="<?= base_url('assets/assets/js/core/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/assets/js/core/popper.min.js')?>"></script>
  <script src="<?= base_url('assets/assets/js/core/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('assets/assets/js/plugins/bootstrap-notify.js')?>"></script>
  <script src="<?= base_url('assets/assets/datatables/datatables.min.js')?>"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/assets/js/paper-dashboard.min.js?v=2.0.1') ?>" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?= base_url('assets/assets/demo/demo.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script type="text/javascript">
  	$(function() {
  		$('#logout').click(function() {
		    Swal.fire({
		      title: 'Are you sure ?',
		      text: "Apakah Anda Ingin Logout",
		      icon: 'warning',
		      showCancelButton: true,
		      confirmButtonColor: '#3085d6',
		      cancelButtonColor: '#d33',
		      confirmButtonText: 'Ya, Logout!'
		    }).then((result) => {
		      if (result.value) {
		        window.location.href = '<?= base_url('logout') ?>';
		        Swal.fire(
		          'Sukses!',
		          'Anda Telah Logout',
		          'success'
		        )
		      } 
		    });
		});	
  	});
  </script>