<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-barang">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kode Barang</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Categori Produk</th>
        <th scope="col">Satuan</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Stok</th>
        <th scope="col">Ditarik</th>
        <th scope="col">User</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($barang as $p)
          {{-- Kode Barang --}}
          <tr class="text-center">
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $p->kode_barang }}</td>
            <td>{{ $p->nama_barang }}</td>
            <td>{{ $p->produk->nama_produk }}</td>
            <td>{{ $p->satuan }}</td>
            <td>{{ $p->harga_jual }}</td>
            <td>{{ $p->stok }}</td>
            <td>{{ $p->ditarik }}</td>
            <td>{{ $p->user->name }}</td>
            <td>
              <button type="button" class="btn btn-info" data-mode="edit" data-toggle="modal" data-target="#formBarangModal"
                data-id="{{ $p->id }}" 
                data-kode_barang="{{ $p->kode_barang }}"
                data-nama_barang="{{ $p->nama_barang }}"
                data-produk_id="{{ $p->produk_id }}"
                data-satuan="{{ $p->satuan }}"
                data-harga_jual="{{ $p->harga_jual }}"
                data-stok="{{ $p->stok }}"
                data-user_id="{{ $p->user_id }}"
                ><i class="bi bi-pencil-square"></i></button>
              {{-- <form action="barang/{{ $p->id }}" method="GET" style="display: inline;">
                @csrf
                @method('GET')
              </form> --}}
              <form action="barang/{{ $p->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-id="{{ $p->id }}"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>


{{-- @push('script')
  <script>
    
  </script>
@endpush --}}