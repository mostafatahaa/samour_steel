@include('front.layouts.header')


<div class="main-banner">
    <div class="owl-carousel owl-banner">
        @forelse($sliders as $slider)
            <div class="item item-1">
                <img src="{{ asset('storage/' . $slider->images) }}" alt="Slider Image">
                <div class="header-text">
                    <span class="category">Toronto, <em>Canada</em></span>
                    <h2>Hurry!<br>Get the Best Villa for you</h2>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>


<div class="featured section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="left-image">
                    <img src="{{asset('front/assets/images/featured.jpg')}}" alt="">
                    <a href="property-details.html"><img src="assets/images/featured-icon.png" alt=""
                                                         style="max-width: 60px; padding: 0px;"></a>
                </div>
            </div>


            <div class="col-lg-7">
                <div class="info-table">
                    <ul>
                        @forelse($features as $feature)
                            <li>
                                <img src="{{asset('storage/' . $feature->image)}}" alt=""
                                     style="max-width: 52px;">
                                <h4>{{$feature->title}}<br><span>{!! $feature->description!!}</span></h4>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="video section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="section-heading text-center">
                    <h2>تعرف على شركتنا</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="video-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="video-frame">
                    <img src="{{asset('front/assets/images/video-frame.jpg')}}" alt="">
                    <a href="https://www.youtube.com/watch?v=uFqBwi_E274" target="_blank"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fun-facts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                                <p class="count-text ">Buildings<br>Finished Now</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                                <p class="count-text ">Years<br>Experience</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                                <p class="count-text ">Awwards<br>Won 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="properties section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="section-heading text-center">
                    <h2>بعض من منتجاتنا</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="property-details.html"><img src="{{asset('storage/' . $product->image)}}" alt=""></a>
                        <span class="category">{{$product->category->name}}</span>
                        <h4><a href="property-details.html">{{$product->name}}</a></h4>
                        <div class="product-description">
                            <p>{!! Str::limit(strip_tags($product->top_description_text, 50))!!}</p>
                        </div>

                        <div class="main-button mt-5">
                            <a href="property-details.html">مشاهدة التفاصيل</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div class="section-heading text-center">
                <div class="all-products-button mt-6">
                    <a href="property-details.html">عرض جميع المنتجات</a>
                </div>
            </div>
        </div>

    </div>
</div>


@include('front.layouts.footer')
