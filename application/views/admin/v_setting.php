<div class="content">
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Setting Wesite</h4>
                    </div>
                    
                    <div class="card-body">

                        <?php echo form_open_multipart('barang/add') ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Provinsi</h5>
                                    <select name="provinsi" class="form-control"></select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Kota</h5>
                                    <select name="kota" class="form-control"></select>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>