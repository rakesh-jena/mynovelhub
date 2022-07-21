@extends('home')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-uppercase float-left">genre</h4>
                    <button type="button" class="btn btn-gradient-success btn-rounded btn-sm float-right"
                        data-toggle="modal" data-target="#genre_add_modal">+ ADD</button>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Genre</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                              $count = 0;
                            @endphp
                            @foreach($genre as $data)
                                @php
                                $count++
                                @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $data['id'] }}</td>
                                    <td> {{ $data['genre'] }} </td>
                                    <td><button type="button" class="btn btn-gradient-primary btn-sm" data-toggle="modal"
                                            data-target="#genre_edit_modal" data-id="{{ $data['id'] }}" data-genre="{{ $data['genre'] }}" data-desc="{{ $data['description'] }}">EDIT</button>
                                        <button type="button" class="btn btn-gradient-danger btn-sm" data-toggle="modal" data-id="{{ $data['id'] }}"
                                            data-target="#genre_delete_modal">DELETE</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-uppercase float-left">tags</h4>
                    <button type="button" class="btn btn-gradient-success btn-rounded btn-sm float-right"
                        data-toggle="modal" data-target="#tag_add_modal">+ ADD</button>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Tag</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                              $count = 0;
                            @endphp
                            @foreach($tags as $data)
                                @php
                                $count++
                                @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $data['id'] }}</td>
                                    <td> {{ $data['tag'] }} </td>
                                    <td><button type="button" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-id="{{ $data['id'] }}" data-genre="{{ $data['tag'] }}"
                                            data-target="#tag_edit_modal" data-desc="{{ $data['description'] }}">EDIT</button>
                                        <button type="button" class="btn btn-gradient-danger btn-sm" data-toggle="modal" data-id="{{ $data['id'] }}"
                                            data-target="#tag_delete_modal">DELETE</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection