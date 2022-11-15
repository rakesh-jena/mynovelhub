@extends('web')
@section('title', 'All Genre')
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')

@section('content')
<!-- Books -->
<section>
    <div class="container mt-5">
        <div class="row mb-4">
            @foreach ($genres as $g)
            <div class="col-12 col-lg-4 col-sm-6 mb-2">
                <div class="genre-item mb-2 box-sh">
                    <a href="{{ url('genre') }}/{{ $g->id }}/{{ $g->slug }}">
                        <div class="heading">
                            <h5>{{ $g->genre }}</h5>
                        </div>
                        <div class="description">
                            <p>{{ $g->description }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
