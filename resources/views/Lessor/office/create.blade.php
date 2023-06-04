@extends('Lessor.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-plus mt-4 mb-2" aria-hidden="true"></i> Add Office</h1>
            <form action="{{ route('office.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label"><i class="fa fa-font" aria-hidden="true"></i> Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"><i class="fa fa-money" aria-hidden="true"></i> Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="mb-3">
                    <label for="details" class="form-label"><i class="fa fa-info" aria-hidden="true"></i> Details</label>
                    <textarea class="form-control" id="details" name="details" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label"><i class="fa fa-image" aria-hidden="true"></i> Images</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="images" name="images[]" multiple> <!-- تعديل هنا ليكون الاسم images[] -->
                            <label class="custom-file-label" for="images"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Choose File</label> <!-- تعديل هنا ليكون الاسم images -->
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"><i class="fa fa-image" aria-hidden="true"></i> Cover</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Choose File</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-4"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
