@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">User</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/user"><i class="ti-id-badge"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="/user">User</a>
                    <li class="breadcrumb-item"><a href="#">Edit User</a>
                    </li>
        </ul>
    </div>
</div>



<div class="page-body">
    <div class="row">
        <div class="col-sm-12">

            <!-- Basic Form Inputs card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Editkan User</h5>
                </div>
                <form method="POST" action="/user/{{ $user->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-block">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror"
                                     value="{{ old('username',$user->username) }}" required autofocus>

                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <label class="col-sm-1 col-form-label">Password</label>
                                <div class="col-sm-5">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                     value="{{ old('password') }}" required>

                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-4">
                                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama',$user->nama) }}" required>

                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <label class="col-sm-1 col-form-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                     value="{{ old('email',$user->email) }}" required>

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Posisi</label>
                                <div class="col-sm-4">
                                    <input type="text" id="posisi" name="posisi" class="form-control @error('posisi') is-invalid @enderror"
                                     value="{{ old('posisi',$user->posisi) }}" required>

                                    @error('posisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <label class="col-sm-1 col-form-label">Jabatan</label>
                                <div class="col-sm-5">
                                    <input type="text" id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                                     value="{{ old('jabatan',$user->jabatan) }}" required>

                                    @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-4">
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror"
                                     value="{{ old('kecamatan',$user->kecamatan) }}" required>

                                    @error('kecamatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <label class="col-sm-1 col-form-label">Kabupaten/Kota</label>
                                <div class="col-sm-5">
                                    <input type="text" id="kabupaten_kota" name="kabupaten_kota" class="form-control @error('kabupaten_kota') is-invalid @enderror"
                                     value="{{ old('kabupaten_kota',$user->kabupaten_kota) }}" required>

                                    @error('kabupaten_kota')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-4">
                                    <input type="text" id="provinsi" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror"
                                     value="{{ old('provinsi',$user->provinsi) }}" required>

                                    @error('provinsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <label class="col-sm-1 col-form-label">Role</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="role" value="{{ old('role',$user->role) }}" name="role">
                                        <option selected>admin</option>
                                        <option>user</option>
                                    </select>
                                </div>
                            </div>

                        <div class="m-1">
                            <a href="/user" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        </div>
                </form>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>

@endsection
