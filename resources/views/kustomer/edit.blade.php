@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kustomer</h1>
        <ol class="breadcrumb mb4">
            <li class="breadcrumb-item"><a href="/kustomers">Kustomer
                </a></li>
            <li class="breadcrumb-item active">Edit Data Kustomer</li>
        </ol>
        <div class="card mc-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm rounded">
                            <div class="card-body">
                                <form action="{{ route('kustomer.update', $kustomer->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label class="font-weightbold">NIK</label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                            name="nik" value="{{ old('nik', $kustomer->nik) }}"
                                            placeholder="Masukkan NIK">
                                        <!-- error message untuk nik -->
                                        @error('nik')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weightbold">NAMA</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $kustomer->name) }}"
                                            placeholder="Masukkan Nama Kustomer">
                                        <!-- error message untuk name -->
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weightbold">TELEPPN</label>
                                        <input type="text" class="form-control @error('telp') is-invalid @enderror"
                                            name="telp" value="{{ old('telp', $kustomer->telp) }}"
                                            placeholder="Masukkan TELEPON">
                                        <!-- error message untuk telp -->
                                        @error('telp')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weightbold">EMAIL</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email', $kustomer->email) }}"
                                            placeholder="Masukkan EMAIL">
                                        <!-- error message untuk email -->
                                        @error('email')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weightbold">ALAMAT</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            name="alamat" value="{{ old('alamat', $kustomer->alamat) }}"
                                            placeholder="Masukkan Nama ALAMAT">
                                        <!-- error message untuk alamat -->
                                        @error('alamat')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btnmd btn-primary me-3">UPDATE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('alertload')
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bu
                                                                                                                                                    ndle.min.js">
    </script>
    <script src="https://cdn.ckeditor.com/4.24.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
