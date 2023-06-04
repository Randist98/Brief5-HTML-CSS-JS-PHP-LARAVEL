@extends('Admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-plus mt-4 mb-2" aria-hidden="true"></i> Add User</h1>
            <form action="{{ route('userdashboard.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"><i class="fa fa-image" aria-hidden="true"></i> Image</label>
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
