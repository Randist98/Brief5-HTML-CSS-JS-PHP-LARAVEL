@extends('Admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-plus" aria-hidden="true"></i> Add Reversation</h1>
            <form action="{{ route('reversation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label"><i class="fa fa-font" aria-hidden="true"></i> Name user</label>
                    <input type="text" class="form-control" id="name" name="user_id" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"><i class="fa fa-money" aria-hidden="true"></i> Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> officeid</label>
                    <input type="text" class="form-control" id="location" name="office_id" required>
                </div>
                <div class="mb-3">
                    <label for="details" class="form-label"><i class="fa fa-info" aria-hidden="true"></i> Details</label>
                    <textarea class="form-control" id="details" name="details" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> start</label>
                    <input type="date" class="form-control" id="location" name="start" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> end</label>
                    <input type="date" class="form-control" id="location" name="end" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
