@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Kegiatan</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/kegiatan"><i class="ti-write"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="/kegiatan">Kegiatan</a>
                    <li class="breadcrumb-item"><a href="#">Edit Kegiatan</a>
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
                    <h5>Edit Kegiatan</h5>
                </div>
                <form method="POST" action="/kegiatan/{{ $kegiatan->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-block">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nagari Kunjungan</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nagari_kunjungan" name="nagari_kunjungan" class="form-control @error('nagari_kunjungan') is-invalid @enderror"
                                     value="{{ old('nagari_kunjungan',$kegiatan->nagari_kunjungan) }}" required>

                                    @error('nagari_kunjungan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kegiatan</label>
                                <div class="col-sm-10">
                                    <input id="kegiatan" type="hidden" value="{{ old('kegiatan',$kegiatan->kegiatan) }}"  name="kegiatan">
                                    <trix-editor input="kegiatan"></trix-editor>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hasil</label>
                                <div class="col-sm-10">
                                    <input id="hasil" type="hidden" value="{{ old('hasil',$kegiatan->hasil) }}" name="hasil">
                                    <trix-editor input="hasil"></trix-editor>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Langkah</label>
                                <div class="col-sm-10">
                                    <input id="langkah" type="hidden" value="{{ old('langkah',$kegiatan->langkah) }}" name="langkah">
                                    <trix-editor input="langkah"></trix-editor>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rekomendasi</label>
                                <div class="col-sm-10">
                                    <input id="rekomendasi" type="hidden" value="{{ old('rekomendasi',$kegiatan->rekomendasi) }}" name="rekomendasi">
                                    <trix-editor input="rekomendasi"></trix-editor>
                                </div>
                            </div>
                        <div class="m-1">
                            <a href="/kegiatan" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                        </div>
                </form>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>

@endsection
