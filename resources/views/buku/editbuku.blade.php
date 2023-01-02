@extends("blank")

@section("konten")

    <form action="{{ route('updatebuku', ['id' => $data_buku->id]) }}" method="post">
        @csrf
        @method("put")
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" value="{{ $data_buku->judul_buku }}" class="form-control form-control-user" placeholder="Masukkan Kode Buku ..." required>
        </div>
        <div class="form-group">
            <label>Lokasi Buku</label>
            <select name="id_rak" class="form-control form-control-user" required>
                      @foreach($data_rak_all as $data)
                        @if($data_buku->id == $data->id)
                        <option value="{{$data->id}}" selected>{{$data->nama_rak}}</option>
                        @else
                        <option value="{{$data->id}}" >{{$data->nama_rak}}</option>
                        @endif
                      @endforeach
            </select>
        </div>
        <div>
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $data_buku->stok }}" class="form-control form-control-user" required>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>


@endsection