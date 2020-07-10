
<script type="text/javascript">
	$(function() {
		view_barang_dijual();
		function view_barang_dijual() {
			
			$.ajax({
				url: '<?= site_url('admin/Master/data_barang_dijual') ?>',
				type: 'POST',
				success:function (data) {
					$('#view-barang-dijual').html(data);
					$('#table-barang-dijual').DataTable();
				}
			});			
		}

		$('#btn-add-barang-dijual').on('click', function() {
			if ($('[name="nama_barang_dijual"]').val().length == 0){
		        $('[name="nama_barang_dijual"]').addClass('border-danger');
		        $('[name="nama_barang_dijual"]').focus();
		        return false;
		    }
		    if ($('[name="kode_barang_dijual"]').val().length == 0){
		        $('[name="kode_barang_dijual"]').addClass('border-danger');
		        $('[name="kode_barang_dijual"]').focus();
		        return false;
		    }
		    if ($('[name="harga_barang_dijual"]').val().length == 0){
		        $('[name="harga_barang_dijual"]').addClass('border-danger');
		        $('[name="harga_barang_dijual"]').focus();
		        return false;
		    }
		    if ($('[name="stok_barang_dijual"]').val().length == 0){
		        $('[name="stok_barang_dijual"]').addClass('border-danger');
		        $('[name="stok_barang_dijual"]').focus();
		        return false;
		    }

			var formData = new FormData();
		    formData.append('kode_barang', $('[name="kode_barang_dijual"]').val()); 
		    formData.append('nama_barang', $('[name="nama_barang_dijual"]').val()); 
		    formData.append('kategori', $('[name="kategori_dijual"]').val()); 
		    formData.append('harga', $('[name="harga_barang_dijual"]').val()); 
		    formData.append('stok', $('[name="stok_barang_dijual"]').val()); 
		    formData.append('foto', $('[name="foto"]')[0].files[0]);
		   
	    	$(this).attr('disabled');
		    $.ajax({
		        url: '<?= base_url("admin/Master/add_barang")?>',
		        type: 'POST',
		        dataType: 'JSON',
		        data: formData,
		        cache: false,
		        processData: false,
		        contentType: false,

		        success: function (response) {
		            $('[name="kode_barang_dijual"]').val(); 
				    $('[name="nama_barang_dijual"]').val(); 
				    $('[name="kategori_dijual"]').val(); 
				    $('[name="harga_barang_dijual"]').val(); 
				    $('[name="stok_barang_dijual"]').val();

		            $('#modal-add-barang-dijual').modal('hide');

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
					
                    view_barang_dijual();
		        }
		    });
		    return false;
		});

		$('#view-barang-dijual').on('click', '.update-barang-dijual', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');

			$('[name="id"]').val(id);
			$('[name="nama_barang_dijual_update"]').val(nama);

			$('#modal-update-barang_dijual').modal('show');
		});

		$('#btn-update-barang-dijual').on('click', function() {
			if ($('[name="nama_barang_dijual_update"]').val().length == 0){
		        $('[name="nama_barang_dijual_update"]').addClass('border-danger');
		        $('[name="nama_barang_dijual_update"]').focus();
		        return false;
		    }
			var id = $('[name="id"]').val();
			var nama_barang_dijual = $('[name="nama_barang_dijual_update"]').val();

			$.ajax({
				url: '<?= site_url('admin/Master/edit_barang_dijual') ?>',
				type: 'POST',
				dataType: 'JSON',
				data:{id:id, nama_barang_dijual:nama_barang_dijual},
				beforeSend: function()
			    { 
			    	$("#btn-update-barang-dijual").html('<span class="fa fa-space-shuttle"></span>   sending ...');
			    },
			    success: function (response) {
			    	$("#btn-update-barang-dijual").html('Save');
			    	$('[name="id"]').val('');
					$('[name="nama_barang_dijual_update"]').val('');
                    $('#modal-update-barang-dijual').modal('hide');
			    	
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
					
                    view_barang_dijual();
                }
			});

			return false;
		});
	});
</script>
</body>
</html>