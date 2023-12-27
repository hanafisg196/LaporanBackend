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
                <caption>Data Kunjungan</caption>
                <thead>
                    <tr>
                        <th id="columNo">No</th>
                        <th id="columnNagari">Nagari Kunjungan</th>
                        <th id="columnKegiatan">Kegiatan</th>
                        <th id="columnHasil">Hasil</th>
                        <th id="columnLangkah">Langkah</th>
                        <th id="columnRekomendasi">Rekomendasi</th>
                        <th id="columnAksi">Aksi</th>
                    </tr>
                </thead>

                @php
                function potongTeks($teks, $jumlahKata) {
                 return str_word_count($teks) > $jumlahKata ?
                implode(' ', array_slice(explode(' ', $teks), 0, $jumlahKata)) . '...' : $teks;
                 }
                @endphp

<!-- Kemudian bagian HTML templatenya -->
<tbody>
    @foreach ($data as $datas)
    <tr>
        <th scope="row">1</th>
        <td>{{ $datas['nagari_kunjungan'] }}</td>
        <td>{{ potongTeks($datas['kegiatan'], 4) }}</td>
        <td>{{ potongTeks($datas['hasil'], 4) }}</td>
        <td>{{ potongTeks($datas['langkah'], 4) }}</td>
        <td>{{ potongTeks($datas['rekomendasi'], 4) }}</td>
        <td>
            <a href="/ubah" class="ti-pencil btn btn-primary"></a>
            <form action="#" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')"></button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

            </table>
            {{$data->links()}}
        </div>
    </div>
</div>
<!-- Contextual classes table ends -->

@endsection
