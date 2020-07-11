 <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title float-left">DAFTAR KATEGORI</h4>
                 <button class="btn btn-sm btn-success float-right align-middle" data-target="#modal-add-kategori" data-toggle="modal"><span class="fa fa-plus"></span> New</button>
              </div>
              <div class="card-body">
                <div class="table-responsive p-2">
                  <table class="table" id="table-kategori">
                    <thead class="text-primary">
                      <th style="width: 5%">
                        No
                      </th>
                      <th>
                        Nama Kategori
                      </th>
                      <th style="width: 25%">
                        Action
                      </th>

                    </thead>
                    <tbody id="view-kategori">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

    <div class="modal fade" id="modal-add-kategori" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-add-kategori" method="post">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control">
                </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn-add-kategori">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-update-kategori" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-update-kategori" method="post">
                <input type="hidden" name="id">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori_update" class="form-control">
                </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn-update-kategori">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-lihat-produk-kategori" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Daftar Produk Kategori <span id="nama_kategori"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Stok Barang</th>
                  <th>Harga Barang</th>
                  <th>Status</th>
                </thead>
                <tbody id="daftar_produk_kategori"></tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>