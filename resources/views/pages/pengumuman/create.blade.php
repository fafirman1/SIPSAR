@extends('layouts.app')

@section('title', 'Edit Profile')

@push('style')
    <style>
        .form-group img {
            display: block;
            margin-top: 10px;
            max-width: 200px;
            height: auto;
            border-radius: 8px;
        }

        /* Custom height for the textarea */
        .custom-textarea {
            min-height: 150px; /* Adjust the height as needed */
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="col-12 mb-4">
                <div class="hero hero-bg-image hero-bg-parallax"
                     style="background-image: url('{{ asset('img/unsplash/andre-benz-1214056-unsplash.jpg') }}');">
                    <div class="hero-inner text-center text-white">
                        <h2>Tambah Pengumuman</h2>
                        <p class="lead">Insert data below.</p>
                    </div>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pengumuman Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4 row">
                                    <label for="tittle" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tittle" id="tittle" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                    <div class="col-sm-10">
                                        <textarea name="isi" id="isi" class="form-control custom-textarea" required></textarea>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="lampiran" id="lampiran" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                            </form>
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
