<div class="modal fade" id="formPelangganModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="pelanggan">
          @csrf
            <div id="method"></div>
            <div class="form-group row">
                <label for="kode_pelanggan" class="col-sm-4 col-form-label">Kode Pelanggan</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="kode_pelanggan" name="kode_pelanggan">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-4 col-form-label">Nomor Telpon</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="no_telp" name="no_telp">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
    </div>
  </div>
</div>
