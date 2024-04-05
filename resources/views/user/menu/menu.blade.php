@extends('user.layouts.master')

@section('title', 'Menu')
@section('content')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('user/images/pexels-clam-lo-3355400.jpg')}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('user#main') }}">Home</a></span>
                        <span>Menu</span>
                    </p>
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

<section class="ftco-section">
    <div class="container">
        {{-- <div class="row">
            <div class="col-md-6">
                <h3 class="mb-5 heading-pricing ftco-animate">Desserts</h3>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url({{asset('user/images/dessert-1.jpg')}});"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>Cornish - Mackerel</span></h3>
                            <span class="price">$20.00</span>
                        </div>
                        <div class="d-block">
                            <p>A small river named Duden flows by their place and supplies</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/dessert-2.jpg);"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>Roasted Steak</span></h3>
                            <span class="price">$29.00</span>
                        </div>
                        <div class="d-block">
                            <p>A small river named Duden flows by their place and supplies</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/dessert-3.jpg);"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>Seasonal Soup</span></h3>
                            <span class="price">$20.00</span>
                        </div>
                        <div class="d-block">
                            <p>A small river named Duden flows by their place and supplies</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/dessert-4.jpg);"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>Chicken Curry</span></h3>
                            <span class="price">$20.00</span>
                        </div>
                        <div class="d-block">
                            <p>A small river named Duden flows by their place and supplies</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h3 class="mb-5 heading-pricing ftco-animate">Drinks</h3>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/drink-5.jpg);"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>Sea Trout</span></h3>
                            <span class="price">$49.91</span>
                        </div>
                        <div class="d-block">
                            <p>A small river named Duden flows by their place and supplies</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/drink-6.jpg);"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>Roasted Beef</span></h3>
                            <span class="price">$20.00</span>
                        </div>
                        <div class="d-block">
                            <p>A small river named Duden flows by their place and supplies</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/drink-7.jpg);"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>Butter Fried Chicken</span></h3>
                            <span class="price">$20.00</span>
                        </div>
                        <div class="d-block">
                            <p>A small river named Duden flows by their place and supplies</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/drink-8.jpg);"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span>Chiken Filet</span></h3>
                            <span class="price">$20.00</span>
                        </div>
                        <div class="d-block">
                            <p>A small river named Duden flows by their place and supplies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>

<section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills justify-content-center categoryContaier" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($category as $c)
                            <a class="btn btn-warning me-2 p-2 category" id="{{ $c->id }}" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">{{ $c->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    @foreach ($product as $p)
                    <div class="col-md-4 product ">
                        <div class="menu-entry ">
                            <a href="#" class="img" style="background-image: url({{ asset('storage/' . $p->image) }});"></a>
                            <div class="text text-center pt-4">
                                <input type="hidden" class="categoryId" value="{{ $p->category_id }}">
                                <h3><a href="#">{{ $p->name }}</a></h3>
                                <p>{{ $p->description }}</p>
                                <p><i class="fa-regular fa-eye me-2"></i>{{$p->view_count + 1}}</p>
                                <p class="price"><span>{{ $p->price }} Kyats</span></p>
                                <p><a href="{{ route('product#singlePage', $p->id) }}" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
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
                                            if (response.status == 'success') {
                                                $('.book-alert').css('display', 'block');
                                                clearData();
                                            }
                                        },
                                        error: function(error) {
                                            window.location.href =
                                                'http://127.0.0.1:8000/loginPage'
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
            $('.category').click(function() {
            $category = $(this).attr('id');
            $('.product').each(function(index, row) {
            $categoryId = $(row).find('.categoryId').val();
            if ($category == $categoryId) {
            $(row).show();
            } else {
            $(row).css('display', 'none');
            }
            })
            })

            // $.ajax({
            //     type: 'get',
            //     url: 'http://127.0.0.1:8000/category/filter',
            //     dataType: 'json',
            //     success: function(response) {
            //         $category = '';
            //         response.category.forEach(function(res) {
            //             $category += `
            //         <button class="nav-link active categoryBtn" id="${res.id}"  role="tab" aria-controls="v-pills-2" aria-selected="false">${res.name}</button>
            //     `;
            //         })
            //         $('.categoryContaier').html($category);
            //         $product = '';
            //         response.product.forEach(function(pro) {
            //         $product += `
            //         <div class="col-md-4 text-center product" style="width:500px;">
            //             <div class="menu-wrap">
            //                 <a href="http://127.0.0.1:8000/user/product/singlePage/${pro.id}" class="menu-img img mb-4" style="background-image: url({{ asset('storage/${pro.image}') }});"></a>
            //                 <div class="text">
            //                     <input type="hidden" class="product_categoryId" value="${pro.category_id}" id="">
            //                     <h3><a href="#">${pro.name}</a></h3>
            //                     <p>${pro.description}</p>
            //                     <p><i class="fa-regular fa-eye me-2"></i>${pro.view_count}</p>
            //                     <p class="price"><span>${pro.price} Kyats</span></p>
            //                     <p><a href="http://127.0.0.1:8000/user/product/singlePage/${pro.id}" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
            //                 </div>
            //             </div>
            //         </div>
            //     `;
            //         })
            //         $('.productContainer').html($product)
            //         //filter category
            //         $('.categoryBtn').click(function() {
            //             $categoryId = $(this).attr('id');
            //             $('.product').each(function(index, row) {
            //                 $productCategoryId = $(row).find('.product_categoryId')
            //                 .val();
            //                 if ($categoryId == $productCategoryId) {
            //                     $(row).show();
            //                 } else {
            //                     $(row).css('display','none');
            //                 }
            //             })
            //         })
            //     }
            // })


        })
</script>
@endsection