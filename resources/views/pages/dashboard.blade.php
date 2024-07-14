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
            height: 350px;
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
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="col-12 mb-4">
                <div class="hero hero-bg-image hero-bg-parallax"
                    style="background-image: url('{{ asset('img/unsplash/andre-benz-1214056-unsplash.jpg') }}');">
                    <div class="hero-inner">
                        <div class="hero align-items-center text-white">
                            <div class="hero-inner text-center">
                                <h2>Selamat Datang Di Dashboard Admin SMP IT Poncowarno</h2>
                                <p class="lead">Anda telah berhasil mendaftar ke sistem kami. Selanjutnya, Anda bisa masuk ke
                                    dashboard dengan akun Anda.</p>
                            </div>
                        </div>
                        <div class="section-body">
                            <h2 class="section-title text-white">{{ $profile->title }}</h2>
                            <br>
                            <div class="card">
                                <div class="card-image" style="padding-top: 50px">
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
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('edit-profile') }}" class="btn btn-outline-white btn-lg btn-icon icon-left">
                                <i class="fas fa-sign-in-alt"></i> Edit
                            </a>
                        </div>
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