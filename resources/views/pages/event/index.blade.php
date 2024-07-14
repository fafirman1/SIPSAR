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
    .card-body {
        display: flex;
        align-items: center;
    }
    .author-box-left {
        flex: 0 0 200px;
    }
    .author-box-details {
        flex: 1;
    }
    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
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
                <div class="hero hero-bg-image hero-bg-parallax" style="background-image: url('{{ asset('img/unsplash/andre-benz-1214056-unsplash.jpg') }}');">
                    <div class="hero-inner">

                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h2 class="section-title text-white">Event</h2>
                                    <p class="section-lead">You can manage all Event, such as editing, deleting and more.</p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="{{ route('event.create') }}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                        </div>
                        <br>

                        @foreach ($events as $event )
                        <div class="section-body">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ $event->tittle }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/event/' . $event->foto) }}" alt="Example Image" class="img-fluid">
                                            {{$event->created_at}}
                                        </div>
                                        <div class="col-md-8 text-justify">
                                            <p class="content truncate" id="content-{{ $loop->index }}">{{ $event->content }}</p>
                                            <span class="expandable" id="expandable-{{ $loop->index }}" onclick="toggleContent({{ $loop->index }})">Read more</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke">
                                    <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

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
<!-- Add any additional scripts if necessary -->
@endpush
