@extends('user.layouts.master')
@section('title','Reviews')
@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="book-alert alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Thanks for rating...</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <form action="" class="billing-form ftco-bg-dark p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Reviews</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <input type="hidden" name="" id="userId" value="{{@Auth::user()->id}}">
                            <div class="form-group">
                                <label for="Username">Rating</label>
                                <input type="range" name="rating" min="0" max="5" id='rating' class="form-control" placeholder="Username">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Email">Description</label>
                                <textarea class="form-control" id="description" cols="30" rows="10"></textarea>
                                <span class="text-danger" id='desc' style='display:none;'>Description Required</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <button type="button" id='ratingBtn' class="btn btn-primary py-3 px-4">Review</button>
                                </div>
                            </div>
                        </div>
                </form><!-- END -->
            </div> <!-- .col-md-8 -->
        </div>
    </div>

</section> <!-- .section -->
<section>
    <div class="container-fluid">
        <div class="slide-container">
            <header>
                <h1 class="text-center h1">
                    Review
                </h1>
            </header>
            <section class="Am-img-slider-container">
                <div class="swiper blog-slider">
                    <div class="swiper-wrapper">
                        <!-- slide -->
                        @foreach ($review as $r )
                        <div class="swiper-slide">
                            <div class="blog-slider__content d-flex flex-column justify-content-end">
                                <p class="blog-slider__text text-black">
                                    {{$r->review_text}}
                                </p>
                                <div class="author d-flex mt-4">
                                    <div class="image mr-3 align-self-center w-25 d-flex justify-content-center ">
                                        @if (@Auth::user()->image == null)
                                        @if(@Auth::user()->gender == 'male')
                                        <img class="img-thumbnail rounded-circle w-50" src="{{asset('default/male.jpg')}}" alt="">
                                        @elseif (@Auth::user()->gender == 'female')
                                        <img class="img-thumbnail rounded-circle w-50" src="{{asset('default/girl.jpg')}}" alt="">
                                        @endif
                                        @else
                                        <img class="img-thumbnail rounded-circle w-50" src="{{asset('storage/'.$r->user_image)}}" alt="">
                                        @endif
                                    </div>
                                    <div class="name align-self-center d-flex flex-column text-uppercase fw-bold text-black">
                                        {{$r->user_name}}
                                        <span class="position text-black">
                                            <i class="fa-solid fa-star me-2 text-dark"></i> {{$r->rating}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection

@section('scriptSource')
<script>
    $('#ratingBtn').click(function(e){
        e.preventDefault();
        if($('#description').val() == ''){
            $('#desc').css('display','block');
        }else{
            $('#desc').css('display','none');
            $rating = $('#rating').val() *1;
            $description = $('#description').val();
            $userId = $('#userId').val();
            $reviewData = {
            'userId' :$userId,
            'rating' :$rating,
            'description' :$description,
            }
            $.ajax({
            type: 'get',
            url: '/user/review',
            data: $reviewData,
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success'){
                    $('.book-alert').css('display','block');
                    $('#description').val('')
                }
            },
            error:function(error){
                window.location.href ='http://127.0.0.1:8000/loginPage'
            }
            })

        }

    })
</script>
@endsection