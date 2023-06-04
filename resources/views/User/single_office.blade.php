@extends('User.layouts.officemaster')
<style>

.stars{
    padding: 10px 0;
    margin-top: 10px;
    font-size: 1rem;
}

.stars i{
    color: lightgray;
    padding: 5px;
    cursor: pointer;
    transition: color 0.5s;
}

/* Dynamic Class */

.color-star{
    color: orange !important;
}
.stars {
                            display: flex;
                            justify-content: center;
                        }
                        
                        .stars label {
                            cursor: pointer;
                            color: gray;
                            font-size: 30px;
                            transition: color 0.3s;
                        }
                        
                        .stars label:hover,
                        .stars label:hover ~ label,
                        .stars input:checked ~ label {
                            color: orange;
                        }
                        
                        .btn {
                            margin-top: 20px;
                            padding: 10px 20px;
                            font-size: 18px;
                            background-color: #28a745;
                            color: #fff;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            transition: background-color 0.3s;
                        }
                        
                        .btn:hover {
                            background-color: #218838;
                        }</style>
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assit-user/images/'.$office->image)}});" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-5 mx-auto mt-lg-5 text-center">

          <h1>{{$office->name}}</h1>
          <h1>{{$office->location}}</h1>
          <p class="mb-5"><strong class="text-white">{{$office->price}}$/Houre</strong></p>
          
        </div>
      </div>
    </div>

    <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
  </div> 

<div class="site-section" id="property-details">
    <div class="container product_mainblock">
        <div class="row product_block">
            <div class="col-lg-7 h-50">
                <div class="owl-carousel slide-one-item with-dots">
                    @foreach($images as $image)
                    <div><img src="{{ asset($image->image) }}" alt="Image" class="img-fluid"></div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 pl-lg-5 ml-auto h-50">
                <div class="mb-5">
                    <h3 class="mb-3">{{$office->details}}</h3>
                    <form role="form" action="{{ route('rate.store') }}" method="post">
                        @csrf
                        <div class="container">
                        
                            {{-- Start | Fontawesome --}}
                            <div class="stars">
                                <input type="hidden" name="rating" value="" id="rating">
                                <label for="star1" onclick="setRating(1)"><i class="fa-solid fa-star"></i></label>
                                <label for="star2" onclick="setRating(2)"><i class="fa-solid fa-star"></i></label>
                                <label for="star3" onclick="setRating(3)"><i class="fa-solid fa-star"></i></label>
                                <label for="star4" onclick="setRating(4)"><i class="fa-solid fa-star"></i></label>
                                <label for="star5" onclick="setRating(5)"><i class="fa-solid fa-star"></i></label>
                            </div>
                        </div>
                        
                        <input type="hidden" name="office_id" value="{{ $office->id }}">
                        
                        <button type="submit" class="btn btn-success">Rate this office</button>
                    </form>
                    
                
                    
                                            


                                                {{-- appointment --}}
                <div class="mb-5">
                    <form action="{{ route('reservations') }}" method="POST" class="appointment-form">
                        @csrf
                        <h3 class="mb-3">Book your apartment</h3>
                        <input type="hidden" name="office_id" value="{{ $office->id }}">
                        <input type="hidden" name="price" value="{{ $office->price }}">

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="datetime-local" class="form-control appointment_date-check-in" placeholder="Check-In" name="check_in">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="datetime-local" class="form-control appointment_date-check-out" placeholder="Check-Out" name="check_out">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone number" name="details">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Book Apartment Now" class="btn btn-primary py-3 px-4">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Total <span id="total-price"></span></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <span>Payment Method</span>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-method1" value="method1">
                                    <label class="form-check-label" for="payment-method1">
                                        <img src="payment1.png" alt="Payment Method 1">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment-method2" value="method2">
                                    <label class="form-check-label" for="payment-method2">
                                        <img src="payment2.png" alt="Payment Method 2">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <script>
                        // استدعاء الدالة getBookedTimesByDate عند تغيير التاريخ في حقل check-in
                        document.querySelector('.appointment_date-check-in').addEventListener('change', function() {
                            var selectedDate = this.value.split('T')[0];
                            getBookedTimesByDate(selectedDate);
                        });
                    
                        // دالة لجلب الأوقات المحجوزة بناءً على التاريخ
                        function getBookedTimesByDate(date) {
                            // قم بإجراء طلب AJAX هنا لجلب الأوقات المحجوزة بناءً على التاريخ
                            // وقم بتحديث أي عناصر في الفورم بناءً على النتائج المسترجعة
                        }
                    
                        // استدعاء الدالة getAvailableTimes عند تغيير التاريخ في حقل check-out
                        document.querySelector('.appointment_date-check-out').addEventListener('change', function() {
                            var selectedDate = this.value.split('T')[0];
                            getAvailableTimes(selectedDate);
                        });
                    
                        // دالة لجلب الأوقات المتاحة بناءً على التاريخ
                        function getAvailableTimes(date) {
                            // قم بإجراء طلب AJAX هنا لجلب الأوقات المتاحة بناءً على التاريخ
                            // وقم بتحديث أي عناصر في الفورم بناءً على النتائج المسترجعة
                        }
                    </script>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-body">
    <div class="comment-container">
        <div class="comment_block">
            <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="office_id" value="{{ $office->id }}">
                <textarea class="form-control" name="message" rows="2" placeholder="What are you thinking?"></textarea>
                <input type="file" name="image" class="btn btn-trans btn-icon fa fa-camera add-tooltip" placeholder="">
                <div class="mar-top clearfix">
                    <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
                    
                </div>
            </form>
        </div>
    </div>
    <div class="mar-top clearfix">
        @foreach($comments as $comment)
        <div class="panel">
            <div class="panel-body">
                <div class="media-block">
                    <a class="media-left" href="#">
                        @if($comment->user && $comment->user->profile_picture)
                            <img class="img-circle img-sm" alt="Profile Picture" src="{{ $comment->user->profile_picture }}" style="width: 50px; height: 50px; border-radius: 50%;">
                        @else
                            <img class="img-circle img-sm" alt="Profile Picture" src="{{ asset('images/profile/default-profile-picture.jpg') }}" style="width: 50px; height: 50px; border-radius: 50%;">
                        @endif
                    </a>
                    <div class="media-body">
                        <div class="mar-btm">
                            @if($comment->user)
                                <a href="#" class="btn-link text-semibold media-heading box-inline">{{ $comment->user->name }}</a>
                            @else
                                <span class="text-semibold">User not found</span>
                            @endif
                            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i>{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                        <p>{{ $comment->message }}</p>
                        @if($comment->image)
                            <img src="{{ asset('assit-user/images/comment'. $comment->image) }}" alt="Comment Image" style="max-width: 100%; border-radius: 10px;">
                        @endif
                        <div class="pad-ver">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                            </div>
                            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
<script>


function setRating(rating) {
 document.getElementById('rating').value = rating;
                        }
    // ALL Stars to NodeList 
    let stars = document.querySelectorAll(".stars i");
    
  
    
    // Loops through star NodeList
     stars.forEach((star, index1) => {
        // Function when click events triggers
         star.addEventListener("click", () => {
            // Loop through stars NodeList again
             stars.forEach((star, index2) => {
                // Adding Color Stars
                 if (index1 >= index2) {
    star.classList.add("color-star");
    } else {
    star.classList.remove("color-star");
    }
    });
    });
    });
    </script>
<script>
// يتم استخدام هذا الكود لحساب السعر وعرضه في المجموع
document.querySelector('.appointment-form').addEventListener('submit', function() {
    const checkIn = new Date(document.querySelector('.appointment_date-check-in').value);
    const checkOut = new Date(document.querySelector('.appointment_date-check-out').value);
    const hours = Math.abs(checkOut - checkIn) / 36e5; // 36e5 هو عدد الثواني في ساعة

    const price = parseFloat(document.querySelector('input[name="price"]').value);
    const totalPrice = hours * price;

    document.getElementById('total-price').textContent = totalPrice + ' ريال';

    return true;
});
</script>
@endsection

