<script src="<?= base_url('assets/js/lib/data-table/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/buttons.bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lib/data-table/buttons.colVis.min.js') ?>"></script>
<script src="<?= base_url('assets/js/init/datatables-init.js') ?>"></script>
<script type="text/javascript">
	jQuery(function($) {
		view_kategori();
		function view_kategori() {
			
			$.ajax({
				url: '<?= site_url('admin/Master/Data_Kategori') ?>',
				type: 'POST',
				success:function (data) {
					$('#view-kategori').html(data);
					$('#table-kategori').DataTable();
				}
			});			
		}


	});
</script>
</body>
</html>