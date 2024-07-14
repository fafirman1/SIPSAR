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
                        <h2>Tambah Data Guru</h2>
                        <p class="lead">Insert the teacher details below.</p>
                    </div>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Teacher Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" id="nama" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nip" id="nip" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" id="email"  class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="telp" id="telp"  class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="alamat" class="form-control custom-textarea" required></textarea>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"  class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="foto" id="foto" class="form-control">
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
