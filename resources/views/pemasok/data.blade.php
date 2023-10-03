<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-pemasok">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama pemasok</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pemasok as $p)
          <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $p->nama_pemasok }}</td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#formPemasokModal" data-nama_pemasok="{{ $p->nama_pemasok }}" data-id="{{ $p->id }}" data-mode="edit"><i class="bi bi-pencil-square"></i></button>
              {{-- <form action="pemasok/{{ $p->id }}" method="GET" style="display: inline;">
                @csrf
                @method('GET')
              </form> --}}
              <form action="pemasok/{{ $p->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-delete" data-nama_pemasok="{{ $p->nama_pemasok }}"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>

@push('script')
  <script>
    
  </script>
@endpush