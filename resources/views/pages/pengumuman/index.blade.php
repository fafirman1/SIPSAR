@extends('layouts.app')

@section('title', 'Pengumuman')

@push('style')
<style>
    .truncate {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .expandable {
        cursor: pointer;
        color: blue;
        display: none; /* Hide by default */
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
                        <h2 class="section-title text-white">Pengumuman</h2>
                        <p class="section-lead">You can manage all Pengumuman, such as editing, deleting and more.</p>
                        <div class="section-header-button text-right">
                            <a href="{{ route('pengumuman.create') }}"
                                class="btn btn-primary">Add New</a>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        @foreach ($pengumumans as $pengumuman)
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h4>{{ $pengumuman->tittle }}</h4>
                                                </div>
                                                <div class="card-body text-justify">
                                                    <p class="content truncate" id="content-{{ $loop->index }}">{!! nl2br(e($pengumuman->isi)) !!}</p>
                                                    <span class="expandable" id="expandable-{{ $loop->index }}" onclick="toggleContent({{ $loop->index }})">Read more</span>
                                                    <br>
                                                    <br>
                                                    <a href="{{$pengumuman->lampiran}}" class="card-link">Unduh Lampiran</a>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="POST" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                            <i class="fas fa-times"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
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
    <script>
        function toggleContent(index) {
            const content = document.getElementById(`content-${index}`);
            const expandable = document.getElementById(`expandable-${index}`);

            if (content.classList.contains('truncate')) {
                content.classList.remove('truncate');
                expandable.innerText = 'Show less';
            } else {
                content.classList.add('truncate');
                expandable.innerText = 'Read more';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.content').forEach((content, index) => {
                const expandable = document.getElementById(`expandable-${index}`);

                // Temporarily remove truncation to get the full height
                content.classList.remove('truncate');
                const fullHeight = content.scrollHeight;
                content.classList.add('truncate');

                // Get the height of 5 lines
                const lineHeight = parseFloat(getComputedStyle(content).lineHeight);
                const maxHeight = lineHeight * 5;

                // Show the "Read more" link only if content is taller than max height
                if (fullHeight > maxHeight) {
                    expandable.style.display = 'inline';
                }
            });
        });
    </script>
@endpush
