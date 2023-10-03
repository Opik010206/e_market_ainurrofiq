@extends('templates.layout')

@push('style')
    
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Barang</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formBarangModal">
            Tambah Barang
        </button>

        @if (session('success'))
          <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        @if ($errors->any())
          <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Peringatan!</strong> Data anda yang belum diisi.
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>  
        @endif

        @include('barang.data')
        
          
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
      @include('barang.form')
    </div>
    <!-- /.card -->

  </section>
@endsection

@push('script')
    <script>
      console.log('index')
      // Notivikasi
      // $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
      //   $(".alert-success").slideUp(500);
      // })
      // $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
      //   $(".alert-danger").slideUp(500);
      // })

      // $(function(){
      //   $('#tbl-barang').DataTable()

      // })

      // dialog hapus data Sweet Alert
      $('.btn-delete').on('click', function(e){
        let nama_barang = $(this).closest('tr').find('td:eq(0)').text();
        Swal.fire({
          icon: 'error',
          title: 'Hapus Data',
          html: `Apakah data <b>${nama_barang}</b> akan dihapus?`,
          confirmButtonText: 'Ya',
          denyButtonText: 'Tidak',
          showDenyButton: true,
          focusConfirm: false
        }).then((result) => {
          if (result.isConfirmed) $(e.target).closest('form').submit()
          else swal.close()
        })
      })

      // Form Modal
      $('#formBarangModal').on('show.bs.modal', function(e){
        console.log('halo');
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const kode_barang = btn.data('kode_barang')
        const nama_barang = btn.data('nama_barang')
        const produk_id = btn.data('produk_id')
        const satuan = btn.data('satuan')
        const harga_jual = btn.data('harga_jual')
        const stok = btn.data('stok')
        const user_id = btn.data('user_id')
        const id = btn.data('id')
        const modal = $(this)
        if(mode === 'edit'){
          modal.find('.modal-title').text('Edit Data Barang')
          modal.find('#kode_barang').val(kode_barang)
          modal.find('#nama_barang').val(nama_barang)
          modal.find('#produk_id').val(produk_id)
          modal.find('#satuan').val(satuan)
          modal.find('#harga_jual').val(harga_jual)
          modal.find('#stok').val(stok)
          modal.find('#user_id').val(user_id)
          modal.find('.modal-body form').attr('action','{{ url("barang") }}/'+id)
          console.log(id);
          modal.find('#method').html('@method("PATCH")')
        }else{
          modal.find('.modal-title').text('Input Data Barang')
          modal.find('#nama_barang').val('')
          modal.find('#method').html('')
          modal.find('.modal-body form').attr('action','{{ url("barang") }}')
        }
      })
    </script>
@endpush