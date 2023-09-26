<div class="modal fade" id="tblBarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tblBarang2" class="table table-stripped table-compact">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Barang</th>
              <th>User</th>
              <th>Nama Barang</th>
              <th>Harga Barang</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barang as $b)
                <tr>
                  <td>{{ $i = (!isset($i)?1:++$i) }}
                    <input type="hidden" class="idBarang" name="idBarang" value="{{ $b->id }}">
                  </td>
                  <td>{{ $b->kode_barang }}</td>
                  <td>{{ $b->user->name }}</td>
                  <td>{{ $b->nama_barang }}</td>
                  <td>{{ $b->harga_jual }}</td>
                  <td><button class="pilihBarangBtn">Pilih</button></td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
