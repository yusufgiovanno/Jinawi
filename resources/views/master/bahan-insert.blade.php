<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Bahan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/master-bahan/insert" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-control-label">Kode Bahan</label>
                            <input type="text" name="kb" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Nama Bahan</label>
                            <input type="text" name="nb" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-control-label">Berat</label>
                            <input type="number" name="brt" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Harga</label>
                            <input type="text" name="hrg" class="form-control">
                        </div>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="float:right">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-remove"></i> Tutup</button>
            </form>
            </div>

        </div>
    </div>
</div>
