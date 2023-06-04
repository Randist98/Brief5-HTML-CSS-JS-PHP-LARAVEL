{{-- @extends('User.layouts.calmaster')
@section('content') --}}
<div class="container ">
    <h1>Booking</h1>
    <form action="" method="POST" enctype="multipart/form-data" class="edit-form">
        @csrf
        <div class="mb-3 row">
            <label for="start_time" class="col-sm-2 col-form-label"><i class="fas fa-clock"></i> Start Time:</label>
            <div class="col-sm-10">
                <div id="start_calendar"></div>
                @error('start_time')
                    <div class="text-danger"></div>
                @enderror
            </div>
        </div>
 <h2>Personal Information</h2><form action="{{ route('office.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label"><i class="fa fa-font" aria-hidden="true"></i> Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label"><i class="fa fa-money" aria-hidden="true"></i> Email</label>
        <input type="text" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Mobile</label>
        <input type="text" class="form-control" id="location" name="location" required>
    </div>
    <div class="mb-3">
        <div>Total</div>
        <div class="form-control"></div>
    </div>
    <button type="submit" class="btn btn-primary mb-4"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
        <div class="mb-3 row">

        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create</button>
            <button type="button" onclick="window.history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</button>
        </div>
    </form>
</div>
<div class="container d-flex justify-content-center mt-5 mb-5">

            

            <div class="row g-3">

              <div class="col-md-6">  
                
                <span>Payment Method</span>
                <div class="card">

                  <div class="accordion" id="accordionExample">
                    
                    <div class="card">
                      <div class="card-header p-0" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="d-flex align-items-center justify-content-between">

                              <span>Paypal</span>
                              <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                              
                            </div>
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                          <input type="text" class="form-control" placeholder="Paypal email">
                        </div>
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header p-0">
                        <h2 class="mb-0">
                          <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="d-flex align-items-center justify-content-between">

                              <span>Credit card</span>
                              <div class="icons">
                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                <img src="https://i.imgur.com/35tC99g.png" width="30">
                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                              </div>
                              
                            </div>
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body payment-card-body">
                          
                          <span class="font-weight-normal card-text">Card Number</span>
                          <div class="input">

                            <i class="fa fa-credit-card"></i>
                            <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                            
                          </div> 

                          <div class="row mt-3 mb-3">

                            <div class="col-md-6">

                              <span class="font-weight-normal card-text">Expiry Date</span>
                              <div class="input">

                                <i class="fa fa-calendar"></i>
                                <input type="text" class="form-control" placeholder="MM/YY">
                                
                              </div> 
                              
                            </div>


                            <div class="col-md-6">

                              <span class="font-weight-normal card-text">CVC/CVV</span>
                              <div class="input">

                                <i class="fa fa-lock"></i>
                                <input type="text" class="form-control" placeholder="000">
                                
                              </div> 
                              
                            </div>
                            

                          </div>

                          <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
                         
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  
                </div>

              </div>

              <div class="col-md-6">
                  <span>Summary</span>

                  <div class="card">

                    <div class="d-flex justify-content-between p-3">

                      <div class="d-flex flex-column">

                        <span>Pro(Billed Monthly) <i class="fa fa-caret-down"></i></span>
                        <a href="#" class="billing">Save 20% with annual billing</a>
                        
                      </div>

                      <div class="mt-1">
                        <sup class="super-price">$9.99</sup>
                        <span class="super-month">/Month</span>
                      </div>
                      
                    </div>

                    <hr class="mt-0 line">

                    <div class="p-3">

                      <div class="d-flex justify-content-between mb-2">

                        <span>Refferal Bonouses</span>
                        <span>-$2.00</span>
                        
                      </div>

                      <div class="d-flex justify-content-between">

                        <span>Vat <i class="fa fa-clock-o"></i></span>
                        <span>-20%</span>
                        
                      </div>
                      

                    </div>

                    <hr class="mt-0 line">


                    <div class="p-3 d-flex justify-content-between">

                      <div class="d-flex flex-column">

                        <span>Today you pay(US Dollars)</span>
                        <small>After 30 days $9.59</small>
                        
                      </div>
                      <span>$0</span>

                      

                    </div>


                    <div class="p-3">

                    <button class="btn btn-primary btn-block free-button">Try it free for 30 days</button> 
                   <div class="text-center">
                     <a href="#">Have a promo code?</a>
                   </div>
                      
                    </div>



                    
                  </div>
              </div>
              
            </div>
            

          </div>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">

<!-- FullCalendar CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<!-- Custom Script -->
<script>
    $(function() {
        $('#start_calendar').fullCalendar({
            // تكوينات التقويم لعرض الأيام والساعات
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaDay,agendaWeek,month'
            },
            defaultView: 'agendaWeek', // العرض الافتراضي للتقويم
            editable: true,
            eventLimit: true, // حد أقصى لعدد الأحداث المعروضة في يوم واحد
            selectable: true, // إمكانية تحديد أحداث جديدة بالنقر على الأيام والساعات
            selectHelper: true,
            slotDuration: '00:30:00', // مدة الفترة الزمنية للتقويم
            // يتم استدعاء الدالة هنا عند اختيار فترة زمنية على التقويم
            select: function(start, end) {
                var title = prompt('Event Title:');
                if (title) {
                    var eventData = {
                        title: title,
                        start: start,
                        end: end
                    };
                    $('#start_calendar').fullCalendar('renderEvent', eventData, true); // عرض الحدث الجديد
                }
                $('#start_calendar').fullCalendar('unselect');
            }
        });
    });
</script>
{{-- @endsection --}}