@extends('Admin.layouts.master')
@section('content')
<div class="container mt-5">
  
    <div class="card">

        <div class="card-header mt-3">
             <h3>Feedbaks</h3>
  <form action="{{ route('lessores.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Lessor name" name="name" value="{{ request('location') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                </div>
                            </div>
    </form>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Office</th>
                        <th>Feadback</th>
                        <th>Image</th>


                        {{-- <th>Password</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>
                                @if ($comment->user)
                                <p class="card-text">
                                   {{ $comment->user->name }}
                                </p>
                            @else
                                <p class="card-text">
                                    <i class="fa fa-user" aria-hidden="true"></i> 
                                </p>
                            @endif
                        </td>
                            <td>{{ $comment->office->name }}</td>
                            <td>{{ $comment->message }}</td>
                            <td>
                                @if($comment->image)
                                <img src="{{ asset('assit-user/images/'.$comment->image) }}" alt="Office Image" class="img-thumbnail" style="width: 100%;">
                                @else
                                <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                                @endif 
                            </td>

                            {{-- <td>{{ $user->password }}</td> --}}
                            <td>
                                <form action="{{ route('commentdashboard.destroy', $comment->id) }}" method="POST" style="display: inline">
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
        <div class="d-flex justify-content-center">
            {{ $comments->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>

@endsection
