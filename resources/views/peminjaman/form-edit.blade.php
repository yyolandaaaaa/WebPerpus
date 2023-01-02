@extends("blank")

@section("konten")

    <form action="{{ route("update_peminjaman", ['id' => $data_peminjaman->id]) }}" method="post">
        @csrf
        @method("put")
        <div class="col-lg-6", style="width: auto; margin-left: auto; margin-right: auto">
            <div class="p-5">
                <center><h3>Update Peminjaman</h3></center>
                <div class="form-group">
                    <label>Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_peminjaman" class="form-control form-control-buku" value="{{$data_peminjaman->tanggal_peminjaman}}" required>
                </div>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <select name="id_buku" class="form-control form-control-user" required>
                        @foreach($data_buku_all as $data)
                          @if($data_peminjaman->id_buku == $data->id)
                          <option value="{{$data->id}}" selected>{{$data->judul_buku}}</option>
                          @else
                          <option value="{{$data->id}}" >{{$data->judul_buku}}</option>
                          @endif
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Nama User</label>
                    <select name="id_user" class="form-control form-control-user" required>
                        @foreach($data_user_all as $data)
                          @if($data_peminjaman->id_user == $data->id)
                          <option value="{{$data->id}}" selected>{{$data->name}}</option>
                          @else
                          <option value="{{$data->id}}" >{{$data->name}}</option>
                          @endif
                        @endforeach
                    </select>
                </div>
            <button class="btn btn-info btn-buku btn-block" type="submit">Update Peminjaman</button>
        </div>
    </form>


@endsection