<div class="modal fade" id="formBarangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="barang">
          @csrf
            <div id="method"></div>
            <div class="form-group row">
                <label for="kode_barang" class="col-sm-4 col-form-label">Kode Barang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                </div>
            </div>
            <div class="form-group row">
                <label for="produk_id" class="col-sm-4 col-form-label">Categori Produk</label>
                <div class="col-sm-8">
                  <select class="form-control" name="produk_id" id="produk_id">
                    <option selected disabled>Pilih Produk Anda</option>
                    @foreach ($produk as $p => $label)
                        <option value="{{ $p }}">{{ $label }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="satuan" name="satuan">
                </div>
            </div>
            <div class="form-group row">
                <label for="harga_jual" class="col-sm-4 col-form-label">Harga Jual</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="harga_jual" name="harga_jual">
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="stok" name="stok">
                </div>
            </div>
            {{-- <div class="form-group row">
                <label for="ditarik" class="col-sm-4 col-form-label">Ditarik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="ditarik" name="ditarik">
                </div>
            </div> --}}
            <div class="form-group row">
                <label for="user_id" class="col-sm-4 col-form-label">User</label>
                <div class="col-sm-8">
                  <select class="form-control" name="user_id" id="user_id">
                    <option selected disabled>Pilih User</option>
                    @foreach ($users as $p => $label)
                        <option value="{{ $p }}">{{ $label }}</option>
                    @endforeach
                  </select>
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
