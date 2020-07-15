
<script type="text/javascript">
	$(document).ready(function() {
		view_transaksi_pending();
		function view_transaksi_pending() {
			
			$.ajax({
				url: '<?= site_url($this->session->userdata('link').'/Transaksi/view_trx_pending') ?>',
				type: 'POST',
				success:function (data) {
					$('#table-transaksi-pending').DataTable();
					$('#view-transaksi-pending').html(data);
				}
			});
		}

		$('#view-transaksi-pending').on('click', '.validasi_pembayaran', function() {
			var id = $(this).attr('data-id');
			var kode_transaksi = $(this).attr('data-kode');
			var stok = $(this).attr('data-stok');
			var jumlah = $(this).attr('data-jumlah');
			var id_barang = $(this).attr('data-idbarang');

 			Swal.fire({
			  title: 'Are you sure?',
			  text: "Anda Yakin Transaksi ini sudah di bayar dan akan divalidasi!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ya, Validasi!'
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					url: '<?= site_url('admin/Transaksi/validasi_pembayaran') ?>',
					type: 'POST',
					dataType: 'JSON',
					data:{id:id, stok:stok, jumlah:jumlah, id_barang:id_barang}
				});
			    Swal.fire(
			      'Berhasil!',
			      'Transaksi Berhasil Di Bayar',
			      'success'
			    );
			    view_transaksi_pending();
			  }
			})
			
		});

	});

	$(document).ready(function() {
		view_transaksi_sukses();
		function view_transaksi_sukses() {
			
			$.ajax({
				url: '<?= site_url($this->session->userdata('link').'/Transaksi/view_trx_sukses') ?>',
				type: 'POST',
				success:function (data) {
					$('#table-transaksi-sukses').DataTable();
					$('#view-transaksi-sukses').html(data);
				}
			});
		}

	});
</script>
</body>
</html>