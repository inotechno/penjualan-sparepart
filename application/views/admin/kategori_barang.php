        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Kategori Barang</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Master</a></li>
                                    <li class="active">Kategori Barang</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kategori Barang</strong>
                                <button class="btn btn-success btn-sm float-right" id="add-kategori" data-target="#modal-add-kategori" data-toggle="modal">+</button>
                            </div>
                            <div class="card-body">
                                <table id="table-kategori" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 15px;">No</th>
                                            <th>Name</th>
                                            <th style="width: 30%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="view-kategori">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <div class="modal fade" id="modal-add-kategori">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-add-kategori" method="POST">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="btn-add-kategori" class="btn btn-primary">Save</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
