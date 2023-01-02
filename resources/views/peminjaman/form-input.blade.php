@extends("blank")

@section("konten")

    <form action="{{ route("simpan_peminjaman") }}" method="post">
    @csrf
    <div class="col-lg-6", style="width: auto; margin-left: auto; margin-right: auto">
            <div class="p-5">
                <center><h3>Buat PEMINJAMAN</h3></center>
                <div class="form-group">
                    <label>Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_peminjaman" class="form-control form-control-buku" placeholder="Masukkan tanggal pemnijaman ..." required>
                </div>
                <div class="form-group">
                    <label>Judul Buku</label>
                        <select name="id_buku" class="form-control" required>
                            <option value="">-- Pilih Judul Buku --</option>
                            @foreach ($buku as $buku)
                                <option value="{{ $buku->id }}">{{ $buku->judul_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label>User</label>
                    <select name="id_user" class="form-control" required>
                        <option value="">-- Pilih Nama --</option>
                        @foreach ($user as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            <button class="btn btn-info btn-buku btn-block" type="submit">Tambah Peminjaman</button>
        </div>
    </form>


@endsection