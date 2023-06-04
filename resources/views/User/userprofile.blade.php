@extends('User.layouts.master')

@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assit-user/images/hero_1.jpg')}});" data-aos="fade">
</div>

    <div class="container mt-5 mb-5">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <div class="right">
                                        @if($user->image)
                                        <img src="{{ asset('image/'. $user->image) }}" alt="Admin Image">
                                        @else
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                        @endif                        
                                    </div>                                </div>
                                <br><br>
                                <h5 class="user-name">{{$user->name}}</h5>
                                <h6 class="user-email">{{$user->email}}</h6>
                            </div>
                            <div class="about">
                                <h5>About</h5>
                                <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('userprofile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter full name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="eMail" name="email" placeholder="Enter email ID" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="mobile" placeholder="Enter phone number" value="{{$user->mobile}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter the correct password" value="{{$user->password}}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label"><i class="fa fa-image" aria-hidden="true"></i> Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" value="{{$user->image}}">
                                        <label class="custom-file-label" for="image"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Choose File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="Reservationcard">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                @foreach ($reservations as $reservation)
                <div class="card">
                    <div class="row d-flex justify-content-between mx-2 px-3 card-strip">
                        <div class="left d-flex flex-column">
                            <h5 class="mb-1">{{ $reservation->start }} - {{ $reservation->end }}</h5>
                            <p class="text-muted mb-1 sm-text">{{ $reservation->date }}</p>
                        </div>
                        <div class="right">
                            <img src="https://i.imgur.com/Mcd6HIg.jpg">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between mx-2 px-3 card-strip">
                        <div class="left d-flex flex-column">
                            <h5 class="mb-1">{{ $reservation->user->name }}</h5>
                            <p class="text-muted mb-1 sm-text">{{ $reservation->details }}</p>
                        </div>
                        <div class="right d-flex">
                            <div class="fa fa-comment-o"></div>
                            <div class="fa fa-phone"></div>
                        </div>
                    </div>
                    <div class="row justify-content-between mx-2 px-3 card-strip">
                        <div class="left d-flex">
                            <h5 class="mb-1 text-muted">{{ $reservation->service }}</h5>
                            <span class="time">{{ $reservation->duration }} hr</span>
                        </div>
                        <div class="right d-flex">
                            <p class="mb-0 price"><strong class="text-muted">${{ $reservation->price }}</strong></p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between mx-2 px-3">
                        <button class="btn btn-white">Reschedule</button>
                        <button class="btn btn-purple">Approve</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>


@endsection