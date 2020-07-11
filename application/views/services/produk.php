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
					$('#daftar-produk').html('<div class="col-md-12 text-center"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading…</span></div>');
				},
				success:function (data) {
					$('#daftar-produk').html(data);
				}
			});		

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
		}
	});
</script>
</body>
</html>