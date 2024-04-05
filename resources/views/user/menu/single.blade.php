@extends('user.layouts.master')

@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('storage/' . $product->image) }});" data-stellar-background-ratio="1.1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Product Detail</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product
                            Detail</span></p>
                </div>

            </div>
        </div>
    </div>
</section>
<a href="{{route('product#orderPage')}}">
    <button type="button" class="btn btn-primary rounded-circle p-3" style='position:fixed;right:40px;bottom:40px;z-index:100;'>
        <i class="fa-solid fa-cart-shopping fs-3 "></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-4">
            {{count($cart)}}
        </span>
    </button>
</a>
<section class="ftco-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{ asset('storage/' . $product->image) }}" class="image-popup"><img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <div class="row">
                    <h3 class="col-7">{{ $product->name }}</h3>
                    <div class="col-5">
                        <div style="display:none;" class="book-alert alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong>
                            <a type="button" class="btn-close position-absolute " data-bs-dismiss="alert" aria-label="Close"></a>
                        </div>
                    </div>
                </div>
                <p><i class="fa-regular fa-eye me-2"></i>{{$product->view_count + 1}}</p>
                <p class="price"><span>{{ $product->price }} Kyats</span></p>
                <p>{{ $product->description }}</p>
                </p>
                <div class="row mt-4">
                    {{-- <div class="col-md-6">
                        <div class="form-group d-flex">
                            <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="" id="" class="form-control">
                                    <option value="">Small</option>
                                    <option value="">Medium</option>
                                    <option value="">Large</option>
                                    <option value="">Extra Large</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="w-100"></div>

                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                <i class="icon-minus"></i>
                            </button>
                        </span>
                        <input type="hidden" class="userId" value="{{Auth::user()->id}}">
                        <input type="hidden" class="productId" value="{{$product->id}}">
                        <input type="text" id="quantity" name="quantity" class="form-control input-number quantityValue" value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn " data-type="plus" data-field="">
                                <i class="icon-plus"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <p class=""><button class="btn btn-primary py-3 px-5 addToCart text-white fw-bold "><span class="text-dark">Add to Cart</span></button></p>
            </div>

        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Related products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 nav-link-wrap mb-5">
                <div class="nav ftco-animate nav-pills justify-content-center categoryContaier" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($category as $c)
                    <a class="btn btn-warning me-2 p-2 category" id="{{ $c->id }}" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">{{ $c->name }}</a>
                    @endforeach
                </div>
            </div>
            @foreach ($productList as $p)
            <div class="col-md-3 product">
                <div class="menu-entry ">
                    <a href="{{ route('product#singlePage', $p->id) }}" class="img" style="background-image: url({{ asset('storage/' . $p->image) }});"></a>
                    <div class="text text-center pt-4">
                        <input type="hidden" class="categoryId" value="{{$p->category_id}}">
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
</section>
@endsection

@section('scriptSource')
<script>
    $(document).ready(function() {
            $.ajax({
            type: 'get',
            url: '/view/count',
            data:{'productId' : $(".productId").val()},
            dataType: 'json',
            });


            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });
            $('.category').click(function(){
                $category = $(this).attr('id');
                $('.product').each(function(index,row){
                    $categoryId = $(row).find('.categoryId').val();
                    if($category == $categoryId){
                        $(row).show();
                    }else{
                        $(row).css('display','none');
                    }
                })
            })

            //add to cart
            $('.addToCart').click(function(){
                $productId = $('.productId').val();
                $userId = $('.userId').val();
                $quantityValue = $('.quantityValue').val();
                $data = {
                    'productId' : $productId,
                    'userId' : $userId,
                    'quantityValue' : $quantityValue
                }
                $.ajax({
                type: 'get',
                url: '/user/product/add/cart',
                data:$data,
                dataType: 'json',
                success:function(response){
                    if(response.status=='success'){
                        $('.show').css('display', 'block');
                    }
                }
                });
            })


        });
</script>
@endsection