@extends('web')
@section('title', 'MyNovelHub | Free Chinese, Korean & Japanese WebNovels')
@section('meta_keywords', 'Read Novels Free, Web Novels, Light Novels, Chinese Novels')
@section('meta_description', 'Read many Chinese, Korean and Japanese light novels.')

@section('content')
<!-- Banner -->
<section class="banner bg-section container">
    <div class="banner-container">
        <img class="" src="images/ban 1.jpg" alt="MyNovelHub Banner">
    </div>
</section>

<!-- Featured Books -->
<section class="featured container bg-section mb-3 mt-3">
    <div class="special-heading text-center d-xm-none text-uppercase">
        <h2 class="special-title">featured books</h2>
    </div>
    <div class="special-heading d-sm-none text-center text-uppercase mb-1">
        <h4 class="special-title">featured books</h4>
    </div>
    <div class="book-panel">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="row books-panel-container">
                    @foreach ($featured_books as $fb)
                    <div class="col-md-4 col-4">
                        <div class="books-panel-item">
                            <a class="books-panel-item-wrap is-book-panel-trigger" data-panel-show="{{ $fb->id }}"
                                href="{{ url('novel/'.$fb->slug.'/'.$fb->id) }}">
                                <div class="book-thumb-img-wrap has-edge">
                                    <img alt="{{ $fb->novel }}" class="rounded" src="{{ URL::asset('images/book-cover/300/'.$fb->cover) }}">
                                </div>
                                {{-- <h6 class="book-thumb-title mw-100" data-toggle="tooltip" title="{{ $fb->novel }}">
                                    {{ $fb->novel }}
                                </h6> --}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 books-panel-info col-12">
                @foreach ($featured_books as $fb)
                <div class="books-panel-info-inner" data-panel-id="{{ $fb->id }}">
                    <div class="book-title">
                        <a href="{{ url('novel/'.$fb->slug.'/'.$fb->id) }}">
                            <h4 class="book-thumb-title">{{ $fb->novel }}</h4>
                        </a>
                    </div>
                    <div class="book-author mb-2">
                        <a href="#" class="font-italic">by {{ $fb->author }}</a>
                    </div>
                    <div class="book-desc">
                        <p>{{ $fb->description }}</p>
                    </div>
                    <a href="{{ url('novel/'.$fb->slug.'/'.$fb->id) }}"
                        class="btn btn-gradient-primary btn-rounded btn-fw text-capitalize">
                        read now
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="new-books bg-section container">
    <div class="nb-wrapper">
        <div class="special-heading d-xm-none text-center  text-uppercase">
            <h2 class="special-title">new books</h2>
        </div>
        <div class="special-heading d-sm-none text-center  text-uppercase">
            <h4 class="special-title">new books</h4>
        </div>
        <div class="new-books-carousel owl-carousel ">
            @foreach ($new_books as $book)
            <div class="item">
                <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                    <img class="rounded mb-1" src="{{ URL::asset('images/book-cover/150/'.$book->cover) }}"
                        alt="{{ $book->novel }}">
                    <h6 class="book-thumb-title">{{ $book->novel }}</h6>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="popular-books container">
    <div class="special-heading text-center d-xm-none text-uppercase">
        <h2 class="special-title">popular books</h2>
    </div>
    <div class="special-heading text-center d-sm-none text-uppercase">
        <h4 class="special-title">popular books</h4>
    </div>
    <div class="popular-books">
        <div class="hero-container">
            <div class="hero-item">
                <div class="hero-cover">
                    <a href="{{ url('novel/'.$pop_books[0]->slug.'/'.$pop_books[0]->id) }}">
                        <img alt="{{ $pop_books[0]->novel }}" src="{{ URL::asset('images/book-cover/150/'.$pop_books[0]->cover) }}">
                    </a>
                </div>
                <div class="hero-info">
                    <a href="{{ url('novel/'.$pop_books[0]->slug.'/'.$pop_books[0]->id) }}">
                        <h6 class="book-thumb-title mw-100" data-toggle="tooltip" title="{{ $pop_books[0]->novel }}">{{ $pop_books[0]->novel }}</h6>
                    </a>
                    <p class="desc">{{ $pop_books[0]->description }}</p>
                </div>
            </div>
        </div>
        <div class="new-books-carousel owl-carousel">
            @foreach ($pop_books as $pb)
            <div class="item">
                <a href="{{ url('novel/'.$pb->slug.'/'.$pb->id) }}">
                    <img class="rounded" src="{{ URL::asset('images/book-cover/150/'.$pb->cover) }}"
                        alt="{{ $pb->novel }}">
                    <h6 class="book-thumb-title">{{ $pb->novel }}</h6>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="complete-books bg-section container">
    <div class="cb-wrapper">
        <div class="special-heading d-xm-none text-center text-uppercase">
            <h2 class="special-title">completed books</h2>
        </div>
        <div class="special-heading d-sm-none text-center text-uppercase">
            <h4 class="special-title">completed books</h4>
        </div>
        <div class="new-books-carousel owl-carousel">
            @foreach ($comp_books as $cb)
            <div class="item">
                <a href="{{ url('novel/'.$cb->slug.'/'.$cb->id) }}">
                    <img class="rounded" src="{{ URL::asset('images/book-cover/150/'.$cb->cover) }}"
                        alt="{{ $cb->novel }}">
                    <h6 class="book-thumb-title">{{ $cb->novel }}</h6>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="latest-update container mb-3 bg-section mt-3">
    <div class="special-heading d-xm-none text-center text-uppercase">
        <h2 class="special-title">latest update</h2>
    </div>
    <div class="special-heading d-sm-none text-center text-uppercase">
        <h4 class="special-title">latest update</h4>
    </div>
    <div class="latest-table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-uppercase">book</th>
                    <th scope="col" class="text-uppercase d-xm-none">author</th>
                    <th scope="col" class="text-uppercase d-xm-none">chapter no.</th>
                    <th scope="col" class="text-uppercase">chapter</th>
                    <th scope="col" class="text-uppercase d-xm-none">status</th>                    
                    <th scope="col" class="text-uppercase">updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($latest_ch as $chapter)

                @php
                $book = App\Models\BookTranslated::where('id', $chapter->book_id)->first();
                @endphp
                <tr>
                    <td>
                        <a href="{{ url('novel/'.$book->slug.'/'.$book->id) }}">
                            <img class="mr-1" src="{{ URL::asset('images/book-cover/48/'.$book->cover) }}" alt="{{ $book->novel }}">
                            <span >{{ $book->novel }}</span>
                        </a>
                    </td>
                    <td class="d-xm-none">{{ $book->author }}</td>
                    <td class="d-xm-none">{{ $chapter->chapter_no }}</td>
                    <td>
                        <a href="{{ url($book->slug.'/'.$chapter->id.'/'.$chapter->slug) }}">
                            {{ $chapter->ch_name }}
                        </a>
                    </td>
                    <td class="d-xm-none">
                        <label class="badge badge-info text-capitalize">{{ $book->status }}</label>
                    </td>                    
                    <td>{{ Carbon\Carbon::parse($chapter->updated_at)->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
