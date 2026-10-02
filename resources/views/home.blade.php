@extends('layout.app')

@push('styles')
<style>
    .slick-prev::before,
    .slick-next::before {
        color: black;
    }

    #wrapper-slider::-webkit-scrollbar {
        display: none;
    }

    #wrapper-slider {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endpush

@section('content')

    {{-- Alert Notification --}}
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>{{ session('success') }}</div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <div>{{ session('warning') }}</div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
    </div>

    {{-- Banner Carousel --}}
    <div class="container py-4">
        <div id="carousel-sample" class="carousel slide rounded-3 overflow-hidden" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" alt="Banner 1"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStA1zREfwdFdKIgkJoGooLrFpQtrplGr88GtVKNwXeYQ&s=10" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="Banner 2"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStA1zREfwdFdKIgkJoGooLrFpQtrplGr88GtVKNwXeYQ&s=10" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="Banner 3"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStA1zREfwdFdKIgkJoGooLrFpQtrplGr88GtVKNwXeYQ&s=10" />
                </div>
            </div>
            <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    {{-- Paket Langganan --}}
<div class="container mt-4 mb-5">
    <div class="d-flex align-items-center gap-2 mb-3">
        <span class="badge bg-yellow text-yellow-fg p-2"><i class="fa-solid fa-crown"></i></span>
        <h2 class="m-0 text-dark">Paket Langganan</h2>
    </div>

    <div class="row g-4">
        @forelse ($subscriptionPackages as $package)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm"
                     style="background: linear-gradient(135deg, #ffffff 0%, {{ $package->color ?? '#f0f0f0' }} 100%);">
                    <div class="card-body text-center text-dark d-flex flex-column justify-content-between p-4">
                        <div>
                            <h2 class="fw-bold mb-0 fs-3 text-uppercase">{{ $package->name }}</h2>
                            <p class="text-muted small fw-semibold">PACKAGE</p>
                            @if(!empty($package->description))
                                <small class="text-secondary d-block mt-1">{{ $package->description }}</small>
                            @endif
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-center align-items-baseline gap-1">
                                <span class="fs-6 fw-bold">Rp</span>
                                <span class="fs-1 fw-bold text-warning" style="line-height: 1;">
                                    {{ number_format($package->price ?? 0, 0, ',', '.') }}
                                </span>
                            </div>
                            <span class="text-secondary fw-bold small d-block mt-2">/ 30 Days</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Belum ada paket langganan yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>

    {{-- Buku Baru Dirilis --}}
    <div class="container mt-4 mb-5">
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="badge bg-yellow text-yellow-fg p-2"><i class="fa-solid fa-book"></i></span>
            <h2 class="m-0 text-dark fw-bold">Buku Baru Dirilis</h2>
        </div>

        <div id="wrapper-slider" class="d-flex flex-nowrap overflow-auto pb-3 gap-3">
            @for ($i = 0; $i < 6; $i++)
                <div style="min-width: 220px; max-width: 220px;">
                    <div class="card h-100 p-3">
                        <div class="card-body p-0 text-center">
                            <img class="w-100 rounded" style="height: 200px; object-fit: contain; object-position: center;"
                                alt="Cover Buku"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8bXKNhgkj7rrxBFcoIQ5ll4bUdKHTH_dx9VF7chdckw&s=10" />
                        </div>
                        <div class="d-flex gap-2 mt-3">
                            <span class="badge bg-light text-dark border"><i class="fa-solid fa-mobile me-1"></i>PDF</span>
                            <span class="badge bg-light text-dark border">3+</span>
                        </div>
                        <div class="mt-2">
                            <span class="text-secondary small d-block">Penulis</span>
                            <h5 class="fw-bold fs-6 mb-1">Judul Buku</h5>
                            <h4 class="fs-5 fw-bold text-primary mb-0">Rp 49.000</h4>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    {{-- Buku Gratis --}}
    <div class="container mt-4 mb-5">
        <div class="d-flex align-items-center gap-2 mb-4">
            <h2 class="m-0 text-dark fw-bold">Buku Gratis</h2>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="row row-0 flex-fill">
                        <div class="col-md-4">
                            <a href="">
                                <img class="w-100 h-100 rounded-start" style="object-fit: cover; object-position: center;"
                                    alt="Cover Buku"
                                    src="{{ asset('images/vostok.png') }}" />
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body h-100 d-flex flex-column justify-content-between p-3">
                                <div>
                                    <span class="badge bg-light text-dark border mb-2"><i class="fa-solid fa-mobile text-warning me-1"></i>PDF</span>
                                    <div class="text-secondary small">
                                        Prenzesky A.
                                        <br><span class="text-dark fw-bold fs-6">How To Walk To Vostok</span>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <h4 class="m-0">
                                        <span class="text-decoration-line-through text-secondary fs-6 me-2">Rp 50.000</span>
                                        <span class="text-dark fw-bold">Rp 0</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
//Still empty though
</script>
@endpush
