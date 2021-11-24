<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Produk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/master-produk/insert" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-control-label">Kode Produk</label>
                            <input type="text" name="kode" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Biaya Labor</label>
                            <input type="text" name="labor" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Biaya Packaging</label>
                            <input type="text" name="packaging" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Biaya Sticker</label>
                            <input type="text" name="sticker" class="form-control">
                        </div>
                    </div>
                    <div class="divider"></div>
                    <h4 class="text-info"><center>Daftar Bahan</center></h4>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-control-label">Bahan</label>
                            <select class="select2" id="bahan" style="width:100%">
                                <option selected disabled>Pilih Bahan</option>
                                @foreach($bahan as $b)
                                    <option value="{{$b->idBahan}}">{{$b->NamaBahan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-control-label">Jumlah</label>
                            <input type="number" min="1" value="1" class="form-control" id="jumlah">
                        </div>
                        <div class="col-md-1">
                            <label class="form-control-label">&nbsp;</label>
                            <button type="button" class="btn btn-success btn-sm form-control" onCLick="addBahan()">
                            <i class="fa fa-plus"></i> Bahan</button>
                        </div>
                    </div>

                    <div id="Ingreds"></div>


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

    function addBahan(){
        var id = $('#bahan').val();
        var nama = $('#bahan option:selected').text();
        var jml  = $('#jumlah').val();
        var html = '';

        html += '<div class="row" id="b'+id+'">';
        html += '<div class="col-md-2">';
        html += '<label class="form-control-label">Bahan</label>';
        html += '<input type="text" class="form-control" placeholder="'+nama+'" readonly>';
        html += '<input type="text" class="form-control" name="bahan[]" value="'+id+'" hidden>';
        html += '</div>';
        html += '<div class="col-md-2">';
        html += '<label class="form-control-label">Jumlah</label>';
        html += '<input type="text" class="form-control" name="jumlah[]" value="'+ jml +'">';
        html += '</div>';
        html += '<div class="col-md-1">';
        html += '<label class="form-control-label">&nbsp;</label>';
        html += '<button type="button" class="btn btn-danger btn-sm form-control" onClick="remove('+id+')">';
        html += '<i class="fa fa-remove"></i> Hapus</button>';
        html += '</div>';
        html += '</div>';

        $('#jumlah').val(1);
        $('#Ingreds').append(html);
    }

    function remove(id){
        $('#b' + id).remove();
    }

</script>
