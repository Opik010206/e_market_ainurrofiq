@extends('templates.layout')

@push('style')
    
@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pembelian</h3>

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
        <form id="formTransaksi" method="POST" action="pembelian">
          @csrf
          <div class="row">
            <div class="col-6">
              <label for="kode-pembelian" class="col-4 col-form-label col-form-label-sm">Kode Pembelian</label>
              <div class="col-8">
                <input type="text" class="form-control form-control-sm" id="kode-pembelian" name="kode_masuk" placeholder="" readonly value="{{ $kode }}">
              </div>
            </div>
            <div class="col-6">
              <label class="control-label col-md-6 col-sm-6 col-xs-12">Tanggal Pembelian</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" class="date-picker form-control col-md-7 col-xs-12" name="tanggal_masuk" value="{{ date('Y-m-d') }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <button type="button" class="btn btn-primary" id="tambahBarangBtn" data-toggle="modal" data-target="#tblBarangModal">Tambah Barang</button>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Distributor</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select name="" id="" class="form-control col-md-4 col-xs-12" name="pemasok_id" required>
                  @foreach ($pemasok as $p)
                      <option value="{{ $p->id }}">{{ $p->nama_pemasok }}</option>  
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          @include('pembelian.data')
        </form>
        
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
      @include('pembelian.form')
      {{-- @include('pembelian.formEdit') --}}
    </div>
    <!-- /.card -->

</section>
@endsection

@push('script')
    <script>
      // Notivikasi
      $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(500);
      })
      $('.alert-danger').fadeTo(10000, 500).slideUp(500, function(){
        $(".alert-danger").slideUp(500);
      })




      $('#tblBarang2').DataTable()

    // Pemilihan Barang
    $('#tblBarangModal').on('click', '.pilihBarangBtn', function() {
      tambahBarang(this);
    });

    // Change qty
    $('#tblTransaksi').on('change', '.qty', function() {
      calcSubTotal(this);
    });

  function calcSubTotal(a) {
    let qty = parseInt($(a).closest('tr').find('.qty').val());
    let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
    let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
    let subTotal = qty * hargaBarang;
    totalHarga += subTotal - subTotalAwal;
    $(a).closest('tr').find('.subTotal').val(subTotal);
    $('#totalHarga').val(totalHarga);
  }

  // Remove Barang
  $('#tblTransaksi').on('click', '.btnRemoveBarang', function(){
    let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
    totalHarga -= subTotalAwal;

    $currentRow = $(this).closest('tr').remove();
    $('#totalHarga').val(totalHarga);

    let deleteBarang = Number($('#tblTransaksi tbody').text());
    if(deleteBarang == 0)
      $('#tblTransaksi tbody').append('<tr><td colspan="6" style="text-align:center; font-style=italic">Belum Ada Data</td></tr>')
  })

  // Tambah Barang
  let totalHarga = 0;
  function tambahBarang(a) {
    let d = $(a).closest('tr');
    let kodeBarang = d.find('td:eq(1)').text();
    let namaBarang = d.find('td:eq(3)').text();
    let hargaBarang = d.find('td:eq(4)').text();
    let idBarang = d.find('idBarang').val();
    console.log(hargaBarang)
    let data = '';
    let tbody = $('#tblTransaksi tbody tr td').text();
    data += '<tr>';
    data += '<td>'+kodeBarang+'</td>';
    data += '<td>'+namaBarang+'</td>';
    data += '<td>'+hargaBarang+'</td>';
    data += '<input type="hidden" name="barang_id[]" value="'+idBarang+'">';
    data += '<input type="hidden" name="harga_beli[]" value="'+hargaBarang+'">';
    data += '<td><input type="number" value="1" min="1" class="qty" name="jumlah[]"></td>';
    data += '<td><input type="text" readonly name="sub_total[]" class="subTotal" value="'+hargaBarang+'"></td>';
    data += '<td><button type="button" class="btnRemoveBarang btn btn-danger"><span class="fas fa-times"></span></button></td>'  ;
    data += '</tr>';

      if(tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove()
        $('#tblTransaksi tbody').append(data);
        totalHarga += parseFloat(hargaBarang);
        $('#totalHarga').val(totalHarga);
        $('#tblBarangModal').modal('hide');

  }
      




      



      
    </script>
@endpush