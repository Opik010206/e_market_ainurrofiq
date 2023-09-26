<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-pelanggan">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kode Pelanggan</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Alamat</th>
        <th scope="col">Nomor Telpon</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pelanggan as $p)
          <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $p->kode_pelanggan }}</td>
            <td>{{ $p->nama_pelanggan }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->no_telp }}</td>
            <td>{{ $p->email }}</td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-mode="edit" data-target="#formPelangganModal" 
               data-id="{{ $p->id }}"
               data-nama_pelanggan="{{ $p->nama_pelanggan }}"
               data-kode_pelanggan="{{ $p->kode_pelanggan }}"
               data-alamat="{{ $p->alamat }}"
               data-no_telp="{{ $p->no_telp }}"
               data-email="{{ $p->email }}"
               ><i class="bi bi-pencil-square"></i></button>
              {{-- <form action="pelanggan/{{ $p->id }}" method="GET" style="display: inline;">
                @csrf
                @method('GET')
              </form> --}}
              <form action="pelanggan/{{ $p->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-nama_pelanggan="{{ $p->nama_pelanggan }}"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>