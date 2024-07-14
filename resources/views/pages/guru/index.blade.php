@extends('layouts.app')

@section('title', 'Tenaga Pendidik')

@push('style')

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="col-12 mb-4">
                <div class="hero hero-bg-image hero-bg-parallax"
                    style="background-image: url('{{ asset('img/unsplash/andre-benz-1214056-unsplash.jpg') }}');">
                    <div class="hero-inner">

                        <h2 class="section-title text-white">Data Guru</h2>
                        <p class="section-lead">
                            You can manage all Teacher, such as editing, deleting and more.
                        </p>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>All Teacher</h4>
                                        <div class="section-header-button">
                                            <a href="{{route('guru.create')}}"
                                                class="btn btn-primary">Add New</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="float-right">
                                            <form method="GET" action="{{route('guru.index')}}">
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control"
                                                        placeholder="Search"
                                                        name="name">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="clearfix mb-3"></div>

                                        <div class="table-responsive">
                                            <table class="table-striped table">
                                                <tr>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>NIP</th>
                                                    <th>Telp.</th>
                                                    <th>Alamat</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach ($gurus as $guru)
                                                <tr>
                                                    <td class="py-2 px-4 border-b">
                                                        <img src="{{ asset('storage/guru/' . $guru->foto) }}" alt="{{ $guru->nama }}" width="100px" class="img-thumbnail">
                                                    </td>
                                                    <td>{{ $guru->nama }}</td>
                                                    <td>{{ $guru->nip }}</td>
                                                    <td>{{ $guru->telp }}</td>
                                                    <td>{{ $guru->alamat }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href='{{route('guru.edit', $guru->id)}}'
                                                                class="btn btn-sm btn-info btn-icon">
                                                                <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>

                                                            <form action="{{route('guru.destroy', $guru->id)}}" method="POST"
                                                                class="ml-2">
                                                                <input type="hidden" name="_method" value="DELETE"/>
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i>
                                                                    Delete
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
