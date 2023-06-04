@extends('Admin.layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fa fa-building" aria-hidden="true"></i> Offices CRUD</h2>
                        <form action="{{ route('offices.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Office name" name="price" value="{{ request('location') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('offices.create') }}" class="btn btn-success btn-lg" title="Add New Office">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('offices.index', ['sort' => 'name']) }}" class="text-white">
                                                <i class="fa fa-font" aria-hidden="true"></i>  <i class="fa fa-sort" aria-hidden="true"></i> Name
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('offices.index', ['sort' => 'price']) }}" class="text-white">
                                                <i class="fa fa-money" aria-hidden="true"></i>    <i class="fa fa-sort" aria-hidden="true"></i> Price
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('offices.index', ['sort' => 'location']) }}" class="text-white">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>    <i class="fa fa-sort" aria-hidden="true"></i> Location
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white"><i class="fa fa-info" aria-hidden="true"></i> Details</th>
                                        <th class="bg-primary text-white"><i class="fa fa-image" aria-hidden="true"></i> Image</th>
                                        <th class="bg-primary text-white"><i class="fa fa-cogs" aria-hidden="true"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($offices as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ $item->details }}</td>
                                        <td>
                                            @if($item->image)
                                            <img src="{{ asset('image/'. $item->image) }}" alt="Office Image" class="img-thumbnail" style="width: 100px;">
                                            @else
                                            <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('offices.edit', $item->id) }}" title="Edit Office" class="text-primary">
                                                <button class="btn btn-primary btn-lg">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <form method="POST" action="{{ route('offices.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-lg" title="Delete Office" onclick="return confirm(&quot;Confirm delete?&quot;)">
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
                {{-- {{ $offices->appends(request()->except('page'))->links() }} <!-- Add pagination links --> --}}
                <div class="d-flex justify-content-center">
                    {{  $offices->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>

</div>

@endsection