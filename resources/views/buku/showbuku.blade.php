@extends("blank")

@section("konten")
    ID Buku : {{ $data_buku->id }}<br>
    Judul Buku :{{ $data_buku->judul_buku }}<br>
    Lokasi Buku :{{ $data_buku->lokasi_buku }}<br>
    Stok Buku :{{ $data_buku->stok }}<br>
    Ditambahkan Pada :{{ $data_buku->created_at }}<br>
    Diubah Pada :{{ $data_buku->updated_at }}<br>
@endsection