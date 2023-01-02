@extends("blank")

@section("konten")

<form action="{{ route('simpan_pengembalian') }}" method="post">
@csrf
<div class="col-lg-6", style="width: auto; margin-left: auto; margin-right: auto">
        <div class="p-5">
            <center><h3>Tambahkan Pengembalian</h3></center>
            <div class="form-group">
                <label>Tanggal pengembalian</label>
                <input type="date" name="tanggal_pengembalian" class="form-control form-control-buku" placeholder="Masukkan tanggal pemnijaman ..." required>
            </div>
            <div class="form-group">
                <label>Denda pengembalian</label>
                <input type="text" name="denda" class="form-control form-control-buku" placeholder="Masukkan denda pengembalian ..." required>
            </div>
            <div class="form-group">
                <label>Nama Buku</label>
                <select name="id_buku" class="form-control" required>
                    <option value="">-- Pilih Judul Buku --</option>
                    @foreach ($buku as $data)
                        <option value="{{ $data->id }}">{{ $data->judul_buku }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nama User</label>
                <select name="id_user" class="form-control" required>
                    <option value="">-- Pilih Nama User --</option>
                    @foreach ($user as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
        <button class="btn btn-info btn-buku btn-block" type="submit">Tambah Pengembalian</button>
    </div>
</form>


@endsection