
<script type="text/javascript">

	$(function() {

		count();
		get_chart();
		chart();

		function count() {
			
			$.ajax({
				url: '<?= site_url($this->session->userdata('link').'/Dashboard/count') ?>',
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					$('#kategori').html(data.kategori);
					$('#barang').html(data.barang);
					$('#trx_sukses').html(data.trx_sukses);
					$('#trx_pending').html(data.trx_pending);
				}
			});
		}

		$('#kategori_filter').on('change', function() {
			var kategori = $(this).val();
			get_chart(kategori);	
		});

		function get_chart(kategori) {
			var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
			$.ajax({
				url: '<?= site_url($this->session->userdata('link').'/Dashboard/chartPenjualan') ?>',
				type: 'POST',
				dataType: 'JSON',
				async:true,
				data:{kategori:kategori},
				success:function (data) {
		  			var total = [];
			        var label = [];
			        for (var i in data) {
			            total.push(data[i].total);
			            label.push(bulan[data[i].bulan-1]);
			        };
			        chart(total, label);
				}
			});
			return false;
		}
		
		function chart(total, label) {
		    var speedCanvas = document.getElementById("speedChart");

		    var dataFirst = {
		      data: total,
		      fill: false,
		      borderColor: '#fbc658',
		      backgroundColor: 'transparent',
		      pointBorderColor: '#fbc658',
		      pointRadius: 4,
		      pointHoverRadius: 4,
		      pointBorderWidth: 8,
		    };

		    var speedData = {
		      labels: label,
		      datasets: [dataFirst]
		    };

		    var chartOptions = {
		      legend: {
		        display: false,
		        position: 'top'
		      }
		    };

		    var lineChart = new Chart(speedCanvas, {
		      type: 'line',
		      hover: false,
		      data: speedData,
		      options: chartOptions
		    });

		}

	});
</script>
</body>
</html>