@extends("blank")
@section("konten")


@if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif


<form action="{{ route("user_update", ['id' => $id]) }}" method="post">
@csrf
@method("put")
<center>
<div class="col-lg-6">
    <div class="p-5">
        
        <h3>Edit User</h3>
        <div class="form-group">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control form-control-user" value="{{$user->name}}" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control form-control-user" value="{{$user->password}}" required>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control form-control-user" value="{{$user->jurusan}}" required>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control form-control-user" required>
                    @if ($user->jenis_kelamin == "Laki-laki")
                    <option value="Laki-laki" selected>Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    @else
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan" selected>Perempuan</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label>No Telpon</label>
                <input type="text" name="notelp" class="form-control form-control-user" value="{{$user->notelp}}" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control form-control-user" value="{{$user->alamat}}" required>
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control form-control-user" required>
                    @if ($user->jenis_kelamin == "Admin")
                    <option value="Admin" selected>Admin</option>
                    <option value="User">User</option>
                    @else
                    <option value="Admin">Admin</option>
                    <option value="User" selected>User</option>
                    @endif
                </select>
            </div>
        <button class="btn btn-success btn-user btn-block" type="submit">Update</button>
    </div>
</div>
</center>
</form>
@endsection