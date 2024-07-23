@extends('layouts.app')

@section('title', 'Profil')

@push('style')
    <!-- CSS Libraries -->
    <style>
        .card-image {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .card-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .map-container {
            margin: 20px 0;
            text-align: center;
        }
        .map-container iframe {
            width: 100%;
            height: 450px;
            border: 0;
            border-radius: 8px;
        }
        .hero-bg-image {
            background-size: cover;
            background-position: center;
        }
        .text-justify {
            text-align: justify;
        }
        @media (max-width: 768px) {
            .hero-inner {
                padding: 20px;
            }
            .hero-bg-image {
                height: 200px;
            }
            .card-header h4, .card-body p, .card-body ul {
                font-size: 14px;
            }
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="col-12 mb-4">
                <div class="hero hero-bg-image hero-bg-parallax"
                    style="background-image: url('{{ asset('img/unsplash/andre-benz-1214056-unsplash.jpg') }}'); height: 400px;">
                    <div class="hero-inner text-center text-white d-flex flex-column justify-content-center align-items-center h-100">
                        <h2>Selamat Datang Di Dashboard Admin SMP IT Poncowarno</h2>
                        <p class="lead">Anda telah berhasil masuk ke sistem kami. Selanjutnya, Anda bisa masuk mengelola data sekolah disini.</p>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">{{ $profile->title }}</h2>
                    <div class="card mt-4">
                        <div class="card-image" style="padding-top: 20px">
                            <img src="{{ asset('storage/profile/'.$profile->image) }}" class="img-fluid" alt="Profile Image">
                        </div>
                        <div class="card-header">
                            <h4>Sejarah</h4>
                        </div>
                        <div class="card-body text-justify">
                            <p>{!! nl2br(e($profile->sejarah)) !!}</p>
                        </div>
                        <div class="card-header">
                            <h4>Visi</h4>
                        </div>
                        <div class="card-body text-justify">
                            <p>{!! nl2br(e($profile->visi)) !!}</p>
                        </div>
                        <div class="card-header">
                            <h4>Misi</h4>
                        </div>
                        <div class="card-body text-justify">
                            <ul>
                                @foreach(json_decode($profile->misi, true) as $misi)
                                    <p>{!! nl2br(e($misi)) !!}</p>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <a href="{{ $profile->lokasi }}" class="btn-icon icon-left btn-success text-left">
                                <div class="alert alert-success alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Lokasi</div>
                                        Ketuk Untuk Melihat Lokasi.
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="{{ route('edit-profile') }}" class="btn btn-outline-primary btn-lg btn-icon icon-left">
                            <i class="fas fa-sign-in-alt"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
