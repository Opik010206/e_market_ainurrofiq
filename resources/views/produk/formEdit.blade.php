<div class="modal fade" id="produkForEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="produk" class="form-buat-edit">
          @csrf
          @method("put")
            <div class="form-group row">
                <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control nama-produk-edit" id="nama_produk" data-id-produk placeholder="Nama Produk" name="nama_produk">
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
@push('script')
<script>
$("#produkForEdit").on("show.bs.modal", function (e) {
  let button = $(e.relatedTarget)
  let id = button.data("id-produk")
  let nama = button.data("nama_produk")
  let inputEdit = $(".nama-produk-edit")
  inputEdit.val(nama)

  $(".form-buat-edit").attr("action", "produk/" + id)
})


</script>
    
@endpush