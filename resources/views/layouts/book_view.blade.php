@extends('home')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="book-cover" data-id="{{ $book[0]->id }}" data-type="translation">
                            <img class="book_cover" src="{{ URL::asset('images/book-cover/300/'.$book[0]->cover) }}"
                                alt="No Cover">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="book-info">
                            <button type="button" class="btn btn-gradient-danger btn-sm text-uppercase float-right"
                                data-toggle="modal" data-action="{{ URL('admin/book_translated/'.$book[0]->id) }}"
                                data-target="#delete_modal">Delete</button>
                            <a href="{{ URL('admin/book_translated/'.$book[0]->id.'/edit') }}"
                                class="btn btn-gradient-primary btn-sm mr-1 text-uppercase float-right">edit</a>
                            <h3 class="">{{ $book[0]->novel }}</h3>
                            <ul class="list-ticked">
                                <li><strong>Author</strong>{{ $book[0]->author }}</li>
                                <li><strong>Lead</strong>{{ $book[0]->lead }}</li>
                                <li><strong>Status</strong>{{ $book[0]->status }}</li>
                                <li><strong>Rating</strong>{{ $book[0]->rating }}</li>
                                <li>{!! nl2br($book[0]->description) !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title float-left">Chapters</h4>
                        <a href="{{ URL('admin/chapter/add/'.$book[0]->id) }}"
                            class="btn btn-gradient-primary btn-sm mr-1 text-uppercase float-right">add chapter</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Volume</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 0;
                                @endphp
                                @foreach ($chapters as $chapter)
                                @php
                                $count++;
                                @endphp
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{ $chapter->id }}</td>
                                    <td>{{ $chapter->ch_name }}</td>
                                    <td>{{ $chapter->volume }}</td>
                                    <td>{{ $chapter->chapter_no }}</td>
                                    <td>
                                        <a href="{{ url('admin/chapter/'.$chapter->id) }}"
                                            class="btn btn-gradient-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title float-left">Genre</h4>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Genre" name="genre_in" id="genre_in">
                        
                    </div>
                    <div class="genre-search-result">
                        
                    </div>
                </div>
                <div class="genre-list">
                    @foreach ($g_list as $genre)                    
                        <span class="badge badge-pill badge-danger mb-1">{{ $genre['genre'] }}&nbsp;&nbsp;<i class="mdi mdi-close delete_genre" data-id="{{ $genre['book_genre_id'] }}"></i></span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title float-left">Tags</h4>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tags" name="tag_in" id="tag_in">
                                               
                    </div>
                    <div class="tag-search-result">
                        
                    </div>
                </div>
                <div class="tag-list">
                    @foreach ($t_list as $tag)
                        <span class="badge badge-pill badge-danger mb-1">{{ $tag['tag'] }}&nbsp;&nbsp;<i class="delete_tag mdi mdi-close" data-id="{{ $tag['book_tag_id'] }}"></i></span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
