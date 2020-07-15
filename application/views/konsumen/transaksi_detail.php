 <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title float-left">DETAIL TRANSAKSI #<?= $kode_transaksi ?></h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md text-center">
                    <img width="300" height="300" src="<?php 
                              if($foto == '') {
                                  echo base_url('assets/assets/img/produk/default-produk.png');
                                }else{
                                  echo base_url('assets/assets/img/produk/'.$foto);
                                }
                              ?>
                    ">
                  </div>

                  <div class="col-md">
                    <table class="table">
                      <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td><?= $nama_barang ?></td>
                      </tr>
                      
                      <tr>
                        <td>Harga Barang</td>
                        <td>:</td>
                        <td>Rp. <?= $harga ?></td>
                      </tr>

                      <tr>
                        <td>Jumlah Order</td>
                        <td>:</td>
                        <td><?= $jumlah ?></td>
                      </tr>

                      <tr>
                        <td>Jumlah Harga</td>
                        <td>:</td>
                        <td>Rp. <?= $harga_beli ?></td>
                      </tr>

                      <tr>
                        <td>Tanggal Order</td>
                        <td>:</td>
                        <td><?= $tanggal_order ?></td>
                      </tr>

                      <tr>
                        <td>Status Pembayaran</td>
                        <td>:</td>
                        <td><?= $status_transaksi ?></td>
                      </tr>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
