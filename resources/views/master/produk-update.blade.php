<div class="modal" id="myModal{{ $d->idProduk }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sunting Produk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/master-produk/update" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-control-label">Kode Produk</label>
                            <input type="text" name="id" value="{{ $d->idProduk }}" hidden>
                            <input type="text" name="kode" class="form-control" value="{{ $d->KodeProduk }}">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" value="{{ $d->NamaProduk }}">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Biaya Labor</label>
                            <input type="text" name="labor" class="form-control" value="{{ $d->BiayaLabor }}">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Biaya Packaging</label>
                            <input type="text" name="packaging" class="form-control" value="{{ $d->Packaging }}">
                        </div>
                        <div class="col">
                            <label class="form-control-label">Biaya Sticker</label>
                            <input type="text" name="sticker" class="form-control" value="{{ $d->Sticker }}">
                        </div>
                    </div>
                    <div class="divider"></div>
                    <h4 class="text-info">
                        <center>Daftar Bahan</center>
                    </h4>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-control-label">Bahan</label>
                            <select class="select2" id="bahan{{$d->idProduk}}" style="width:100%">
                                <option selected disabled>Pilih Bahan</option>
                                @foreach ($bahan as $b)
                                    <option value="{{ $b->idBahan }}">{{ $b->NamaBahan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-control-label">Jumlah</label>
                            <input type="number" min="1" value="1" class="form-control" id="jumlah{{$d->idProduk}}">
                        </div>
                        <div class="col-md-1">
                            <label class="form-control-label">&nbsp;</label>
                            <button type="button" class="btn btn-success btn-sm form-control" onCLick="addBahan{{$d->idProduk}}()">
                                <i class="fa fa-plus"></i> Bahan</button>
                        </div>
                    </div>

                    <div id="Ingreds{{$d->idProduk}}">
                        @foreach ($resep as $r)
                            @if($r->ProdukId == $d->idProduk)
                            <div class="row" id="b{{$d->idProduk}}{{$r->BahanId}}">
                                <div class="col-md-2">
                                    <label class="form-control-label">Bahan</label>
                                    <input type="text" class="form-control" value="{{$r->NamaBahan}}" readonly>
                                    <input type="text" name="bahan[]" value="{{$r->idBahan}}" hidden>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-control-label">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah[]" value="{{$r->Kuantitas}}">
                                </div>
                                <div class="col-md-1">
                                    <label class="form-control-label">&nbsp;</label>
                                    <button type="button" class="btn btn-danger btn-sm form-control"
                                        onClick="remove{{$d->idProduk}}({{$r->BahanId}})">
                                        <i class="fa fa-remove"></i> Hapus</button>
                                </div>
                            </div>
                            @endif
                        @endforeach
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

<script>
    function addBahan{{$d->idProduk}}() {
        var id = $('#bahan' + {{$d->idProduk}}).val();
        var nama = $('#bahan' + {{$d->idProduk}} + ' option:selected').text();
        var jml = $('#jumlah' + {{$d->idProduk}}).val();
        var html = '';
        var check = '#b' + {{$d->idProduk}} + id;
        console.log(check);
        html += '<div class="row" id="b'+ {{$d->idProduk}} + id + '">';
        html += '<div class="col-md-2">';
        html += '<label class="form-control-label">Bahan</label>';
        html += '<input type="text" class="form-control" placeholder="' + nama + '" readonly>';
        html += '<input type="text" class="form-control" name="bahan[]" value="' + id + '" hidden>';
        html += '</div>';
        html += '<div class="col-md-2">';
        html += '<label class="form-control-label">Jumlah</label>';
        html += '<input type="text" class="form-control" name="jumlah[]" value="' + jml + '">';
        html += '</div>';
        html += '<div class="col-md-1">';
        html += '<label class="form-control-label">&nbsp;</label>';
        html += '<button type="button" class="btn btn-danger btn-sm form-control" onClick="remove(' + id + ')">';
        html += '<i class="fa fa-remove"></i> Hapus</button>';
        html += '</div>';
        html += '</div>';

        if ($(check).length > 0) {
            alert("Bahan sudah ada, mohon periksa kembali.")
        } else {
            $('#jumlah' + {{$d->idProduk}}).val(1);
            $('#Ingreds' + {{$d->idProduk}}).append(html);
        }
    }

    function remove{{$d->idProduk}}(id) {
        $('#b' + {{$d->idProduk}} + id).remove();
    }
</script>
