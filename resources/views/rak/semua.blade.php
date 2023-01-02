@extends("blank")
@section("konten")

<table class="table">
    <h1>Semua Rak</h1>
    <a href="{{ route("buatrak") }}", style="">Tambah Rak</a>
    <thead>
        <tr>
            <th scope="col">ID Rak</th>
            <th scope="col">Nama Rak</th>
            <th scope="col">Lokasi Rak</th>
            <th scope="col">Ditambahkan Pada</th>
            <th scope="col">Diedit Pada</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $rak)

        <td>{{ $rak->id }} </td>
        <td>{{ $rak->nama_rak }} </td>
        <td>{{ $rak->lokasi_rak }} </td>
        <td>{{ $rak->created_at }}</td>
        <td>{{ $rak->updated_at }}</td>
        <td>
            <a href="{{ route("ubahrak", ["id" => $rak->id]) }}">Edit</a>
            <a href="{{ route("tampilrak", ["id" => $rak->id]) }}">Show</a>

            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

            <form action = "{{ route("hapusrak", ['id' => $rak->id])}}" method="post">
            @csrf
            @method("delete")
            <button class="btn btn-primary" type="submit" 
            onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</button>
    </form>
        </td>
            </tr>
</body>
        @endforeach
</table>
@endsection 