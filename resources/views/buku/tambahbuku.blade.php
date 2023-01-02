@extends("blank")

@section("konten")

    <form action="{{ route("simpanbuku") }}" method="post">
        @csrf
        <div class="col-lg-6", style="width: auto; margin-left: auto; margin-right: auto">
            <div class="p-5">
                <center><h3>TAMBAHKAN BUKU</h3></center>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control form-control-buku" placeholder="Masukkan judul buku ..." required>
                </div>
                <div class="form-group">
                    <label>Lokasi Buku</label>
                    <select name="lokasi_buku" class="form-control form-control-buku" required>
                    @foreach($data_rak_all as $data)
                        <option value="{{$data->id}}" >{{$data->nama_rak}}</option>
                    @endforeach
                    </select>
                 </div>
                 <div class="form-group">
                    <label>Stok Buku</label>
                    <input type="number" name="stok" class="form-control" required>
                 </div>
                <button class="btn btn-info btn-buku btn-block" type="submit">Tambah Buku</button>
            </div>
        </div>
 
    </form>


@endsection