@extends("blank")

@section("konten")

    <form action="{{ route('update_pengembalian', ['id' => $data_pengembalian->id]) }}" method="post">
        @csrf
        @method("put")
        <div class="col-lg-6", style="width: auto; margin-left: auto; margin-right: auto">
            <div class="p-5">
                <center><h3>Edit Pengembalian</h3></center>
                <div class="form-group">
                    <label>Tanggal pengembalian</label>
                    <input type="date" name="tanggal_pengembalian" class="form-control form-control-buku" value="{{$data_pengembalian->tanggal_pengembalian}}" required>
                </div>
                <div class="form-group">
                    <label>Denda pengembalian</label>
                    <input type="text" name="denda" class="form-control form-control-buku" value="{{$data_pengembalian->denda}}" required>
                </div>
                <div class="form-group">
                    <label>Nama Buku</label>
                    <select name="id_buku" class="form-control form-control-user" required>
                        @foreach($data_buku_all as $data)
                          @if($data_pengembalian->id_buku == $data->id)
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
                          @if($data_pengembalian->id_user == $data->id)
                          <option value="{{$data->id}}" selected>{{$data->name}}</option>
                          @else
                          <option value="{{$data->id}}" >{{$data->name}}</option>
                          @endif
                        @endforeach
                    </select>
                </div>
            <button class="btn btn-info btn-buku btn-block" type="submit">Edit Pengembalian</button>
        </div>
    </form>

@endsection