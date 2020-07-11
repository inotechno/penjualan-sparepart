 <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title float-left">DAFTAR PRODUK DI JUAL</h4>
                 <button class="btn btn-sm btn-success float-right align-middle" data-target="#modal-add-barang-dijual" data-toggle="modal"><span class="fa fa-plus"></span> New</button>
              </div>
              <div class="card-body">
                <div class="table-responsive p-2">
                  <table class="table" id="table-barang-dijual">
                    <thead class="text-primary">

                      <th>Foto</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Aksi</th>

                    </thead>
                    <tbody id="view-barang-dijual">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

    <div class="modal fade" id="modal-add-barang-dijual" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-add-barang-dijual" method="post">
              <div class="row">
                <div class="col-md-3 align-middle">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail img-circle img-raised">
                    <img src="<?= base_url('assets/assets/img/produk/produk-default.png') ?>" alt="..." rel="nofollow">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                      <div>
                      <span class="btn btn-raised btn-sm btn-round btn-default btn-file">
                          <span class="fileinput-new">Pilih</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="foto" /></span>
                          <br />
                          <a href="javascript:;" class="btn btn-danger btn-round btn-sm fileinput-exists" data-dismiss="fileinput"></i> Hapus</a>
                      </div>
                  </div>
                </div>
                <div class="col-md">

                  <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" name="kode_barang_dijual" class="form-control form-control-sm">
                  </div>
                  <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="nama_barang_dijual" class="form-control form-control-sm">
                  </div>

                </div>

                <div class="col-md">
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control form-control-sm" name="kategori_barang_dijual">
                      <?php 
                        $kategori = $this->db->get('kategori')->result();
                        foreach ($kategori as $kat) {?>
                          <option value="<?= $kat->id ?>"><?= $kat->nama_kategori ?></option>
                        <?php }
                      ?>
                    </select>
                  </div>

                  <div class="form-group row">
                    <div class="col-md">
                      <label>Harga</label>
                      <input type="number" name="harga_barang_dijual" class="form-control form-control-sm">
                    </div>
                    <div class="col-md">
                      <label>Stok</label>
                      <input type="number" name="stok_barang_dijual" class="form-control form-control-sm">
                    </div>
                  </div>

                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn-add-barang-dijual">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-update-barang-dijual" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-update-barang-dijual" method="post">
              <div class="row">
                <div class="col-md-3 align-middle">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-circle img-raised">
                      <img src="" class="foto-preview" rel="nofollow">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                    <div>
                      <span class="btn btn-raised btn-sm btn-round btn-default btn-file">
                      <span class="fileinput-new">Pilih</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="foto_update"/></span>
                      <br />
                      <a href="javascript:;" class="btn btn-danger btn-round btn-sm fileinput-exists" data-dismiss="fileinput"></i> Hapus</a>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <input type="hidden" name="id_barang_dijual">
                  <input type="hidden" name="foto_barang_dijual">
                  <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" name="kode_barang_dijual_update" class="form-control form-control-sm">
                  </div>
                  <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="nama_barang_dijual_update" class="form-control form-control-sm">
                  </div>

                </div>

                <div class="col-md">
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control form-control-sm" name="kategori_barang_dijual_update">
                      <?php 
                        $kategori = $this->db->get('kategori')->result();
                        foreach ($kategori as $kat) {?>
                          <option value="<?= $kat->id ?>"><?= $kat->nama_kategori ?></option>
                        <?php }
                      ?>
                    </select>
                  </div>

                  <div class="form-group row">
                    <div class="col-md">
                      <label>Harga</label>
                      <input type="number" name="harga_barang_dijual_update" class="form-control form-control-sm">
                    </div>
                    <div class="col-md">
                      <label>Stok</label>
                      <input type="number" name="stok_barang_dijual_update" class="form-control form-control-sm">
                    </div>
                  </div>

                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn-update-barang-dijual">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    