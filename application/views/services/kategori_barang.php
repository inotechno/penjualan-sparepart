
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

			    	$.toast({
					    heading: response.status,
					    text: response.message,
					    showHideTransition: 'plain',
					    icon: response.status,
					    position: 'top-left',
						stack: false
					});

                    $('#modal-add-kategori').modal('hide');
                    view_kategori();
                }
			});
			
		});
	});
</script>
</body>
</html>