@extends("blank")

@section("konten")

    ID Rak : {{ $rak->id }} <br>
    Nama : {{ $rak->nama_rak }} <br>
    Lokasi : {{ $rak->lokasi_rak }} <br>
    ID Buku : {{ $rak->id_buku }} <br>
    Ditambahkan Pada :{{ $rak->created_at }}<br>
    Diubah Pada :{{ $rak->updated_at }}<br>

@endsection