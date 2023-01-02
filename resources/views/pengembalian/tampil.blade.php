@extends("blank")
@section("konten")

    ID pengembalian : {{ $pengembalian->id }}<br>
    Judul Buku :{{ $pengembalian->tanggal_pengembalian }}<br>
    Lokasi Buku :{{ $pengembalian->denda }}<br>
    Stok Buku :{{ $pengembalian->id_buku }}<br>
    Stok Buku :{{ $pengembalian->id_user }}<br>
    Ditambahkan Pada :{{ $pengembalian->created_at }}<br>
    Diubah Pada :{{ $pengembalian->updated_at }}<br>
    
@endsection