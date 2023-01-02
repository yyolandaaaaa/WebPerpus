@extends("blank")
@section("konten")

<table class="table">
    <h1>Semua Pinjaman</h1>
    <a href="{{ route('buat_peminjaman')}}", style="">Tambah Peminjaman</a>
    <thead>
        <tr>
            <th scope="col">ID Peminjaman</th>
            <th scope="col">Tanggal Peminjaman</th>
            <th scope="col">Juduk Buku</th>
            <th scope="col">Nama user</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peminjaman as $data)

            <td>{{$data->id}}</td>
            <td>{{$data->tanggal_peminjaman}}</td>
            <td>{{$data->judul_buku}}</td>
            <td>{{$data->name}}</td>
            <td>
            <a href="{{ route('ubah_peminjaman', ['id' => $data->id]) }}">Edit | </a>
            <a href="{{ route('tampil_peminjaman', ['id' => $data->id]) }}">Show</a>


            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

            <form action = "{{ route('hapus_peminjaman', ['id' => $data->id])}}" method="post">
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