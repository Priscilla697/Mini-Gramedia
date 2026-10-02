@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Kategori Buku</h2>
            <a href="{{ route('admin.book-categories.create') }}" class="btn btn-primary">
                Tambah Kategori Buku
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-kategori" class="table table-bordered bg-white align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Kategori</th>
                                <th style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookCategorys as $bookCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bookCategory->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.book-categories.edit', $bookCategory->id) }}"
                                           class="btn btn-sm btn-warning">EDIT</a>

                                        <form action="{{ route('admin.book-categories.destroy', $bookCategory->id) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?')">
                                                HAPUS
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-kategori').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50, 100],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>
@endpush
