@extends("blank")
@section("konten")

<table class="table">
    <h1>Semua Pengembalian</h1>
    <a href="{{ route('buat_pengembalian')}}", style="">Tambah pengembalian</a>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tanggal pengembalian</th>
            <th scope="col">Denda</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Nama user</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengembalian as $data)

            <td>{{$data->id}}</td>
            <td>{{$data->tanggal_pengembalian}}</td>
            <td>{{$data->denda}}</td>
            <td>{{$data->judul_buku}}</td>
            <td>{{$data->name}}</td>
            <td>
            <a href="{{ route('ubah_pengembalian', ['id' => $data->id]) }}">Edit | </a>
            <a href="{{ route('tampil_pengembalian', ['id' => $data->id]) }}">Show</a>


            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

            <form action = "{{ route('hapus_pengembalian', ['id' => $data->id])}}" method="post">
            @csrf
            @method("delete")
            <button class="btn btn-primary" type="submit" 
            onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</button>
</form></td>
        </tr>
</body>
        @endforeach
</table>
@endsection 