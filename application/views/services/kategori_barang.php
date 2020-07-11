
<script type="text/javascript">
	$(function() {
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

		$('#btn-add-kategori').on('click', function() {
			if ($('[name="nama_kategori"]').val().length == 0){
		        $('[name="nama_kategori"]').addClass('border-danger');
		        $('[name="nama_kategori"]').focus();
		        return false;
		    }
			var nama_kategori = $('[name="nama_kategori"]').val();

			$.ajax({
				url: '<?= site_url('admin/Master/add_kategori') ?>',
				type: 'POST',
				dataType: 'JSON',
				data:{nama_kategori:nama_kategori},
				beforeSend: function()
			    { 
			    	$("#btn-add-kategori").html('<span class="fa fa-space-shuttle"></span>   sending ...');
			    },
			    success: function (response) {
			    	$("#btn-add-kategori").html('Save');

			    	$.notify({
                      icon: "nc-icon nc-bell-55",
                      message: response.message

                    }, {
                      type: response.status,
                      timer: 8000,
                      placement: {
                        from: 'top',
                        align: 'center'
                      }
                    });

                    $('#modal-add-kategori').modal('hide');
					
                    view_kategori();
                }
			});
		});

		$('#view-kategori').on('click', '.update-kategori', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');

			$('[name="id"]').val(id);
			$('[name="nama_kategori_update"]').val(nama);

			$('#modal-update-kategori').modal('show');
		});

		$('#btn-update-kategori').on('click', function() {
			if ($('[name="nama_kategori_update"]').val().length == 0){
		        $('[name="nama_kategori_update"]').addClass('border-danger');
		        $('[name="nama_kategori_update"]').focus();
		        return false;
		    }
			var id = $('[name="id"]').val();
			var nama_kategori = $('[name="nama_kategori_update"]').val();

			$.ajax({
				url: '<?= site_url('admin/Master/edit_kategori') ?>',
				type: 'POST',
				dataType: 'JSON',
				data:{id:id, nama_kategori:nama_kategori},
				beforeSend: function()
			    { 
			    	$("#btn-update-kategori").html('<span class="fa fa-space-shuttle"></span>   sending ...');
			    },
			    success: function (response) {
			    	$("#btn-update-kategori").html('Save');
			    	$('[name="id"]').val('');
					$('[name="nama_kategori_update"]').val('');
                    $('#modal-update-kategori').modal('hide');
			    	
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
					
                    view_kategori();
                }
			});

			return false;
		});

		$('#view-kategori').on('click', '.lihat-produk-kategori', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');
			
			$('#nama_kategori').html(nama);
			$.ajax({
				url: '<?= base_url('admin/Master/get_produk_by_kategori') ?>',
				type: 'POST',
				dataType: 'JSON',
				data:{id:id},
				success:function (data) {
					var i;
					var html = '';
					var no = 1;
					for (var i = data.length - 1; i >= 0; i--) {
						html += '<tr>'+
									'<td style="width:20px">'+no+++'</td>'+
									'<td>'+data[i].kode_barang+'</td>'+
									'<td>'+data[i].nama_barang+'</td>'+
									'<td>'+data[i].stok+'</td>'+
									'<td>'+data[i].harga+'</td>'+
									'<td>'+data[i].status_barang+'</td>'+
								'</tr>';
					}
					$('#daftar_produk_kategori').html(html);
					$('#modal-lihat-produk-kategori').modal('show');
				}
			});
		});
	});
</script>
</body>
</html>