
@extends('User.layouts.master')
@section('content')
    
    <div class="site-block-wrap">
    <div class="owl-carousel with-dots">
      <div class="site-blocks-cover overlay overlay-2" style="background-image: url(assit-user/images/hero_1.jpg);" data-aos="fade" id="home-section">


        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mt-lg-5 text-center">
              <h1 class="text-shadow">Buy &amp; Sell Property Here</h1>
              <p class="mb-5 text-shadow">Free website template for Real Estate websites by the fine folks at <a href="https://free-template.co/" target="_blank">Free-Template.co</a>  </p>
              <p><a href="https://free-template.co" target="_blank" class="btn btn-primary px-5 py-3">Get Started</a></p>
              
            </div>
          </div>
        </div>
  
        
      </div>  
  
      <div class="site-blocks-cover overlay overlay-2" style="background-image: url(assit-user/images/hero_2.jpg);" data-aos="fade" id="home-section">
  
  
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mt-lg-5 text-center">
              <h1 class="text-shadow">Find Your Perfect Property For Your Home</h1>
              <p class="mb-5 text-shadow">Free website template for Real Estate websites by the fine folks at <a href="https://free-template.co/" target="_blank">Free-Template.co</a>  </p>
              <p><a href="https://free-template.co" target="_blank" class="btn btn-primary px-5 py-3">Get Started</a></p>
              
            </div>
          </div>
        </div>
  
        
      </div>  
    </div>   
    
  </div>      

<div class="site-section" id="properties-section">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.1/nouislider.min.css">
    
    
    <div class="site-section" id="properties-section">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.1/nouislider.min.css">
    
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-advance-search-area">
              <form id="search-form" class="form">
                <div class="aa-advance-search-top">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="aa-single-advance-search">
                        <input id="location-input" type="text" class="form-control" placeholder="Type Your Location">
                      </div>
                    </div>
                 
                    
                  
                    <div class="col-md-2">
                      <div class="aa-single-advance-search">
                        <button id="search-btn" class="aa-search-btn btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="aa-advance-search-bottom">
                  <div class="row">
                    <div class="col-md-6 mt-4">
                      <div class="aa-single-filter-search">
                     
                        <div id="aa-sqrfeet-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background" hidden>
    
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8 mt-4">
                      <div class="aa-single-filter-search">
                        <span>PRICE ($)</span>
                        <span>FROM</span>
                        <span id="skip-value-lower2" class="example-val">200.00</span>
                        <span>TO</span>
                        <span id="skip-value-upper2" class="example-val">700.00</span>
                        <div id="aa-price-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.1/nouislider.min.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Initialize the sliders
          var sqFeetSlider = document.getElementById('aa-sqrfeet-range');
          noUiSlider.create(sqFeetSlider, {
            start: [200.00, 700.00],
            connect: true,
            range: {
              'min': 0.00,
              'max': 1000.00
            },
            step: 10.00
          });
    
          var priceSlider = document.getElementById('aa-price-range');
          noUiSlider.create(priceSlider, {
            start: [200.00, 700.00],
            connect: true,
            range: {
              'min': 0.00,
              'max': 1000.00
            },
            step: 10.00
          });
    
          // Update the values of the slider handles
          var skipValueLower = document.getElementById('skip-value-lower');
          var skipValueUpper = document.getElementById('skip-value-upper');
          var skipValueLower2 = document.getElementById('skip-value-lower2');
          var skipValueUpper2 = document.getElementById('skip-value-upper2');
    
          sqFeetSlider.noUiSlider.on('update', function(values, handle) {
            if (handle === 0) {
              skipValueLower.innerHTML = values[handle];
            } else {
              skipValueUpper.innerHTML = values[handle];
            }
          });
    
          priceSlider.noUiSlider.on('update', function(values, handle) {
            if (handle === 0) {
              skipValueLower2.innerHTML = values[handle];
            } else {
              skipValueUpper2.innerHTML = values[handle];
            }
          });
    
          // Search form submission
          var searchForm = document.getElementById('search-form');
          searchForm.addEventListener('submit', function(event) {
            event.preventDefault();
    
            // Get the form values
            var location = document.getElementById('location-input').value;
            var category = document.getElementById('category-select').value;
            var type = document.getElementById('type-select').value;
            var subtype = document.getElementById('subtype-select').value;
    
            // Perform the search with the form values
            performSearch(location, category, type, subtype);
          });
        });
    
        function performSearch(location, category, type, subtype) {
          // Implement your search logic here
          // You can use the form values to filter the search results
          console.log("Performing search...");
          console.log("Location: " + location);
          console.log("Category: " + category);
          console.log("Type: " + type);
          console.log("Subtype: " + subtype);
    
          // Example: Update the results dynamically
          var resultsContainer = document.getElementById('properties-section');
          resultsContainer.innerHTML = '<p>Loading results...</p>';
    
          // Make an AJAX request or perform any other operation to fetch and update the search results
          // Once you have the results, you can update the `resultsContainer` with the new HTML content
          // For example:
          setTimeout(function() {
            resultsContainer.innerHTML = '<p>Here are the search results...</p>';
          }, 2000);
        }
      </script>
      <div class="site-section" id="properties-section">
        <div class="container">
          <div class="row large-gutters">
            @foreach ($products as $item)
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
              <div class="ftco-media-1">
                <div class="ftco-media-1-inner">
                  <a href="{{ route('home.show', ['home' => $item->id]) }}" class="d-inline-block mb-4">
                    {{-- @if($item->image)
                      <img src="{{ asset('image/'. $item->image) }}" alt="Office Image" class="img-fluid" style="width: 100px;">
                    @else
                      <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                    @endif  --}}
                    <img src="{{asset('assit-user/images/'.$item->image)}}" alt="Free website template by Free-Template.co" class="img-fluid">
                  </a>
                  <div class="ftco-media-details">
                    <h3>{{ $item->name }}</h3>
                    <p>{{ $item->location }}</p>
                    <strong>{{ $item->price }}$</strong>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    
    
    
    
 

    <section class="py-5 bg-primary site-section how-it-works" id="howitworks-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-black">How It Works</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center">
            <div class="pr-5 first-step">
              <span class="text-black">01.</span>
              <span class="custom-icon flaticon-house text-black"></span>
              <h3 class="text-black">Find Property.</h3>
              <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5 second-step">
              <span class="text-black">02.</span>
              <span class="custom-icon flaticon-coin text-black"></span>
              <h3 class="text-dark">Buy Property.</h3>
              <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5">
              <span class="text-black">03.</span>
              <span class="custom-icon flaticon-home text-black"></span>
              <h3 class="text-dark">Outstanding Houses.</h3>
              <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
      </div>  
    </section>



    <section class="site-section" id="about-section">
      <div class="container">
        <h2>About us </h2>
        <div class="row large-gutters">
          <div class="col-lg-6 mb-5">

              <div class="owl-carousel slide-one-item with-dots">
                  <div><img src="images/img_1.jpg" alt="Free website template by Free-Template.co" class="img-fluid"></div>
                  <div><img src="images/img_2.jpg" alt="Free website template by Free-Template.co" class="img-fluid"></div>
                  <div><img src="images/img_3.jpg" alt="Free website template by Free-Template.co" class="img-fluid"></div>
                </div>

          </div>
       
          <div class="col-lg-6 ml-auto">
            
            <h2 class="section-title mb-3">Warehouse Real Estate Template</h2>
                Welcome to our rental website, where we cater to individuals seeking the perfect space for studying, meetings, or work. We understand the importance of a conducive environment for productivity, and that's why we offer a wide range of office spaces available for rent. Whether you need a quiet space to focus on your studies, a professional setting for important meetings, or a comfortable workspace to tackle your projects, we have the ideal solution for you. Our user-friendly platform allows you to browse through various options, compare prices, and book your preferred office space with ease. Experience the convenience and flexibility of our rental services and unlock your full potential in a space tailored to your needs.

            
          </div>
        </div>
      </div>
    </section>

    

    <section class="site-section bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Services</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-house"></span></div>
              <div>
                <h3>Find Property</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-coin"></span></div>
              <div>
                <h3>Buy Property</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-home"></span></div>
              <div>
                <h3>Beautiful Home</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-flat"></span></div>
              <div>
                <h3>Buildings &amp; Lands</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-location"></span></div>
              <div>
                <h3>Property Locator</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-mobile-phone"></span></div>
              <div>
                <h3>Mobile Apps</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="site-section testimonial-wrap" id="testimonials-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Testimonials<h2>
          </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="ftco-testimonial-1">
                  <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="images/person_1.jpg" alt="Free website template by Free-Template.co" class="img-fluid mr-3">
                    <div>
                      <h3>Allison Holmes</h3>
                      <span>Customer</span>
                    </div>
                  </div>
                  <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                  <div class="ftco-testimonial-1">
                      <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="images/person_2.jpg" alt="Free website template by Free-Template.co" class="img-fluid mr-3">
                        <div>
                          <h3>James Phelps</h3>
                          <span>Customer</span>
                        </div>
                      </div>
                      <div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                      </div>
                    </div>
              </div> 

              <div class="col-md-6 mb-4">
                  <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                      <img src="images/person_3.jpg" alt="Free website template by Free-Template.co" class="img-fluid mr-3">
                      <div>
                        <h3>Nestor Helsin</h3>
                        <span>Customer</span>
                      </div>
                    </div>
                    <div>
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="ftco-testimonial-1">
                        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                          <img src="images/person_1.jpg" alt="Free website template by Free-Template.co" class="img-fluid mr-3">
                          <div>
                            <h3>Allison Holmes</h3>
                            <span>Customer</span>
                          </div>
                        </div>
                        <div>
                          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                        </div>
                      </div>
                </div> 
        </div>
      </div>
    </section>


   

{{-- contact us section --}}
<section class="ftco-section" id="contact-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-5">
        <h2 class="heading-section">Contact US</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="wrapper">
          <div class="row no-gutters mb-5">
            <div class="col-md-7">
              <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 class="mb-4">Contact Us</h3>
                <div id="form-message-warning" class="mb-4"></div> 
                <div id="form-message-success" class="mb-4">
                 
                </div>
                <form action="{{ route('contact.store') }}" method="POST" id="contactForm" name="contactForm" class="contactForm">
                  @csrf

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="label" for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-md-6"> 
                      <div class="form-group">
                        <label class="label" for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="label" for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="label" for="#">Message</label>
                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                        <div class="submitting"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-5 d-flex align-items-stretch">

            <div style="width: 100%"><iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=%D8%A7%D9%84%D8%B3%D9%84%D8%B7+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">distance maps</a></iframe></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="dbox w-100 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-map-marker"></span>
                </div>
                <div class="text">
                  <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="dbox w-100 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-phone"></span>
                </div>
                <div class="text">
                  <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="dbox w-100 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-paper-plane"></span>
                </div>
                <div class="text">
                  <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="dbox w-100 text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="fa fa-globe"></span>
                </div>
                <div class="text">
                  <p><span>Website</span> <a href="#">yoursite.com</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
   