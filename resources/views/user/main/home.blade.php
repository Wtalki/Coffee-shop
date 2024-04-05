@extends('user.layouts.master')

@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('user/images/9.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">The Best Coffee Testing Experience</h1>
                    <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                        necessary regelialia.</p>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="{{route('user#menuPage')}}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('user/images/2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
                    <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                        necessary regelialia.</p>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('user/images/11.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
                    <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                        necessary regelialia.</p>
                    <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex align-items-xl-end">
            <div class="info">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-phone"></span></div>
                        <div class="text">
                            <h3>000 (123) 456 7890</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-my_location"></span></div>
                        <div class="text">
                            <h3>198 West 21th Street</h3>
                            <p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text">
                            <h3>Open Monday-Friday</h3>
                            <p>8:00am - 9:00pm</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="book p-4">
                <h3>Book a Table</h3>
                <div style="display:none;" class="book-alert alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success...</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <form action="#" class="appointment-form">
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="First Name">
                            <span class="text-danger  validate" style="display:none;">Need user name..</span>
                        </div>
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" class="form-control appointment_date" id="date" placeholder="Date">
                                <span class="text-danger  validate-date" style="display:none;">Require..</span>
                            </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-ios-clock"></span></div>
                                <input type="text" class="form-control appointment_time" id="time" placeholder="Time">
                                <span class="text-danger  validate-time" style="display:none;">Require..</span>
                            </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" id="phone" placeholder="Phone">
                            <span class="text-danger  validate-phone" style="display:none;">Require..</span>
                        </div>
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <textarea name="" cols="30" rows="2" id="description" class="form-control" placeholder="Message"></textarea>
                            <span class="text-danger  validate-des" style="display:none;">Require..</span>
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="submit" value="Appointment" id="appointmentBtn" class="btn btn-white py-3 px-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url({{ asset('user/images/1.jpg') }});"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate ">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Story</h2>
            </div>
            <div>
                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would
                    have been rewritten a thousand times and everything that was left from its origin would be the word
                    "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing
                    the copy said could convince her and so it didn’t take long until a few insidious Copy Writers
                    ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they
                    abused her for their.</p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-choices"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Easy to Order</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-delivery-truck"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Fastest Delivery</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-coffee-bean"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Quality Coffee</h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5">
                <div class="heading-section text-md-right ftco-animate">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Menu</h2>
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the
                        coast of the Semantics, a large language ocean.</p>
                    <p><a href="{{route('user#menuPage')}}" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    @foreach ($product as $p )
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="{{route('user#menuPage')}}" class="img" style="background-image: url({{ asset('storage/'.$p->image) }});"></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{ asset('user/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="100">0</strong>
                                <span>Coffee Branches</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="85">0</strong>
                                <span>Number of Awards</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="10567">0</strong>
                                <span>Happy Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="900">0</strong>
                                <span>Staff</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Best Coffee Sellers</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($product as $p )
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="{{ route('product#singlePage', $p->id) }}" class="img" style="background-image: url({{asset('storage/'.$p->image)}});"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">{{$p->name}}</a></h3>
                        <p>{{$p->description}}</p>
                        <p><i class="fa-regular fa-eye me-2"></i>{{$p->view_count}}</p>
                        <p class="price"><span>{{$p->price}} Kyats</span></p>
                        <p><a href="{{ route('product#singlePage', $p->id) }}" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-gallery">
    <div class="container-wrap">
        <div class="row no-gutters">
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('user/images/1.jpg') }});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('user/images/8.jpg') }});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('user/images/3.jpg') }});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('user/images/4.jpg') }});">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section img" id="ftco-testimony" style="background-image:url({{ asset('user/images/9.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Customers Says</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
                <a href="{{route('user#reviewPage')}}"><button class="btn rounded text-white" style='border:2px solid yellow;'>View more review..</button></a>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row d-flex no-gutters">

            @foreach ($review as $r)
            <div class="col-lg align-self-sm-end ">
                <div class="testimony overlay">
                    <blockquote>
                        <p>&ldquo;{{$r->review_text}}.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            @if (@Auth::user()->image == null)
                            @if(@Auth::user()->gender == 'male')
                            <img class="img-thumbnail w-100" src="{{asset('default/male.jpg')}}" alt="">
                            @elseif (@Auth::user()->gender == 'female')
                            <img class="img-thumbnail w-100" src="{{asset('default/girl.jpg')}}" alt="">
                            @endif
                            @else
                            <img class="img-thumbnail w-100" src="{{asset('storage/'.$r->user_image)}}" alt="">
                            @endif
                        </div>
                        <div class="name align-self-center">{{$r->user_name}}
                            <span class="position">
                                <i class="fa-solid fa-star me-2 text-dark"></i> {{$r->rating}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('scriptSource')
<script>
    $(function() {
            $('#appointmentBtn').click(function(e) {
                e.preventDefault();
                if ($('#name').val() == '') {
                    $('.validate').css('display', 'block');
                } else {
                    $('.validate').css('display', 'none');
                    if ($('#date').val() == '') {
                        $('.validate-date').css('display', 'block');
                    } else {
                        $('.validate-date').css('display', 'none');
                        if ($('#time').val() == '') {
                            $('.validate-time').css('display', 'block');
                        } else {
                            $('.validate-time').css('display', 'none');
                            if ($('#phone').val() == '') {
                                $('.validate-phone').css('display', 'block');
                            } else {
                                $('.validate-phone').css('display', 'none');
                                if ($('#description').val() == '') {
                                    $('.validate-des').css('display', 'block');
                                } else {
                                    $('.validate-des').css('display', 'none');

                                    $appointmentData = {
                                        'userName': $('#name').val(),
                                        'Date': $('#date').val(),
                                        'Time': $('#time').val(),
                                        'Phone': $('#phone').val(),
                                        'description': $('#description').val(),
                                    };

                                    $.ajax({
                                        type: 'get',
                                        url: '/user/appointment',
                                        data: $appointmentData,
                                        dataType: 'json',
                                        success: function(response) {
                                            if(response.status == 'success'){
                                                $('.book-alert').css('display', 'block');
                                                clearData();
                                            }
                                        },
                                        error:function(error){
                                        window.location.href ='http://127.0.0.1:8000/loginPage'
                                        }
                                    })
                                }
                            }
                        }
                    }
                }
                function clearData() {
                $('#name').val('');
                $('#date').val('');
                $('#time').val('');
                $('#phone').val('');
                $('#description').val('')
                }

            })

        })
</script>
@endsection