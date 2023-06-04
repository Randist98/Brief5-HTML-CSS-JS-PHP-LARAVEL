@extends('Lessor.layouts.master')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-4 mb-4">
            <form method="GET" action="">
                <div class="form-group">
                    <label for="office_name">Filter by Office Name</label>
                    <input type="text" name="office_name" id="office_name" class="form-control" value="{{ request('office_name') }}">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($comments as $comment)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card" style="height: 100%;">
                <div class="card-header">
                    <h5 class="card-title">{{ $comment->office->name }}</h5>
                </div>
                <div class="card-body">
                    @if ($comment->user)
                        <hr>
                        <p class="card-text">
                            <i class="fa fa-user" aria-hidden="true"></i> User Name: {{ $comment->user->name }}
                        </p>
                    @else
                        <p class="card-text">
                            <i class="fa fa-user" aria-hidden="true"></i> User Name: N/A
                        </p>
                    @endif
                    <div class="comment-image">
                        @if($comment->image)
                        <img src="{{ asset('assit-user/images/'.$comment->image) }}" alt="Office Image" class="img-thumbnail" style="width: 100%;">
                        @else
                        <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                        @endif 
                    </div>
                    <p class="card-text">{{ $comment->message }}</p>
                </div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('comment.destroy', $comment->id) }}" accept-charset="UTF-8" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg" title="Delete Office" onclick="return confirm(&quot;Confirm delete?&quot;)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
