<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Customer</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/master-customer/insert" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-control-label">Nama Customer</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Diskon</label>
                            <input type="text" name="diskon" class="form-control">
                        </div>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="float:right">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-remove"></i> Close</button>
            </div>

        </div>
    </div>
</div>
