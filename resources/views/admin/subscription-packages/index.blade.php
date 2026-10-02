@extends('layout.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Paket Langganan</h2>
            <a href="{{ route('admin.subscription-packages.create') }}" class="btn btn-primary">
                Tambah Paket Langganan
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
                    <table id="table-paket-langganan" class="table table-bordered bg-white align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Warna</th>
                                <th>Harga</th>
                                <th style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptionPackages as $subscriptionPackage)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subscriptionPackage->name }}</td>
                                    <td>{{ $subscriptionPackage->description }}</td>
                                    <td>
                                        @if (!empty($subscriptionPackage->color))
                                            <span class="d-inline-block rounded-circle border"
                                                style="width: 24px; height: 24px; background-color: {{ $subscriptionPackage->color }};"
                                                title="{{ $subscriptionPackage->color }}">
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>Rp {{ number_format($subscriptionPackage->price ?? 0, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('admin.subscription-packages.edit', $subscriptionPackage->id) }}"
                                           class="btn btn-sm btn-warning">EDIT</a>

                                        <form action="{{ route('admin.subscription-packages.destroy', $subscriptionPackage->id) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus paket ini?')">
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table-paket-langganan').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50, 100],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>
@endpush
