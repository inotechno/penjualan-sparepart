 <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Kategori</p>
                      <p class="card-title" id="kategori"></p><p>
                    </p></div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Lihat Detail
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Barang</p>
                      <p class="card-title" id="barang"></p><p>
                    </p></div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Lihat Detail
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">TRX Sukses</p>
                      <p class="card-title" id="trx_sukses"></p><p>
                    </p></div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Lihat Detail
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">TRX Pending</p>
                      <p class="card-title" id="trx_pending"></p><p>
                    </p></div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Lihat Detail
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md">
            <div class="card card-chart">
              <div class="card-header row">
                <div class="col-md">
                  <h5 class="card-title">GRAFIK PERTAHUN</h5>
                  <p class="card-category">Penjualan Pertahun <?= date('Y') ?></p>
                </div>
                <div class="col-md-3 m-3">
                  <select id="kategori_filter" class="form-control">
                    <option>Pilih Kategori</option>
                    <?php 
                      $kategori = $this->db->get('kategori')->result();
                      foreach ($kategori as $kt) {?>
                        <option value="<?= $kt->id ?>"><?= $kt->nama_kategori ?></option>
                      <?php }
                    ?>
                  </select>
                </div>
              </div>
              <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
              </div>
              
            </div>
          </div>
        </div>
      </div>
