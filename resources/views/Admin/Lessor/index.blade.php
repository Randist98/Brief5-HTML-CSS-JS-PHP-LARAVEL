@extends('Admin.layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fa-solid fa-person mt-4 mb-3" aria-hidden="true"></i> Lessor</h2>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('lessores.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Lessor name" name="name" value="{{ request('name') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                            </div>
                        </div>
                    </form>
                    
                    </div>
                    <div class="card-body">
                        <a href="{{ route('lessores.create') }}" class="btn btn-success btn-lg" title="Add New Lessor">
                            <i class="fa fa-plus-circle" aria-hidden="true"> Add</i>
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('lessores.index', ['sort' => 'id']) }}" class="text-white">
                                                <i class="fa-solid fa-list-ol" aria-hidden="true"></i> <i class="fa fa-sort" aria-hidden="true"></i> Id
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('lessores.index', ['sort' => 'name']) }}" class="text-white">
                                                <i class="fa fa-font" aria-hidden="true"></i> <i class="fa fa-sort" aria-hidden="true"></i> Name
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('lessores.index', ['sort' => 'email']) }}" class="text-white">
                                                <i class="fa-sharp fa-solid fa-envelope" aria-hidden="true"></i> <i class="fa fa-sort" aria-hidden="true"></i> Email
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white"><i class="fa-solid fa-phone" aria-hidden="true"></i> Mobile</th>
                                        <th class="bg-primary text-white"><i class="fa fa-image" aria-hidden="true"></i> Image</th>
                                        <th class="bg-primary text-white"><i class="fa fa-cogs" aria-hidden="true"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lessores as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>
                                            @if($item->image)
                                            <img src="{{ asset('image/'. $item->image) }}" alt="Lessor Image" class="img-thumbnail" style="width: 100px;">
                                            @else
                                            <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('lessores.edit', $item->id) }}" title="Edit Office" class="text-primary">
                                                <button class="btn btn-primary btn-lg">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <form method="POST" action="{{ route('lessores.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-lg" title="Delete Lessor" onclick="return confirm(&quot;Confirm delete?&quot;)">
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
                    {{ $lessores ->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
