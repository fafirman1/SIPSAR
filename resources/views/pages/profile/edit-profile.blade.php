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
                    <div class="hero-inner">
                        <div class="hero align-items-center text-white">
                            <div class="hero-inner text-center">
                                <h2>Edit Profile</h2>
                                <p class="lead">Update the profile details below.</p>
                            </div>
                        </div>
                        <div class="section-body">
                            <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="title" name="title" value="{{ $profile->title }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control-file" id="image" name="image">
                                                <small>Current Image:</small>
                                                <img src="{{ asset('storage/profile/'.$profile->image) }}" alt="Profile Image" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control-file" id="logo" name="logo">
                                                <small>Current Logo:</small>
                                                <img src="{{ asset('storage/profile/'.$profile->logo) }}" alt="Logo" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sejarah" class="col-sm-2 col-form-label">Sejarah</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control custom-textarea" id="sejarah" name="sejarah" rows="10" required>{{ $profile->sejarah }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="visi" class="col-sm-2 col-form-label">Visi</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control custom-textarea" id="visi" name="visi" rows="3" required>{{ $profile->visi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="misi" class="col-sm-2 col-form-label">Misi</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control custom-textarea" id="misi" name="misi[]" rows="3" required>{{ implode("\n", json_decode($profile->misi)) }}</textarea>
                                                <small>Separate each mission with a new line.</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $profile->lokasi }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-whitesmoke text-right">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
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
