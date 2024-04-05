@extends('user.layouts.master')

@section('content')
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate bg-transparent">
                <div class="cart-list">
                    <table class="table bg-transparent">
                        <thead class="thead-primary">
                            <tr class="text-center ">
                                <th class="bg-transparent">&nbsp;</th>
                                <th class="bg-transparent">&nbsp;</th>
                                <th class="bg-transparent">Product</th>
                                <th class="bg-transparent">Price</th>
                                <th class="bg-transparent">Quantity</th>
                                <th class="bg-transparent">Total</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($cart as $c)
                            <tr class="text-center cartList">
                                <input type="hidden" class="userId" value="{{$c->user_id}}">
                                <input type="hidden" class="productId" value="{{ $c->product_id }}">
                                <input type="hidden" class="orderId" value="{{$c->id}}">
                                <td class="product-remove bg-transparent"><button class="btn bg-transparent w-100 removeCart"><span class="icon-close"></span></button></td>

                                <td class="image-prod bg-transparent">
                                    <div class="img " style="background-image:url({{ asset('storage/' . $c->product_image) }});">
                                    </div>
                                </td>

                                <td class="product-name bg-transparent">
                                    <h3>{{ $c->product_name }}</h3>
                                    <p class="text-white text-muted">{{ $c->product_description }}</p>
                                </td>

                                <td class="price bg-transparent">{{ $c->product_price }} Kyats</td>

                                <td class="bg-transparent">
                                    <div class="input-group mb-3 ">
                                        <input disabled type="text" value="{{ $c->quantity }}" name="quantity" class="quantity form-control input-number qty" value="1" min="1" max="100">
                                    </div>
                                </td>

                                <td class="total bg-transparent total">{{ $c->product_price * $c->quantity }}Kyats</td>
                            </tr><!-- END TR-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span class="totalPrice"></span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>3000 Kyats</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span class="finalPrice"></span>
                    </p>
                </div>
                <p class="text-center"><button class="btn btn-primary py-3 px-4 orderBtn">
                        <p class="text-dark">Proceed to Checkout</p>
                    </button>
                </p>
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
<a href="{{route('order#listPage')}}">
    <button type="button" class="btn btn-primary rounded-circle p-3" style='position:fixed;right:40px;bottom:120px;z-index:100;'>
        <i class="fa-solid fa-list fs-3 "></i>
    </button>
</a>
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
            @foreach ($product as $p)
            <div class="col-md-3 product ">
                <div class="menu-entry ">
                    <a href="#" class="img" style="background-image: url({{ asset('storage/' . $p->image) }});"></a>
                    <div class="text text-center pt-4">
                        <input type="hidden" class="categoryId" value="{{ $p->category_id }}">
                        <h3><a href="#">{{ $p->name }}</a></h3>
                        <p>{{ $p->description }}</p>
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
    $(function() {
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

            // summary calculation
                $total = 0;
                $('.cartList').each(function(index,row){
                $total += $(row).find('.total').html().replace('Kyats','')*1;
                })
                $('.totalPrice').html($total + ' Kyats')
                $('.finalPrice').html($total +3000 +' Kyats')

            $('.removeCart').click(function(){
                $parentNode = $(this).parents('tr');
                $productId = $parentNode.find('.productId').val();
                $orderId = $parentNode.find('.orderId').val();
                $data = {
                'productId' : $productId,
                'orderId' : $orderId
                }
                $.ajax({
                type: 'get',
                url: '/user/delete/current/cart',
                data:$data,
                dataType: 'json',
                });

                $total=0;
                $parentNode.remove();
                $('.cartList').each(function(index,row){
                $total += $(row).find('.total').html().replace('Kyats','')*1;
                })
                $('.totalPrice').html($total + ' Kyats')
                $('.finalPrice').html($total +3000 +' Kyats')
            })

            $('.orderBtn').click(function(){
                $orderList =[]
                $orderCode = Math.floor(Math.random() * 100000)
                $total=0;

                $('.cartList').each(function(index,row){
                    $orderList.push({
                        'userId' :$(row).find('.userId').val(),
                        'productId' :$(row).find('.productId').val(),
                        'qty' : $(row).find('.qty').val(),
                        'orderCode' : 'PRODUCT' + $orderCode,
                        'total' : $(row).find('.total').html().replace('Kyats','')*1
                    })
                    $(row).remove();
                })
                $('.totalPrice').html($total + ' Kyats')
                $('.finalPrice').html($total +3000 +' Kyats')


                $.ajax({
                type: 'get',
                url: '/user/product/order/',
                data:Object.assign({},$orderList),
                dataType: 'json',
                });


            })
        })
</script>
@endsection