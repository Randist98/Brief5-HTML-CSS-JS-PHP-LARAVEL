@extends('Admin.layouts.master')
@section('content')
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fa fa-building mt-4 mb-3" aria-hidden="true"></i> Contact</h2>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('contact.index') }}" method="GET" class="mb-3">
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
                     
                        <div class="row">
                            @foreach($contact as $item)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">Email: {{ $item->email }}</p>
                                        <p class="card-text">Subject: {{ $item->subject }}</p>
                                        <p class="card-text">Message: {{ $item->message }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <form method="POST" action="{{ route('contact.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
                {{-- <div class="d-flex justify-content-center">
                    {{ $offices->links('pagination::bootstrap-4') }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
