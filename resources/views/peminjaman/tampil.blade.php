@extends("blank")
@section("konten")

    ID Peminjaman : {{ $peminjaman->id }}<br>
    Judul Buku :{{ $buku->judul_buku }}<br>
    Lokasi Buku :{{ $peminjaman->lokasi_buku }}<br>
    Stok Buku :{{ $peminjaman->stok }}<br>
    Ditambahkan Pada :{{ $peminjaman->created_at }}<br>
    Diubah Pada :{{ $peminjaman->updated_at }}<br>
    
@endsection