<script type="text/javascript">
	$(function() {
		view_barang_dijual();
		function view_barang_dijual(search) {
			
			$.ajax({
				url: '<?= site_url('konsumen/Produk/daftar_produk') ?>',
				type: 'POST',
				data:{search:search},
				beforeSend: function()
			    { 
					$('#daftar-produk').html('<div class="col-md-12 text-center"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading…</span></div>');
				},
				success:function (data) {
					$('#daftar-produk').html(data);
				}
			});		

		}
		//  -----------------------------------------------------------------------------
        //  |       PENCARIAN DATA                                                      |
        //  -----------------------------------------------------------------------------

        $('#search').keyup(function(){
            var search = $(this).val();
            if(search != '') {
                view_barang_dijual(search);
            } else {
                view_barang_dijual();
            }
        });	

        $('#daftar-produk').on('click', '.beli-produk', function() {
        	var base_url = "<?= base_url('assets/assets/img/produk/') ?>";
        	var id = $(this).attr('data-id');
        	var nama = $(this).attr('data-nama');
        	var stok = $(this).attr('data-stok');
        	var foto = $(this).attr('data-foto');
        	$('#modal-beli-produk').modal('show');

            $('#nama_barang').html(nama);
            $('[name="id"]').val(id);
            $('[name="stok"]').attr('placeholder', stok);
        	$('[name="stok"]').attr('max', stok);
        	$('#foto-produk').attr('src', base_url+foto);
        });

        $('#btn-beli').click(function() {
            if ($('[name="stok"]').val().length == 0){
                $('[name="stok"]').addClass('border-danger');
                $('[name="stok"]').focus();
                return false;
            }
            var id = $('[name="id"]').val();
            var jumlah = $('[name="stok"]').val();

            $.ajax({
                url: '<?= site_url('konsumen/Transaksi/tambah_transaksi') ?>',
                type: 'POST',
                dataType:'json',
                data:{id:id, jumlah:jumlah},
                success:function (response) {
                    $.notify({
                      icon: "nc-icon nc-bell-55",
                      message: response.message
                    }, {
                      type: response.status,
                      timer: 4000,
                      placement: {
                        from: 'top',
                        align: 'center'
                      }
                    });
                    setTimeout(function(){ 
                          window.location.href = response.redirect;
                    }, 1500);
                }
            });
            return false;
        });


	});
</script>
</body>
</html>