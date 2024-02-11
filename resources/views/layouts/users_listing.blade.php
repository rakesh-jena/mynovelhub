@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>                                
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0;?>
                            @foreach ($users as $user)
                                <?php $count++;?>
                                <tr>
                                    <th>
                                        {{ $count }}
                                    </th>
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