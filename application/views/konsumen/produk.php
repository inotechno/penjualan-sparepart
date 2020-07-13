<div class="content">
	<div class="row mb-3">
		<div class="col-md">						
			<input type="text" placeholder="Search" id="search" class="form-control p-3">
		</div>
	</div>
	<div class="row" id="daftar-produk">
	</div>
</div>

<div class="modal fade" id="modal-beli-produk" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Beli Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<img src="" id="foto-produk" class="mb-2" alt="Card image cap">
		    <h6 id="nama_barang" class="my-2"></h6>
		    <form class="beli" method="POST">
		    	<input type="hidden" name="id">
		    	<div class="form-group form-inline mb-1">
			    	<label class="mr-3">Jumlah</label>
			    	<input type="number" name="stok" class="form-control">
		    	</div>
		    	<button class="btn btn-primary col-sm" id="btn-beli">Beli</button>
		    </form>
      </div>
    </div>
  </div>
</div>