@extends('tampilan.main')
@section('content')

<!-- Contextual classes table starts -->
<div class="card">
    <div class="card-header">
        <h5>Tabel Kegiatan</h5>
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
        <a href="/kegiatan/create" class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Tambah</a>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nagari Kunjungan</th>
                        <th>Kegiatan</th>
                        <th>Hasil</th>
                        <th>Langkah</th>
                        <th>Rekomendasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-active">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>
                            <a href="/ubah" class="ti-pencil btn btn-primary"></a>
                            <form action="#" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>
                            <a href="/ubah" class="ti-pencil btn btn-primary"></a>
                            <form action="#" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr class="table-success">
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>
                            <a href="/ubah" class="ti-pencil btn btn-primary"></a>
                            <form action="#" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Larry</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>the Bird</td>
                        <td>
                            <a href="/ubah" class="ti-pencil btn btn-primary"></a>
                            <form action="#" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr class="table-warning">
                        <th scope="row">5</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                            <a href="/ubah" class="ti-pencil btn btn-primary"></a>
                            <form action="#" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                            <a href="/ubah" class="ti-pencil btn btn-primary"></a>
                            <form action="#" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')">
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Contextual classes table ends -->

@endsection
