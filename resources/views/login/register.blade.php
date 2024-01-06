@extends('tampilan.main')
@section('content')

<!-- Contextual classes table starts -->
<div class="card">
    <div class="card-header">
        <h5>Tabel User</h5>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="fa fa-chevron-left"></i></li>
                <li><i class="fa fa-window-maximize full-card"></i></li>
                <li><i class="fa fa-minus minimize-card"></i></li>
                <li><i class="fa fa-refresh reload-card"></i></li>
                <li><i class="fa fa-times close-card"></i></li>
            </ul>
        </div>
    </div>
    <div class="text-right mr-4">
        <a href="/user/create" class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Tambah</a>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <caption>Data User</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Posisi</th>
                        <th>Jabatan</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten/Kota</th>
                        <th>Provinsi</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                @php $no = 1; @endphp

                    <!-- Kemudian bagian HTML templatenya -->
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $user['username'] }}</td>
                            <td>{{ $user['nama'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['posisi'] }}</td>
                            <td>{{ $user['jabatan'] }}</td>
                            <td>{{ $user['kecamatan'] }}</td>
                            <td>{{ $user['kabupaten_kota'] }}</td>
                            <td>{{ $user['provinsi'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td>
                                <a href="/user/{{ $user->id }}/edit" class="ti-pencil btn btn-primary"></a>
                                <form action="/user/{{ $user->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

            </table>
            {{-- {{$data->links()}} --}}
        </div>
    </div>
</div>
<!-- Contextual classes table ends -->

@endsection
