@extends('home')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-uppercase float-left">genre</h4>
                    <button type="button" class="btn btn-gradient-success btn-rounded btn-sm float-right"
                        data-toggle="modal" data-target="#genre_add_modal">+ ADD</button>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Genre</th>
                                    <th>Description</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0;?>
                                @foreach($genre as $data)
                                    <?php $count++;?>
                                    <tr>
                                        <th>{{ $count }}</th>
                                        <td>{{ $data['genre'] }}</td>
                                        <td><div>{{ $data['description'] }}</div></td>
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
        </div>
    </div>
@endsection