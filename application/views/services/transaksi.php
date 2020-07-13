
<script type="text/javascript">
	$(function() {
		view_transaksi_pending();
		function view_transaksi_pending() {
			
			$.ajax({
				url: '<?= site_url('konsumen/Transaksi/view_trx_pending') ?>',
				type: 'POST',
				success:function (data) {
					$('#view-transaksi-pending').html(data);
					$('#table-transaksi-pending').DataTable();
				}
			});			
		}

	});
</script>
</body>
</html>