<table class="mt-2 table table-sm table-hover table-stripped table-bordered" id="tbl-user">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama User</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $p)
          <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $p->name }}</td>
            <td>{{ $p->email }}</td>
            <td>
              <button type="button" class="btn btn-info" data-mode="edit" data-toggle="modal" data-target="#formUserModal"
                data-id="{{ $p->id }}"
                data-name="{{ $p->name }}"
                data-email="{{ $p->email }}"
                data-password="{{ $p->password }}"
              ><i class="bi bi-pencil-square"></i></button>
              {{-- <form action="user/{{ $p->id }}" method="GET" style="display: inline;">
                @csrf
                @method('GET')
              </form> --}}
              <form action="user/{{ $p->id }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-nama_user="{{ $p->name }}"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>