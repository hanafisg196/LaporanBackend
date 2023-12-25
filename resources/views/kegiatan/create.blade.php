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
                    <li class="breadcrumb-item"><a href="/kegiatan/create">Tambah Kegiatan</a>
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
                    <h5>Tambahkan Kegiatan</h5>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nagari Kunjungan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('#') is-invalid @enderror" required>

                                    @error('#')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('#') is-invalid @enderror">
                                    @error('#')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hasil</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" cols="5" class="form-control"
                                    placeholder="Default textarea"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Langkah</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" cols="5" class="form-control"
                                    placeholder="Default textarea"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rekomendasi</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" cols="5" class="form-control"
                                    placeholder="Default textarea"></textarea>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Tambahkan
                                </button>
                            </div>

                    </div>
                </form>
            </div>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>

@endsection
