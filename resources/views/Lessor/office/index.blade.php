@extends('Lessor.layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fa fa-building mt-4 mb-3" aria-hidden="true"></i> Offices</h2>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('office.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Office name" name="name" value="{{ request('name') }}">
                            <!-- استخدم "name" كاسم للحقل -->
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                            </div>
                        </div>
                    </form>
                    
                    </div>
                    <div class="card-body">
                        <a href="{{ route('office.create') }}" class="btn btn-success btn-lg" title="Add New Office">
                            <i class="fa fa-plus-circle" aria-hidden="true"> Add</i>
                        </a>
                        <br/>
                        <br/>
                        <div class="row">
                            @foreach($offices as $item)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="{{ asset('assit-user/images/'. $item->image) }}" alt="Office Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">Price: {{ $item->price }}</p>
                                        <p class="card-text">Location: {{ $item->location }}</p>
                                        <p class="card-text">Details: {{ $item->details }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('office.edit', $item->id) }}" title="Edit Office" class="btn btn-primary">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('office.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" title="Delete Office" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $offices->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
