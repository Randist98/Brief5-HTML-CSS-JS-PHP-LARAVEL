@extends('Lessor.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        
        {{--  --}}
        <div class="col-md-12">
            <h1><i class="fa fa-pencil mt-4 mb-2" aria-hidden="true"></i> Edit Office</h1>
            <form action="{{ route('office.update', $office->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label"><i class="fa fa-font" aria-hidden="true"></i> Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $office->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"><i class="fa fa-money" aria-hidden="true"></i> Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $office->price }}" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $office->location }}" required>
                </div>
                <div class="mb-3">
                    <label for="details" class="form-label"><i class="fa fa-info" aria-hidden="true"></i> Details</label>
                    <textarea class="form-control" id="details" name="details" required>{{ $office->details }}</textarea>
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
                <button type="submit" class="btn btn-primary mb-4"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">

  
    
    </div>
    <div class="card-body">
   
        <br/>
        <br/>
        <div class="row">
            @foreach($images as $item)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset($item->image) }}" alt="Office Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                   
                    <div class="card-footer">
                  
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
</div
@endsection
 