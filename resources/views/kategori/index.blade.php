@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Kategori</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <div class="float-end">'
                    <a href="{{ route('printkategori') }}" class="btn btn-md btn-warning mb-3">PRINT KATEGORI</a>
                    <a href="{{ route('exportkategori') }}" class="btn btn-md btn-warning mb-3">EXPORT KATEGORI</a>
                </div>
                <a href="{{ route('kategori.create') }}" class="btn btn-md btn-success mb-3">ADD KATEGORI</a>
                <div class="row">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col" style="width:20%">
                                    ACTIONS </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $kategori->name }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                            <a href="{{ route('kategori.show', $kategori->id) }}"
                                                class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('kategori.edit', $kategori->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>@csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data kategori belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $kategoris->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('alertload')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                tittle: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                tittle: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endsection
