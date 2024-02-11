@extends('web')
@if(Request::is('genre*'))
@section('title', $genre->genre.' | Read '.$genre->genre.' novels')
@elseif(Request::is('tag*'))
@section('title', $tag->tag.' | Read '.$tag->tag.' novels')
@else
@section('title', 'All Books')
@endif
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')

@section('content')
<!-- Filters -->
@php
$filter_status = session('filter_status', '');
$filter_order = session('filter_order', 'page_view');
@endphp
<section class="mb-sm-4 mt-sm-4 mb-2 mt-2 books-filter-section">
    <div class="container">
        <form class="filter_form box-sh text-center" action="novels" method="post">
            @csrf
            <div class="g_hr">
                <h4 class="ff_h mb-2">Filter By</h4>
            </div>
            <div class="clearfix mb-4">
                {{-- <fieldset class="ff_field d-none btn-group btn-group-toggle" data-toggle="buttons">
                    <legend class="ff_l">Content type</legend>
                    
                    <label class="m-radio-tag btn btn-secondary mr-2 btn-rounded btn-sm">
                        <input class="ff_in" type="radio" name="sourceType" value="0" checked="true">
                        <strong class="bsbb">All</strong>
                    </label>
                    <label class="m-radio-tag btn btn-secondary btn-rounded btn-sm">
                        <input class="ff_in" type="radio" name="sourceType" value="1">
                        <strong class="bsbb">Translation</strong>
                    </label>
                    
                </fieldset> --}}
                <fieldset class="ff_field btn-group btn-group-toggle" data-toggle="buttons">
                    <legend class="ff_l">Content Status</legend>
                    
                    <label class="m-radio-tag btn btn-secondary mr-2 btn-rounded btn-sm {{ $filter_status == '' ? 'active' : '' }}">
                        <input class="ff_in" onchange='this.form.submit();' type="radio" name="status" value="" {{ $filter_status == '' ? 'checked="true"' : '' }}>
                        <strong class="bsbb">All</strong>
                    </label>
                    <label class="m-radio-tag btn btn-secondary mr-2 btn-rounded btn-sm {{ $filter_status == 'complete' ? 'active' : '' }}">
                        <input class="ff_in" onchange='this.form.submit();' type="radio" name="status" value="complete" {{ $filter_status == 'complete' ? 'checked="true"' : '' }}>
                        <strong class="bsbb">Completed</strong>
                    </label>
                    <label class="m-radio-tag btn btn-secondary btn-rounded btn-sm {{ $filter_status == 'ongoing' ? 'active' : '' }}">
                        <input class="ff_in" onchange='this.form.submit();' type="radio" name="status" value="ongoing" {{ $filter_status == 'ongoing' ? 'checked="true"' : '' }}>
                        <strong class="bsbb">Ongoing</strong>
                    </label>
                
                </fieldset>
            </div>
            <div class="g_hr">
                <h4 class="ff_h">Sort By</h4>
            </div>
            <fieldset class="ff_field btn-group btn-group-toggle" data-toggle="buttons">
                <legend></legend>
                <label class="m-radio-tag btn btn-secondary mr-2 btn-rounded btn-sm {{ $filter_order == 'page_view' ? 'active' : '' }}">
                    <input class="ff_in" onchange='this.form.submit();' type="radio" name="orderBy" value="page_view" {{ $filter_order == 'page_view' ? 'checked="true"' : '' }}>
                    <strong class="bsbb">Popular</strong>
                </label>
                <label class="m-radio-tag btn btn-secondary mr-2 btn-rounded btn-sm {{ $filter_order == 'rating' ? 'active' : '' }}">
                    <input class="ff_in" onchange='this.form.submit();' type="radio" name="orderBy" value="rating" {{ $filter_order == 'rating' ? 'checked="true"' : '' }}>
                    <strong class="bsbb">Rating</strong>
                </label>
                <label class="m-radio-tag btn btn-secondary btn-rounded btn-sm {{ $filter_order == 'ch_updated' ? 'active' : '' }}">
                    <input class="ff_in" onchange='this.form.submit();' type="radio" name="orderBy" value="ch_updated" {{ $filter_order == 'ch_updated' ? 'checked="true"' : '' }}>
                    <strong class="bsbb">Updated</strong>
                </label>
            </fieldset>
        </form>
    </div>
</section>

<!-- Books -->
<section class="books-list-section">
    <div class="container">
        @if(Request::is('genre*'))
        <div class="box-sh mb-3 genre-desc">
            <h3>{{ $genre->genre }}</h3>
            <p>{{ $genre->description }}</p>
        </div>
        @elseif(Request::is('tag*'))
        <div class="box-sh mb-3 tag-desc">
            <h3>{{ $tag->tag }}</h3>
            <p>{{ $tag->description }}</p>
        </div>
        @endif
        <div class="row mb-4">
            @foreach ($books as $book)
            @php
            $genre_id = App\Models\BookGenre::where('book_id', $book->id)->where('book_type', 'translation')->limit(4)->get();
            $g_list = [];
            foreach($genre_id as $g)
            {
                $genre = App\Models\Genre::where('id', $g->genre_id)->first();
                $g_list[] = [
                    'id' => $genre->id,
                    'genre' => $genre->genre,
                    'book_genre_id' => $g->id,
                    'slug' => $genre->slug
                ];
            }
            @endphp
            <div class="col-12 col-lg-6 mb-2">
                <div class="book-item mb-sm-2 box-sh">
                    <div class="row">
                        <div class="col-md-3 col-lg-4 col-xl-4 col-xxl-3d5 col-3">
                            <div class="book-cover">
                                <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                    <img class="rounded" alt="{{ $book->novel }}" src="{{ URL::asset('images/book-cover/150/'.$book->cover) }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-8 col-xl-8 col-xxl-8d5 col-9">
                            <div class="book-title">
                                <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                                    <h4 class="text-capitalise">{{ $book->novel }}</h4>
                                </a>
                            </div>
                            <div class="review-star">
                                <ul class="stars-list">
                                    @php
                                    for($i = 0; $i<$book->rating; $i++)
                                    echo("<li class='star-item active'><i class='mdi mdi-star'></i></li>");
                                    if($book->rating<5){
                                        $r = 5 - $book->rating;
                                        for($i = 0; $i<$r; $i++)
                                        echo("<li class='star-item inactive'><i class='mdi mdi-star'></i></li>");
                                    }
                                    @endphp
                                </ul>
                            </div>
                            <div class="book-desc">{{ $book->description }}</div>
                            <div class="book-genre mt-2 d-none d-sm-block">
                                @foreach ($g_list as $genre) 
                                    <a href="{{ url('genre') }}/{{$genre['id']}}/{{$genre['slug']}}" class="badge badge-pill badge-info">
                                        {{ $genre['genre'] }}
                                    </a>
                                @endforeach
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @php
        $last_page = $books->lastPage();
        $next_page = $books->currentPage() + 1;
        $prev_page = $books->currentPage() - 1;
        @endphp
        <div class="pagination mb-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    @if($books->currentPage() === 1)
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
                        <a class="page-link" href="{{ url('novels?page=1') }}">
                            <i class="mdi mdi-page-first"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ url('novels?page='.$prev_page) }}">
                            <i class="mdi mdi-skip-previous"></i>
                        </a>
                    </li>
                    @endif
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">....</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">{{ $books->currentPage() }}</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">....</a>
                    </li>
                    
                    @if($books->currentPage() === $last_page)
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
                        <a class="page-link" href="{{ url('novels?page=').$next_page }}">
                            <i class="mdi mdi-skip-next"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ url('novels?page='.$last_page) }}">
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
