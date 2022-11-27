@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm">Translated</button>
                        <button type="button" class="btn btn-rounded btn-sm">Original</button>
                        <button type="button" class="btn btn-rounded btn-sm">Fanfic</button>
                        <a href="{{ route('book_translated.create')}}" type="button" class="btn btn-gradient-info btn-rounded btn-sm float-right">+ Add</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Novel</th>
                                <th scope="col">Chapters</th>
                                <th scope="col">Status</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Views</th>
                                <th scope="col">Collection</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0;?>
                            @foreach ($books as $book)
                            <?php $count++;?>
                            <tr>
                                <td>{{ $count }}</td>
                                <td class="py-1">
                                    <img class="rectangle mr-1" src="{{ URL::asset('images/book-cover/48/'.$book->cover) }}" alt="image">{{ substr($book->novel, 0, 20) }}...
                                </td>
                                <td> {{ $book->chapters }} </td> 
                                <td><label class="badge badge-info">{{ $book->status }}</label></td>
                                <td>{{ $book->featured }}</td>
                                <td>{{ $book->views }}</td>
                                <td>{{ $book->collection }}</td>
                                <td><a href="{{ url('admin/book_translated/'.$book->id) }}" class="btn btn-gradient-primary btn-sm">Explore</a></td>
                            </tr>   
                            @endforeach
                                                 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection