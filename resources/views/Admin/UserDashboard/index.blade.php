@extends('Admin.layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fa fa-users mt-4 mb-3" aria-hidden="true"></i> Users</h2>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        <form action="{{ route('userdashboard.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="User name" name="name" value="{{ request('name') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                         <a href="{{ route('userdashboard.create' ) }}" class="btn btn-success btn-lg" title="Add New User">
                            <i class="fa fa-plus-circle" aria-hidden="true"> Add</i>
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('userdashboard.index', ['sort' => 'name']) }}" class="text-white">
                                                <i class="fa fa-user" aria-hidden="true"></i>  <i class="fa fa-sort" aria-hidden="true"></i> Name
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('userdashboard.index', ['sort' => 'email']) }}" class="text-white">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>    <i class="fa fa-sort" aria-hidden="true"></i> Email
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('userdashboard.index', ['sort' => 'mobile']) }}" class="text-white">
                                                <i class="fa fa-phone" aria-hidden="true"></i>    <i class="fa fa-sort" aria-hidden="true"></i> Mobile
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white"><i class="fa fa-image" aria-hidden="true"></i> Image</th>
                                        <th class="bg-primary text-white"><i class="fa fa-cogs" aria-hidden="true"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>
                                            @if($user->image)
                                            <img src="{{ asset('assit-user/images/'. $user->image) }}" alt="User Image" class="img-thumbnail" style="width: 100px;">
                                            @else
                                            <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('userdashboard.edit', $user->id) }}" title="Edit User" class="text-primary">
                                                <button class="btn btn-primary btn-lg">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                             <form method="POST" action="{{ route('userdashboard.destroy', $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-lg" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>

                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
