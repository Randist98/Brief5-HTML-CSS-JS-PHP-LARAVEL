@extends('Admin.layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fa fa-building" aria-hidden="true"></i> Reservation CRUD</h2>
                        <form action="{{ route('reversation.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Office name" name="price" value="{{ request('location') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('reversation.create') }}" class="btn btn-success btn-lg" title="Add New Office">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('reversation.index', ['sort' => 'name']) }}" class="text-white">
                                                <i class="fa fa-font" aria-hidden="true"></i>  <i class="fa fa-sort" aria-hidden="true"></i> Name user
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('reversation.index', ['sort' => 'price']) }}" class="text-white">
                                                <i class="fa fa-money" aria-hidden="true"></i>    <i class="fa fa-sort" aria-hidden="true"></i> Price
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white">
                                            <a href="{{ route('reversation.index', ['sort' => 'officeid']) }}" class="text-white">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>    <i class="fa fa-sort" aria-hidden="true"></i> officeid
                                            </a>
                                        </th>
                                        <th class="bg-primary text-white"><i class="fa fa-info" aria-hidden="true"></i> Details</th>
                                        <th class="bg-primary text-white"><i class="fa fa-image" aria-hidden="true"></i> start</th>
                                        <th class="bg-primary text-white"><i class="fa fa-image" aria-hidden="true"></i> end</th>
                                        <th class="bg-primary text-white"><i class="fa fa-cogs" aria-hidden="true"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->user_id }}</td>
                                        <td>{{ $reservation->price }}</td>
                                        <td>{{ $reservation->office_id }}</td>
                                        <td>{{ $reservation->start }}</td>
                                        <td>{{ $reservation->end }}</td>
                                        <td>{{ $reservation->details }}</td>
                                        <td>
                                            <a href="{{ route('reversation.edit', $reservation->id) }}" title="Edit Office" class="text-primary">
                                                <button class="btn btn-primary btn-lg">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <form method="POST" action="{{ route('reversation.destroy', $reservation->id) }}" accept-charset="UTF-8" style="display:inline">
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
                {{-- {{ $reservations->appends(request()->except('page'))->links() }} <!-- Add pagination links --> --}}

            </div>
        </div>
    </div>

</div>

@endsection
{{--

@extends('Admin.layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Reversation
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>start</th>
                        <th>end</th>
                        <th>price</th>
                        <th>details</th>
                        <th> Name user</th>
                        <th> officeid</th>


                        {{-- <th>Password</th> --}}
                        {{-- <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->start }}</td>
                            <td>{{ $reservation->end }}</td>
                            <td>{{ $reservation->price }}</td>
                            <td>{{ $reservation->details }}</td>
                            <td>{{ $reservation->user_id }}</td>
                            <td>{{ $reservation->office_id }}</td>

                            <td>
                                <a href="{{ route('reversation.index', $comment->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('reversation.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('reversation.destroy', $comment->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection  --}}
