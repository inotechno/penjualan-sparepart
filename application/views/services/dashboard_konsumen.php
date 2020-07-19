<script type="text/javascript">
	$(function() {
		view_barang_dijual();
		function view_barang_dijual(search) {
			
			$.ajax({
				url: '<?= site_url('konsumen/Dashboard/produk_terlaris') ?>',
				type: 'POST',
				data:{search:search},
				beforeSend: function()
			    { 
					$('#produk-terlaris').html('<div class="col-md-12 text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading…</span></div>');
				},
				success:function (data) {
					$('#produk-terlaris').html(data);
				}
			});		

		}
	});
</script>
</body>
</html>