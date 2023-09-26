<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-produk">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produk as $p)
          <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $p->nama_produk }}</td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#produkForEdit" data-nama_produk="{{ $p->nama_produk }}" data-id-produk="{{ $p->id }}"><i class="bi bi-pencil-square"></i></button>
              {{-- <form action="produk/{{ $p->id }}" method="GET" style="display: inline;">
                @csrf
                @method('GET')
              </form> --}}
              <form action="produk/{{ $p->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-nama_produk="{{ $p->nama_produk }}"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
</table>