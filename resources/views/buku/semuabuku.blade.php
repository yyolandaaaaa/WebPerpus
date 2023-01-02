@extends("blank")
@section("konten")

<table class="table">
    <h1>Semua Buku</h1>
    <a href="{{ route("tambahbuku") }}", style="">Tambah Buku</a>
    <thead>
        <tr>
            <th scope="col">ID Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Lokasi Buku</th>
            <th scope="col">Stok</th>
            <th scope="col">Ditambahkan Pada</th>
            <th scope="col">Diedit Pada</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_buku as $data_buku)

            <td>{{$data_buku->id}}</td>
            <td>{{$data_buku->judul_buku}}</td>
            <td>{{$data_buku->nama_rak}}</td>
            <td>{{$data_buku->stok}}</td>
            <td>{{$data_buku->created_at}}</td>
            <td>{{$data_buku->updated_at}}</td>
            <td>
            <a href="{{ route("editbuku", ["id" => $data_buku->id]) }}">Edit | </a>
            <a href="{{ route("showbuku", ["id" => $data_buku->id]) }}">Show</a>


            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

            <form action = "{{ route("hapusbuku", ['id' => $data_buku->id])}}" method="post">
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