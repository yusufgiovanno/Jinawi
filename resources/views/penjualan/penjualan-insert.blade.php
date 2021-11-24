<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Bahan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/penjualan/insert" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-control-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{date("Y-m-d")}}">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Customer</label>
                            <select class="select2" name="customer" style="width:100%">
                                <option selected disabled>Pilih Customer</option>
                                @foreach($customer as $c)
                                    <option value="{{$c->idCustomer}}">{{$c->NamaCustomer}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-control-label">Keterangan</label>
                            <select class="select2" name="keterangan" style="width:100%">
                                <option selected disabled>Pilih Metode Transaksi</option>
                                @foreach($keterangan as $k)
                                    <option value="{{$k->id}}">{{$k->Keterangan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-control-label">Produk</label>
                            <select class="select2" id="produk" style="width:100%">
                                <option selected disabled>Pilih Produk</option>
                                @foreach($produk as $p)
                                    <option value="{{$p->idProduk}}">{{$p->NamaProduk}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-control-label">Jumlah</label>
                            <input type="number" id="jumlah" min="0" value="1" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <label class="form-control-label">&nbsp;</label>
                            <button type="button" class="btn btn-success form-control" onClick="addProduk()">
                                <i class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>
                    <div id="listProduk"></div>
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

<script>
    function addProduk(){
        var id = $('#produk').val();
        var nama = $('#produk option:selected').text();
        var jml  = $('#jumlah').val();
        var html = '';

        html += '<div class="row" id="p'+id+'">';
        html += '<div class="col-md-2">';
        html += '<label class="form-control-label">Bahan</label>';
        html += '<input type="text" class="form-control" placeholder="'+nama+'" readonly>';
        html += '<input type="text" class="form-control" name="produk[]" value="'+id+'" hidden>';
        html += '</div>';
        html += '<div class="col-md-2">';
        html += '<label class="form-control-label">Jumlah</label>';
        html += '<input type="number" class="form-control" name="jumlah[]" value="'+ jml +'">';
        html += '</div>';
        html += '<div class="col-md-1">';
        html += '<label class="form-control-label">&nbsp;</label>';
        html += '<button type="button" class="btn btn-danger btn-sm form-control" onClick="remove('+id+')">';
        html += '<i class="fa fa-remove"></i> Hapus</button>';
        html += '</div>';
        html += '</div>';

        $('#jumlah').val(1);
        $('#listProduk').append(html);
    }

    function remove(id){
        $('#p' + id).remove();
    }
</script>
