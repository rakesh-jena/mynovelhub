@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>                                
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td> {{ $user->name }} </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td> {{ $user->role }} </td>
                                    <td>
                                        <a href="{{ url('admin/users') }}/{{ $user->id }}" class="btn btn-gradient-primary btn-sm">Explore</a>
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