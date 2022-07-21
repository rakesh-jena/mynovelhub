@extends('web')
@section('title', 'All Tags')
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')

@section('content')
<!-- Books -->
<section>
    <div class="container mt-5">
        <div class="row mb-4">
            @foreach ($tags as $g)
            <div class="col-6 col-lg-4 mb-2">
                <div class="genre-item mb-2 box-sh">
                    <a href="{{ url('tag') }}/{{ $g->id }}/{{ $g->slug }}">
                        <div class="heading">
                            <h5>{{ $g->tag }}</h5>
                        </div>
                        <div class="description">
                            <p>{{ $g->description }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @php
        $last_page = $tags->lastPage();
        $next_page = $tags->currentPage() + 1;
        $prev_page = $tags->currentPage() - 1;
        @endphp
        <div class="pagination mb-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    @if($tags->currentPage() === 1)
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="mdi mdi-page-first"></i>
                        </a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="mdi mdi-skip-previous"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ url('tags?page=1') }}">
                            <i class="mdi mdi-page-first"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ url('tags?page='.$prev_page) }}">
                            <i class="mdi mdi-skip-previous"></i>
                        </a>
                    </li>
                    @endif
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">....</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">{{ $tags->currentPage() }}</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">....</a>
                    </li>
                    
                    @if($tags->currentPage() === $last_page)
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="mdi mdi-skip-next"></i>
                        </a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="mdi mdi-page-last"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ url('tags?page=').$next_page }}">
                            <i class="mdi mdi-skip-next"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ url('tags?page='.$last_page) }}">
                            <i class="mdi mdi-page-last"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</section>

@endsection
